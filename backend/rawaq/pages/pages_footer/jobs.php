<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "وظائف | رِواق للفضة والأحجار الكريمة";
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
          .jobs-container {
            max-width: 1000px;
            margin: 3rem auto;
            padding: 0 2rem;
          }
          .job-card {
            background: white;
            border-radius: 20px;
            padding: 1.8rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            border-right: 4px solid #b48c63;
          }
          .job-card:hover {
            transform: translateX(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
          }
          .job-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 1rem;
          }
          .job-header h3 {
            color: #4a2c1a;
            font-size: 1.3rem;
          }
          .job-type {
            background: #f5ede2;
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            color: #6b4f3a;
          }
          .job-location {
            color: #b48c63;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
          }
          .job-desc {
            color: #6b5a4a;
            line-height: 1.6;
            margin-bottom: 1rem;
          }
          .apply-btn {
            background: #6b4f3a;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.3s;
          }
          .apply-btn:hover {
            background: #b48c63;
          }
          .send-cv {
            background: #f5ede2;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            margin-top: 2rem;
          }
          .send-cv h3 {
            color: #4a2c1a;
            margin-bottom: 1rem;
          }
          .send-cv p {
            color: #6b5a4a;
            margin-bottom: 1rem;
          }
          .email-cv {
            color: #6b4f3a;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
          }
          @media (max-width: 768px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
            .job-header {
              flex-direction: column;
              align-items: flex-start;
              gap: 0.5rem;
            }
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>💼 وظائف في رِواق</h1>
          <p>انضم إلى فريقنا وكن جزءاً من نجاحنا</p>
        </div>

        <div class="jobs-container">
          <div class="job-card">
            <div class="job-header">
              <h3>أخصائي مبيعات مجوهرات</h3>
              <span class="job-type"
                ><i class="fas fa-clock"></i> دوام كامل</span
              >
            </div>
            <div class="job-location">
              <i class="fas fa-map-marker-alt"></i> الرياض - جدة - الدمام
            </div>
            <div class="job-desc">
              نبحث عن أخصائي مبيعات ذو خبرة في مجال المجوهرات والأحجار الكريمة،
              يجيد التعامل مع العملاء ولديه معرفة بمنتجات الفضة والأحجار.
            </div>
            <button
              class="apply-btn"
              onclick="
                showNotification(
                  'تم استلام طلبك، سنتواصل معك قريباً',
                  'success',
                )
              "
            >
              تقديم طلب
            </button>
          </div>

          <div class="job-card">
            <div class="job-header">
              <h3>مصمم مجوهرات</h3>
              <span class="job-type"
                ><i class="fas fa-clock"></i> دوام كامل</span
              >
            </div>
            <div class="job-location">
              <i class="fas fa-map-marker-alt"></i> الرياض (الفرع الرئيسي)
            </div>
            <div class="job-desc">
              مطلوب مصمم مجوهرات مبدع لديه القدرة على تصميم قطع فريدة من الفضة
              والأحجار الكريمة، خبرة في برامج التصميم.
            </div>
            <button
              class="apply-btn"
              onclick="
                showNotification(
                  'تم استلام طلبك، سنتواصل معك قريباً',
                  'success',
                )
              "
            >
              تقديم طلب
            </button>
          </div>

          <div class="job-card">
            <div class="job-header">
              <h3>خبير أحجار كريمة</h3>
              <span class="job-type"
                ><i class="fas fa-clock"></i> دوام جزئي</span
              >
            </div>
            <div class="job-location">
              <i class="fas fa-map-marker-alt"></i> عن بعد / الرياض
            </div>
            <div class="job-desc">
              نبحث عن خبير في مجال الأحجار الكريمة لتقييم وفحص الأحجار والتأكد
              من أصالتها وجودتها.
            </div>
            <button
              class="apply-btn"
              onclick="
                showNotification(
                  'تم استلام طلبك، سنتواصل معك قريباً',
                  'success',
                )
              "
            >
              تقديم طلب
            </button>
          </div>

          <div class="send-cv">
            <h3>📧 لم تجد الوظيفة المناسبة؟</h3>
            <p>
              أرسل سيرتك الذاتية وسنضعها في ملف المتقدمين للوظائف المستقبلية
            </p>
            <a href="mailto:careers@riwaq.com" class="email-cv"
              ><i class="fas fa-envelope"></i> careers@riwaq.com</a
            >
          </div>
</main>

<?php include $root . '/includes/footer.php'; ?>
