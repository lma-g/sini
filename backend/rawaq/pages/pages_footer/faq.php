<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "الأسئلة الشائعة | رِواق للفضة والأحجار الكريمة";
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
          .faq-container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 0 2rem;
          }
          .faq-item {
            background: white;
            border-radius: 15px;
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
          }
          .faq-question {
            padding: 1.2rem 1.5rem;
            background: #fefcf9;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
            border-bottom: 1px solid #f0e8df;
          }
          .faq-question:hover {
            background: #f5ede2;
          }
          .faq-question h3 {
            color: #4a2c1a;
            font-size: 1.1rem;
            margin: 0;
          }
          .faq-question i {
            color: #b48c63;
            transition: transform 0.3s;
          }
          .faq-answer {
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            color: #6b5a4a;
            line-height: 1.6;
          }
          .faq-answer.active {
            padding: 1.2rem 1.5rem;
            max-height: 300px;
          }
          @media (max-width: 768px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
            .faq-question h3 {
              font-size: 0.95rem;
            }
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>❓ الأسئلة الشائعة</h1>
          <p>كل ما تريد معرفته عن رِواق ومنتجاتنا</p>
        </div>

        <div class="faq-container">
          <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
              <h3>ما هي أنواع الأحجار الكريمة التي تقدمونها؟</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              نقدم تشكيلة واسعة من الأحجار الكريمة الطبيعية بما في ذلك: العقيق
              اليماني، الفيروز، عين النمر، الياقوت، الزمرد، الكهرمان،
              التورمالين، والكوارتز. جميع أحجارنا طبيعية 100% ومصحوبة بشهادة
              أصالة.
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
              <h3>هل منتجاتكم من الفضة عيار 925؟</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              نعم، جميع منتجاتنا مصنوعة من الفضة عيار 925 النقية والمعتمدة. نحرص
              على استخدام أجود أنواع الفضة لضمان الجودة والمتانة ولمعان يدوم
              طويلاً.
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
              <h3>كيف أتأكد من أصالة الحجر الكريم؟</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              جميع أحجارنا الكريمة مصحوبة بشهادة أصالة من مختبرات معتمدة. كما
              يمكنك فحص الحجر لدى أي خبير مستقل، ونوفر ضمان استرجاع كامل إذا ثبت
              عدم صحة المنتج.
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
              <h3>ما هي طرق الدفع المتاحة؟</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              نقبل الدفع عبر: البطاقات الائتمانية (فيزا، ماستركارد)، التحويل
              البنكي، الدفع عند الاستلام (للمشتريات المحلية)، وأبل باي، وجوجل
              باي.
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
              <h3>كم تستغرق عملية الشحن؟</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              الشحن المحلي: 2-4 أيام عمل. الشحن الدولي: 7-14 يوم عمل. نوفر خدمة
              تتبع الشحنة لحظة بلحظة عبر البريد الإلكتروني.
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
              <h3>هل يمكنني إرجاع المنتج إذا لم يعجبني؟</h3>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
              نعم، نوفر سياسة استبدال وإرجاع مرنة خلال 14 يوم من تاريخ الاستلام،
              بشرط أن يكون المنتج في حالته الأصلية مع الفاتورة والملصقات.
            </div>
</main>

<script>
function toggleFaq(element) {
            let answer = element.nextElementSibling;
            answer.classList.toggle("active");
            let icon = element.querySelector("i");
            if (icon) {
              if (answer.classList.contains("active")) {
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
              } else {
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
              }
            }
          }
</script>

<?php include $root . '/includes/footer.php'; ?>
