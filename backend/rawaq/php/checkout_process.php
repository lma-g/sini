<?php
// php/checkout_process.php
session_start();
require_once '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /rawaq/index.php");
    exit;
}

$user_id = $_SESSION['user_id'] ?? null;
$session_id = session_id();

// جلب السلة
if ($user_id) {
    $stmt = $pdo->prepare("SELECT id FROM carts WHERE user_id = ? LIMIT 1");
    $stmt->execute([$user_id]);
} else {
    $stmt = $pdo->prepare("SELECT id FROM carts WHERE session_id = ? AND user_id IS NULL LIMIT 1");
    $stmt->execute([$session_id]);
}

$cart = $stmt->fetch();
if (!$cart) {
    header("Location: /rawaq/index.php");
    exit;
}

$cart_id = $cart['id'];

// جلب المنتجات
$stmt = $pdo->prepare("
    SELECT ci.product_id, ci.quantity, p.price 
    FROM cart_items ci 
    JOIN products p ON ci.product_id = p.id 
    WHERE ci.cart_id = ?
");
$stmt->execute([$cart_id]);
$items = $stmt->fetchAll();

if (empty($items)) {
    header("Location: /rawaq/index.php");
    exit;
}

$total_amount = 0;
foreach ($items as $item) {
    $total_amount += $item['price'] * $item['quantity'];
}

$full_name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');

$city = trim($_POST['city'] ?? '');
$street_address = trim($_POST['street_address'] ?? '');
$nearest_landmark = trim($_POST['nearest_landmark'] ?? '');

$shipping_cost = 0;
if ($city === 'صنعاء') {
    $shipping_cost = 0;
} elseif (in_array($city, ['تعز', 'إب'])) {
    $shipping_cost = 3000;
} elseif ($city === 'أخرى') {
    $shipping_cost = 4000;
}

// Add shipping to total amount
$total_amount += $shipping_cost;
$payment_method = $_POST['payment_method'] ?? 'cod';
$payment_details = "";

if ($payment_method === 'cod') {
    $payment_details = "طريقة الدفع: الدفع عند الاستلام";
} elseif ($payment_method === 'wallet') {
    $wallet_type = $_POST['wallet_type'] ?? '';
    $wallet_tn = $_POST['wallet_transfer_number'] ?? '';
    $payment_details = "طريقة الدفع: محفظة إلكترونية ($wallet_type) | رقم العملية: $wallet_tn";
} elseif ($payment_method === 'exchange') {
    $exchange_type = $_POST['exchange_type'] ?? '';
    $exchange_tn = $_POST['exchange_transfer_number'] ?? '';
    $payment_details = "طريقة الدفع: صرافة ($exchange_type) | رقم الحوالة: $exchange_tn";
} elseif ($payment_method === 'bank') {
    $bank_type = $_POST['bank_type'] ?? '';
    $bank_tn = $_POST['bank_transfer_number'] ?? '';
    $payment_details = "طريقة الدفع: تحويل بنكي ($bank_type) | رقم الحوالة: $bank_tn";
} elseif ($payment_method === 'paypal') {
    $paypal_info = $_POST['paypal_info'] ?? '';
    $payment_details = "طريقة الدفع: PayPal | معلومات: $paypal_info";
}

$shipping_address = "الاسم: $full_name | الهاتف: $phone | المدينة: $city | الشارع: $street_address";
if ($nearest_landmark) {
    $shipping_address .= " | أقرب معلم: $nearest_landmark";
}

$shipping_address .= "\n" . $payment_details;

try {
    $pdo->beginTransaction();

    $order_user_id = $user_id ? $user_id : 1; 

    // إنشاء الطلب
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, payment_method, shipping_address, city, street_address, nearest_landmark, shipping_cost) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$order_user_id, $total_amount, $payment_method, $shipping_address, $city, $street_address, $nearest_landmark, $shipping_cost]);
    $order_id = $pdo->lastInsertId();

    // نقل المنتجات لجدول order_items
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)");
    foreach ($items as $item) {
        $stmt->execute([$order_id, $item['product_id'], $item['quantity'], $item['price']]);
    }

    // تفريغ السلة
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE cart_id = ?");
    $stmt->execute([$cart_id]);

    $pdo->commit();
    header("Location: /rawaq/pages/order_success.php?order_id=" . $order_id);
    exit;

} catch (PDOException $e) {
    $pdo->rollBack();
    die("حدث خطأ أثناء معالجة الطلب: " . $e->getMessage());
}
