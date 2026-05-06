 <?php
// php/logout_process.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/rawaq/includes/db_connect.php';

// منع الوصول المباشر عبر GET (نطلب POST أو الرابط فقط)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_GET['confirm'])) {
    // لكن يمكن السماح بالضغط على رابط تسجيل الخروج مع رسالة تأكيد بسيطة
    // هنا نفضل استخدام POST، لكن للبساطة نسمح بالوصول المباشر مع تدمير الجلسة
}

// تدمير الجلسة بالكامل
$_SESSION = [];   // مسح جميع المتغيرات
session_destroy(); // تدمير الجلسة

// حذف الكوكيز إذا وجدت
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

header("Location: /rawaq/index.php?msg=logged_out");
exit();
?>