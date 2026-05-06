<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "سياسة ملفات تعريف الارتباط | رِواق للفضة والأحجار الكريمة";
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
          .cookies-section {
            background: white;
            border-radius: 20px;
            padding: 1.8rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
          }
          .cookies-section h2 {
            color: #4a2c1a;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
          }
          .cookies-section p,
          .cookies-section li {
            color: #6b5a4a;
            line-height: 1.8;
          }
          .cookie-banner {
            background: #f5ede2;
            border-radius: 15px;
            padding: 1rem;
            text-align: center;
            margin-top: 2rem;
          }
          .cookie-btn {
            background: #6b4f3a;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            margin: 0.5rem;
          }
          .cookie-btn:hover {
            background: #b48c63;
          }
          @media (max-width: 768px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>🍪 ملفات تعريف الارتباط</h1>
          <p>كيف نستخدم الكوكيز لتحسين تجربتك</p>
        </div>
        <div class="content-container">
          <div class="cookies-section">
            <h2>
              <i class="fas fa-info-circle"></i> ما هي ملفات تعريف الارتباط؟
            </h2>
            <p>
              ملفات تعريف الارتباط (كوكيز) هي ملفات نصية صغيرة يتم تخزينها على
              جهازك عند زيارة موقعنا، تساعدنا في تحسين أداء الموقع وتجربة
              المستخدم.
            </p>
          </div>
          <div class="cookies-section">
            <h2><i class="fas fa-chart-line"></i> كيف نستخدم الكوكيز؟</h2>
            <ul>
              <li>تذكر تفضيلاتك وإعداداتك</li>
              <li>تحسين سرعة وأداء الموقع</li>
              <li>تحليل حركة الزوار لفهم كيفية استخدام الموقع</li>
              <li>تقديم محتوى مخصص بناءً على اهتماماتك</li>
            </ul>
          </div>
          <div class="cookies-section">
            <h2><i class="fas fa-cog"></i> أنواع الكوكيز التي نستخدمها</h2>
            <ul>
              <li><strong>كوكيز أساسية:</strong> ضرورية لتشغيل الموقع</li>
              <li><strong>كوكيز وظيفية:</strong> لتحسين تجربة التصفح</li>
              <li><strong>كوكيز تحليلية:</strong> لفهم سلوك الزوار</li>
              <li><strong>كوكيز تسويقية:</strong> لعرض إعلانات ذات صلة</li>
            </ul>
          </div>
          <div class="cookies-section">
            <h2><i class="fas fa-sliders-h"></i> التحكم في الكوكيز</h2>
            <p>
              يمكنك تعطيل الكوكيز من خلال إعدادات المتصفح الخاص بك، لكن قد يؤثر
              ذلك على وظائف الموقع.
            </p>
          </div>
          <div class="cookie-banner">
            <p>
              <i class="fas fa-cookie-bite"></i> نستخدم الكوكيز لتحسين تجربتك.
              باستمرارك في تصفح الموقع، فإنك توافق على استخدامها.
            </p>
            <button
              class="cookie-btn"
              onclick="document.body.removeChild(this.parentElement)"
            >
              قبول</button
            ><button
              class="cookie-btn"
              onclick="alert('يمكنك تعطيل الكوكيز من إعدادات المتصفح')"
            >
              إعدادات
            </button>
          </div>
</main>

<?php include $root . '/includes/footer.php'; ?>
