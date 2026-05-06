 <?php
// db_connect.php
// ملف الاتصال بقاعدة البيانات - يستخدم PDO مع إعدادات أمان متقدمة

// بدء الجلسة بشكل آمن إذا لم تكن قد بدأت (لضمان عمل الجلسات في كل مكان)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include language system so translation functions are available everywhere
require_once __DIR__ . '/lang_system.php';

// إعدادات الاتصال بقاعدة البيانات
$host = "localhost";
$dbname = "rawaq_db";
$username = "root";
$password = "";

try {
    // إعدادات PDO المتقدمة لزيادة الأمان والأداء
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,               // رمي الاستثناءات للأخطاء
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          // جلب النتائج كمصفوفة ترابطية
        PDO::ATTR_EMULATE_PREPARES => false,                       // استخدام prepared statements حقيقية (أمان أعلى)
        PDO::ATTR_STRINGIFY_FETCHES => false,                      // عدم تحويل الأرقام إلى نصوص تلقائياً
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,               // معاملة قيم NULL بشكل طبيعي
    ];

    // إنشاء كائن الاتصال PDO مع مجموعة الأحرف المحددة مباشرة
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
    
    // (اختياري) تعيين المنطقة الزمنية للاتصال إذا أردت توقيتاً محدداً
    // $pdo->exec("SET time_zone = '+03:00'");  // مثال للتوقيت العربي

    // الاتصال ناجح - لا حاجة لطباعة أي شيء

} catch (PDOException $e) {
    // تسجيل الخطأ في سجل الخادم (وليس عرضه للمستخدم لأمان أفضل)
    error_log("خطأ في اتصال قاعدة البيانات: " . $e->getMessage());
    
    // يمكن تخصيص رسالة الخطأ حسب بيئة التطوير/الإنتاج
    // هنا نستخدم رسالة عامة للمستخدم النهائي
    die("عذراً، حدث خلل في الاتصال بقاعدة البيانات. يرجى المحاولة لاحقاً.");
    
    // في بيئة التطوير فقط يمكن عرض الخطأ الحقيقي (لا ينصح به في الإنتاج)
    // die("فشل الاتصال: " . $e->getMessage());
}

// لا نغلق الاتصال هنا، فـ PDO يغلقه تلقائياً في نهاية الطلب
?>