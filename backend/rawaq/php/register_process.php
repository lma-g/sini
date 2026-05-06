 <?php
// register_process.php
// تم التعديل لتحسين الأمان والتحقق من المدخلات

// استخدام المسار المطلق لضمان الاتصال بقاعدة البيانات
include_once $_SERVER['DOCUMENT_ROOT'] . '/rawaq/includes/db_connect.php';

// بدء الجلسة إذا لم تكن قد بدأت
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// التأكد من أن الطلب هو POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/register.php');
    exit();
}

// استقاذ البيانات الأولية
$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// دالة مساعدة لإعادة التوجيه مع رسالة خطأ
function redirectWithError($errorKey) {
    $_SESSION['register_error'] = $errorKey;
    header('Location: ../pages/register.php');
    exit();
}

// 1. التحقق من عدم وجود حقول فارغة
if (empty($username) || empty($email) || empty($password)) {
    redirectWithError('empty_fields');
}

// 2. التحقق من صحة البريد الإلكتروني
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectWithError('invalid_email');
}

// 3. التحقق من طول اسم المستخدم (مثال: 3 إلى 50 حرفاً)
if (strlen($username) < 3 || strlen($username) > 50) {
    redirectWithError('username_length');
}

// 4. التحقق من قوة كلمة المرور (على الأقل 6 أحرف)
if (strlen($password) < 6) {
    redirectWithError('weak_password');
}

try {
    // 5. التحقق من عدم تكرار البريد الإلكتروني في قاعدة البيانات
    $checkEmail = $pdo->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail->execute([$email]);
    
    if ($checkEmail->rowCount() > 0) {
        redirectWithError('email_exists');
    }

    // 6. تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 7. إدراج المستخدم الجديد (يُستخدم اسم المستخدم كما هو، دون تغيير)
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'customer')");
    $stmt->execute([$username, $email, $hashed_password]);

    // 8. الحصول على معرف المستخدم الجديد
    $user_id = $pdo->lastInsertId();

    // 9. تسجيل دخول المستخدم تلقائياً بعد التسجيل
    $_SESSION['user_id']  = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['role']     = 'customer';
    
    // 10. تخزين رسالة نجاح في الجلسة وعرضها في الصفحة الرئيسية
    $_SESSION['success'] = 'welcome';
    header('Location: ../index.php');
    exit();

} catch (PDOException $e) {
    // تسجيل الخطأ في سجل الخادم وعدم عرضه للمستخدم
    error_log("Database error in register_process: " . $e->getMessage());
    redirectWithError('db_error');
}
?>