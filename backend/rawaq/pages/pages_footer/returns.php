<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "الإرجاع والاستبدال | رِواق للفضة والأحجار الكريمة";
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
            max-width: 1000px;
            margin: 3rem auto;
            padding: 0 2rem;
          }
          .info-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
          }
          .info-card h2 {
            color: #4a2c1a;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
          }
          .info-card p,
          .info-card li {
            color: #6b5a4a;
            line-height: 1.8;
          }
          .steps {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1.5rem;
          }
          .step {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 1rem;
            background: #fefcf9;
            border-radius: 15px;
          }
          .step .num {
            width: 40px;
            height: 40px;
            background: #b48c63;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-weight: bold;
          }
          @media (max-width: 768px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>🔄 الإرجاع والاستبدال</h1>
          <p>نضمن لك تجربة تسوق خالية من المتاعب</p>
        </div>
        <div class="content-container">
          <div class="info-card">
            <h2><i class="fas fa-check-circle"></i> سياسة الإرجاع</h2>
            <p>
              يمكنك إرجاع المنتج خلال <strong>14 يوماً</strong> من تاريخ
              الاستلام في الحالات التالية:
            </p>
            <ul>
              <li>وجود عيب مصنعي في المنتج</li>
              <li>وصول المنتج تالفاً أو مكسوراً</li>
              <li>عدم تطابق المنتج مع المواصفات المذكورة</li>
              <li>الرغبة في استبدال الحجم أو التصميم</li>
            </ul>
          </div>
          <div class="info-card">
            <h2><i class="fas fa-clipboard-list"></i> شروط الإرجاع</h2>
            <ul>
              <li>أن يكون المنتج في حالته الأصلية</li>
              <li>إرفاق الفاتورة الأصلية مع المنتج</li>
              <li>عدم استخدام المنتج بشكل تسبب في تلفه</li>
              <li>إعادة المنتج مع الملصقات والتغليف الأصلي</li>
            </ul>
          </div>
          <div class="info-card">
            <h2><i class="fas fa-phone-alt"></i> طريقة الإرجاع</h2>
            <div class="steps">
              <div class="step">
                <div class="num">1</div>
                <p>اتصل بخدمة العملاء</p>
              </div>
              <div class="step">
                <div class="num">2</div>
                <p>قدم رقم الطلب وسبب الإرجاع</p>
              </div>
              <div class="step">
                <div class="num">3</div>
                <p>استلم مندوب الشحن المنتج</p>
              </div>
              <div class="step">
                <div class="num">4</div>
                <p>استرد المبلغ خلال 7 أيام</p>
              </div>
</main>

<?php include $root . '/includes/footer.php'; ?>
