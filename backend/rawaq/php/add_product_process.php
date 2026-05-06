 <?php
// php/add_product_process.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/rawaq/includes/db_connect.php';

// التحقق من الصلاحية (يجب أن تكون admin)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /rawaq/pages/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /rawaq/pages/add_product.php");
    exit();
}

// استقبال البيانات وتنقيتها للتخزين (لا نستخدم htmlspecialchars هنا لأنها للإخراج)
$name = trim($_POST['name'] ?? '');
$price = filter_var($_POST['price'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$description = trim($_POST['description'] ?? '');
$category = trim($_POST['category'] ?? '');

if (empty($name) || empty($price) || empty($category) || empty($_FILES['product_image']['name'])) {
    $_SESSION['admin_error'] = "يرجى ملء جميع الحقول ورفع صورة.";
    header("Location: /rawaq/pages/add_product.php");
    exit();
}

// معالجة الصورة
$image = $_FILES['product_image'];
$allowed = ['jpg','jpeg','png','webp'];
$ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

if (!in_array($ext, $allowed)) {
    $_SESSION['admin_error'] = "نوع الملف غير مدعوم. استخدم JPG, PNG أو WebP.";
    header("Location: /rawaq/pages/add_product.php");
    exit();
}

if ($image['error'] !== UPLOAD_ERR_OK) {
    $_SESSION['admin_error'] = "حدث خطأ أثناء رفع الصورة (الرمز {$image['error']}).";
    header("Location: /rawaq/pages/add_product.php");
    exit();
}

$target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rawaq/assets/images/products/';
if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);

$new_name = 'rawaq_' . time() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
$target_file = $target_dir . $new_name;

if (!move_uploaded_file($image['tmp_name'], $target_file)) {
    $_SESSION['admin_error'] = "فشل نقل الصورة إلى الخادم.";
    header("Location: /rawaq/pages/add_product.php");
    exit();
}

// إدخال في قاعدة البيانات
try {
    $stmt = $pdo->prepare("INSERT INTO products (name, price, description, image, category) VALUES (:name, :price, :desc, :image, :cat)");
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':desc' => $description,
        ':image' => $new_name,
        ':cat' => $category
    ]);
    $_SESSION['admin_success'] = "تم إضافة المنتج بنجاح.";
    header("Location: /rawaq/pages/admin_products.php");
    exit();
} catch (PDOException $e) {
    // حذف الصورة إذا فشلت إدخال البيانات
    unlink($target_file);
    error_log($e->getMessage());
    $_SESSION['admin_error'] = "خطأ في قاعدة البيانات. راجع السجلات.";
    header("Location: /rawaq/pages/add_product.php");
    exit();
}
?>