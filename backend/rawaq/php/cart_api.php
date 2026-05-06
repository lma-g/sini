<?php
// php/cart_api.php
session_start();
header('Content-Type: application/json');
require_once '../includes/db_connect.php';

$action = $_GET['action'] ?? '';
$user_id = $_SESSION['user_id'] ?? null;
$session_id = session_id();

// Helper function to get or create cart
function getCartId($pdo, $user_id, $session_id) {
    if ($user_id) {
        $stmt = $pdo->prepare("SELECT id FROM carts WHERE user_id = ? LIMIT 1");
        $stmt->execute([$user_id]);
    } else {
        $stmt = $pdo->prepare("SELECT id FROM carts WHERE session_id = ? AND user_id IS NULL LIMIT 1");
        $stmt->execute([$session_id]);
    }
    
    $cart = $stmt->fetch();
    if ($cart) {
        return $cart['id'];
    }
    
    // Create cart
    if ($user_id) {
        $stmt = $pdo->prepare("INSERT INTO carts (user_id) VALUES (?)");
        $stmt->execute([$user_id]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO carts (session_id) VALUES (?)");
        $stmt->execute([$session_id]);
    }
    return $pdo->lastInsertId();
}

try {
    // Check if tables exist, if not create them
    $pdo->exec("CREATE TABLE IF NOT EXISTS carts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NULL,
        session_id VARCHAR(255) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS cart_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cart_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT DEFAULT 1,
        added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
        FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
    )");

    $cart_id = getCartId($pdo, $user_id, $session_id);

    if ($action === 'get') {
        $stmt = $pdo->prepare("
            SELECT ci.id as item_id, ci.product_id, ci.quantity, p.name, p.price, p.image 
            FROM cart_items ci 
            JOIN products p ON ci.product_id = p.id 
            WHERE ci.cart_id = ?
        ");
        $stmt->execute([$cart_id]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        echo json_encode(['success' => true, 'items' => $items, 'total' => $total]);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        
        if ($action === 'add') {
            $product_id = $data['product_id'] ?? 0;
            $quantity = $data['quantity'] ?? 1;
            
            if (!$product_id) {
                echo json_encode(['success' => false, 'message' => 'Product ID is missing']);
                exit;
            }
            
            // Check if already in cart
            $stmt = $pdo->prepare("SELECT id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?");
            $stmt->execute([$cart_id, $product_id]);
            $existing = $stmt->fetch();
            
            if ($existing) {
                $new_qty = $existing['quantity'] + $quantity;
                $stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
                $stmt->execute([$new_qty, $existing['id']]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)");
                $stmt->execute([$cart_id, $product_id, $quantity]);
            }
            echo json_encode(['success' => true]);
            exit;
        }
        
        if ($action === 'update') {
            $item_id = $data['item_id'] ?? 0;
            $quantity = $data['quantity'] ?? 1;
            
            if ($quantity <= 0) {
                $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ? AND cart_id = ?");
                $stmt->execute([$item_id, $cart_id]);
            } else {
                $stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE id = ? AND cart_id = ?");
                $stmt->execute([$quantity, $item_id, $cart_id]);
            }
            echo json_encode(['success' => true]);
            exit;
        }
        
        if ($action === 'remove') {
            $item_id = $data['item_id'] ?? 0;
            $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ? AND cart_id = ?");
            $stmt->execute([$item_id, $cart_id]);
            echo json_encode(['success' => true]);
            exit;
        }
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
