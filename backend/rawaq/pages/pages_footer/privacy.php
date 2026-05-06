<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "سياسة الخصوصية | رِواق للفضة والأحجار الكريمة";
include $root . '/includes/header.php';
?>

<style>
.page-header {
            background: linear-gradient(135deg, #6b4f3a, #4f3a2b);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
          }
          .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
          }
          .content-container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 0 2rem;
          }
          .policy-section {
            background: white;
            border-radius: 20px;
            padding: 1.8rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
          }
          .policy-section h2 {
            color: #4a2c1a;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
          }
          .policy-section p {
            color: #6b5a4a;
            line-height: 1.8;
            margin-bottom: 0.8rem;
          }
          .last-update {
            text-align: center;
            margin-top: 2rem;
            color: #b48c63;
            font-size: 0.85rem;
          }
          @media (max-width: 768px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>🔒 سياسة الخصوصية</h1>
          <p>نحن نحمي خصوصية معلوماتك</p>
        </div>
        <div class="content-container">
          <div class="policy-section">
            <h2><i class="fas fa-database"></i> جمع المعلومات</h2>
            <p>
              نقوم بجمع المعلومات التي تقدمها لنا عند التسجيل، مثل الاسم، البريد
              الإلكتروني، عنوان الشحن، ورقم الهاتف. نستخدم هذه المعلومات لتأكيد
              الطلبات وتقديم خدمة عملاء متميزة.
            </p>
          </div>
          <div class="policy-section">
            <h2><i class="fas fa-shield-alt"></i> حماية المعلومات</h2>
            <p>
              نستخدم أحدث تقنيات التشفير SSL لحماية معلوماتك أثناء عملية الدفع.
              لا نشارك معلوماتك الشخصية مع أي جهة خارجية دون موافقتك.
            </p>
          </div>
          <div class="policy-section">
            <h2><i class="fas fa-cookie-bite"></i> ملفات تعريف الارتباط</h2>
            <p>
              نستخدم ملفات تعريف الارتباط (كوكيز) لتحسين تجربة التصفح وتذكر
              تفضيلاتك. يمكنك تعطيلها من إعدادات المتصفح.
            </p>
          </div>
          <div class="policy-section">
            <h2><i class="fas fa-envelope"></i> التواصل التسويقي</h2>
            <p>
              يمكنك الاشتراك في النشرة البريدية للحصول على العروض الحصرية، يمكنك
              إلغاء الاشتراك في أي وقت عبر رابط موجود في كل بريد.
            </p>
          </div>
          <div class="last-update">آخر تحديث: 1 يناير 2025</div>
</main>

<?php include $root . '/includes/footer.php'; ?>
