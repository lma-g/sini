<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

// حماية الصفحة: التأكد من تسجيل دخول المدير
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // 1. جلب اسم الصورة قبل حذف السجل من قاعدة البيانات
    $stmt = $pdo->prepare("SELECT image FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if ($product) {
        $image_name = $product['image'];
        $image_path = $root . "/assets/images/products/" . $image_name;

        // 2. حذف السجل من قاعدة البيانات أولاً
        $delete_stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $result = $delete_stmt->execute([$id]);

        if ($result) {
            // 3. إذا تم حذف السجل بنجاح، نقوم بحذف الصورة من المجلد لتوفير المساحة
            if (!empty($image_name) && file_exists($image_path)) {
                unlink($image_path);
            }
            
            // يمكن إضافة رسالة نجاح هنا عبر الـ Session إذا أردت
        }
    }
}

// العودة إلى لوحة التحكم بعد الانتهاء
header("Location: admin_products.php?status=deleted");
exit();
?>