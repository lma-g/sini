 <?php
// login_process.php
// معالجة تسجيل الدخول - نسخة محسنة وآمنة

// استخدم المسار المطلق لملف الاتصال بقاعدة البيانات
include_once $_SERVER['DOCUMENT_ROOT'] . '/rawaq/includes/db_connect.php';

// التأكد من وجود جلسة (ملف db_connect.php يبدأها إذا لم تكن موجودة)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// التأكد من أن الطلب POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../pages/login.php');
    exit();
}

// استقبال البيانات وتنظيفها
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']); // مربع "تذكرني"

// دالة مساعدة لإعادة التوجيه مع رسالة خطأ (مخزنة في الجلسة)
function redirectWithLoginError($error_key) {
    $_SESSION['login_error'] = $error_key;
    header('Location: ../pages/login.php');
    exit();
}

// التحقق من عدم وجود حقول فارغة
if (empty($email) || empty($password)) {
    redirectWithLoginError('empty_fields');
}

// التحقق من صيغة البريد الإلكتروني
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectWithLoginError('invalid_email');
}

try {
    // البحث عن المستخدم باستخدام البريد الإلكتروني
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // التحقق من وجود المستخدم وتطابق كلمة المرور
    if ($user && password_verify($password, $user['password'])) {
        
        // تجديد معرف الجلسة لمنع هجمات تثبيت الجلسة (Session Fixation)
        session_regenerate_id(true);

        // تخزين بيانات المستخدم في الجلسة
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['username'];   // تأكد أن اسم العمود 'username' في جدول users
        $_SESSION['role']     = $user['role'];

        // معالجة خيار "تذكرني" (اختياري: إنشاء token وتخزينه في كوكي لمدة أطول)
        if ($remember) {
            // إنشاء رمز عشوائي طويل
            $token = bin2hex(random_bytes(32));
            // تخزين الرمز في قاعدة البيانات (سننشئ جدول user_tokens لاحقاً أو نضيف عمود remember_token)
            // يمكنك إضافة هذا الجزء عند الحاجة. مثال:
            /*
            $updateToken = $pdo->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
            $updateToken->execute([$token, $user['id']]);
            setcookie('remember_token', $token, time() + (86400 * 30), "/", "", false, true); // 30 يومًا
            */
        }

        // إعادة التوجيه حسب الدور
        if ($user['role'] === 'admin') {
            header('Location: ../pages/admin_products.php');
        } else {
            header('Location: ../index.php');
        }
        exit();

    } else {
        // بيانات غير صحيحة (بريد أو كلمة مرور)
        redirectWithLoginError('wrong_credentials');
    }

} catch (PDOException $e) {
    error_log("Login error: " . $e->getMessage());
    redirectWithLoginError('db_error');
}
?>