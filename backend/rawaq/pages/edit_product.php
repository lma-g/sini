<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

// حماية الصفحة: التأكد من تسجيل دخول المدير
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// التأكد من وجود معرف المنتج وصحته
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: admin_products.php");
    exit();
}
$id = $_GET['id'];
// جلب بيانات المنتج الحالية
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();
// التحقق من وجود المنتج في قاعدة البيانات
if (!$p) {
    header("Location: admin_products.php");
    exit();
}
// معالجة طلب التحديث
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['desc'];
    $update_stmt = $pdo->prepare("UPDATE products SET name=?, price=?, description=? WHERE id=?");
    $success = $update_stmt->execute([$name, $price, $description, $id]);
    if ($success) {
        header("Location: admin_products.php?status=updated");
        exit();
    }
}

$page_title = 'تعديل منتج | رِواق';
require_once $root . '/includes/header.php';
?>

<style>
:root {
            --primary-gold: #c5a059;
            --dark-brown: #3d2b1f;
            --soft-beige: #f9f6f2;
            --white: #ffffff;
        }

        body { 
            background: var(--soft-beige); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
             
        }

        .card { 
            background: var(--white); 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 15px 40px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 500px; 
            border-top: 5px solid var(--primary-gold);
        }

        h2 { 
            color: var(--dark-brown); 
            text-align: center; 
            margin-bottom: 30px; 
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        label { 
            display: block; 
            margin-bottom: 8px; 
            color: var(--dark-brown); 
            font-size: 14px; 
            font-weight: 700;
        }

        input, textarea { 
            width: 100%; 
            padding: 14px; 
            margin-bottom: 25px; 
            border: 1.5px solid #eee; 
            border-radius: 12px; 
            box-sizing: border-box; 
            background: #fafafa; 
            transition: 0.3s;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            border-color: var(--primary-gold);
            background: #fff;
            outline: none;
            box-shadow: 0 0 10px rgba(197, 160, 89, 0.1);
        }

        button { 
            background: var(--dark-brown); 
            color: white; 
            border: none; 
            padding: 16px; 
            width: 100%; 
            border-radius: 12px; 
            cursor: pointer; 
            font-size: 17px; 
            font-weight: bold;
            transition: 0.4s; 
        }

        button:hover { 
            background: var(--primary-gold); 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(197, 160, 89, 0.3);
        }

        .back-link {
            display: block; 
            text-align: center; 
            margin-top: 20px; 
            color: #888; 
            text-decoration: none; 
            font-size: 14px;
            transition: 0.3s;
        }

        .back-link:hover {
            color: var(--primary-gold);
        }
</style>

<div class="card">
        <h2><i class="fas fa-edit" style="color: var(--primary-gold);"></i> تعديل بيانات القطعة</h2>
        
        <form method="POST">
            <div class="form-group">
                <label>اسم المنتج</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($p['name']); ?>" required>
            </div>

            <div class="form-group">
                <label>السعر الحالي ($)</label>
                <input type="number" step="0.01" name="price" value="<?php echo $p['price']; ?>" required>
            </div>

            <div class="form-group">
                <label>وصف القطعة</label>
                <textarea name="desc" rows="5"><?php echo htmlspecialchars($p['description']); ?></textarea>
            </div>

            <button type="submit">
                <i class="fas fa-save"></i> حفظ التغييرات الملكية
            </button>
            
            <a href="admin_products.php" class="back-link">
                <i class="fas fa-arrow-right"></i> العودة للوحة التحكم
            </a>
        </form>
    </div>

<?php
require_once $root . '/includes/footer.php';
?>