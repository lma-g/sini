<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "الشحن والتوصيل | رِواق للفضة والأحجار الكريمة";
include $root . '/includes/header.php';
?>

<style>
* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        background-color: #faf3e8;
        color: #3e2e23;
        line-height: 1.6;
        
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      /* ========== رأس الصفحة ========== */
      .page-header {
        background: linear-gradient(135deg, #6b4f3a, #4f3a2b);
        color: white;
        padding: 3rem 2rem;
        text-align: center;
        position: relative;
      }

      .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
      }

      .page-header p {
        font-size: 1.1rem;
        opacity: 0.9;
      }

      /* ========== روابط التنقل السريع ========== */
      .nav-links {
        background-color: #fff8f0;
        padding: 0.8rem 2rem;
        text-align: center;
        border-bottom: 1px solid #e0d5c8;
      }

      .nav-links a {
        color: #6b4f3a;
        text-decoration: none;
        margin: 0 1rem;
        font-weight: 500;
        transition: color 0.3s;
      }

      .nav-links a:hover {
        color: #b48c63;
      }

      .nav-links i {
        margin-left: 5px;
      }

      /* ========== الحاوية الرئيسية ========== */
      .content-container {
        max-width: 1000px;
        margin: 3rem auto;
        padding: 0 2rem;
        flex: 1;
      }

      /* ========== بطاقات المعلومات ========== */
      .info-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s;
      }

      .info-card:hover {
        transform: translateY(-3px);
      }

      .info-card h2 {
        color: #4a2c1a;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border-right: 4px solid #b48c63;
        padding-right: 1rem;
      }

      .info-card p {
        color: #6b5a4a;
        line-height: 1.8;
        margin-bottom: 1rem;
      }

      /* ========== جدول الشحن ========== */
      .shipping-table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
      }

      .shipping-table th,
      .shipping-table td {
        border: 1px solid #f0e8df;
        padding: 0.8rem;
        text-align: center;
      }

      .shipping-table th {
        background: #f5ede2;
        color: #4a2c1a;
        font-weight: 600;
      }

      .shipping-table tr:hover {
        background: #fef9f4;
      }

      /* ========== الفروع ========== */
      .branches-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
      }

      .branch-card {
        background: #fef9f4;
        border-radius: 16px;
        padding: 1.2rem;
        text-align: center;
        transition: all 0.3s;
        border: 1px solid #f0e4d6;
      }

      .branch-card:hover {
        background: #f5ede2;
        transform: translateY(-3px);
      }

      .branch-card i {
        font-size: 2rem;
        color: #b48c63;
        margin-bottom: 0.5rem;
      }

      .branch-card h3 {
        color: #4a2c1a;
        margin-bottom: 0.5rem;
      }

      .branch-card p {
        color: #6b5a4a;
        font-size: 0.85rem;
        margin: 0.3rem 0;
      }

      .branch-card .phone {
        color: #b48c63;
        font-weight: 600;
        direction: ltr;
        display: inline-block;
      }

      .highlight {
        color: #b48c63;
        font-weight: bold;
      }

      /* ========== أيقونات مميزة ========== */
      .feature-badge {
        display: inline-block;
        background: #e8d8c8;
        color: #6b4f3a;
        padding: 0.3rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-top: 0.5rem;
      }

      /* ========== زر العودة للأعلى ========== */
      .scroll-top {
        position: fixed;
        bottom: 30px;
        left: 30px;
        background: #6b4f3a;
        color: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        border: none;
        z-index: 100;
      }

      .scroll-top.show {
        opacity: 1;
        visibility: visible;
      }

      .scroll-top:hover {
        background: #4f3a2b;
        transform: scale(1.1);
      }

      /* ========== التجاوب ========== */
      @media (max-width: 768px) {
        .page-header h1 {
          font-size: 1.8rem;
        }

        .shipping-table th,
        .shipping-table td {
          font-size: 0.75rem;
          padding: 0.5rem;
        }

        .nav-links a {
          margin: 0 0.5rem;
          font-size: 0.85rem;
        }

        .branch-card {
          padding: 1rem;
        }
      }

      @media (max-width: 480px) {
        .page-header {
          padding: 2rem 1rem;
        }

        .page-header h1 {
          font-size: 1.5rem;
        }

        .content-container {
          padding: 0 1rem;
        }

        .info-card {
          padding: 1.2rem;
        }

        .info-card h2 {
          font-size: 1.2rem;
        }

        .branches-grid {
          gap: 1rem;
        }
      }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
      <h1>🚚 الشحن والتوصيل</h1>
      <p>نوصل مجوهراتك إلى عتبة دارك بأمان وسرعة - خدمة تغطي اليمن بالكامل</p>
    </div>
 

    <!-- ========== المحتوى الرئيسي ========== -->
    <div class="content-container">
      <!-- سياسة الشحن -->
      <div class="info-card">
        <h2><i class="fas fa-truck"></i> سياسة الشحن</h2>
        <p>
          نوفر خدمة الشحن السريع لجميع أنحاء الجمهورية اليمنية والعالم. نتعاقد
          مع أفضل شركات الشحن لضمان وصول منتجاتكم بأمان. يمكنكم أيضاً زيارة
          فروعنا في <strong>صنعاء، إب، وتعز</strong> لمعاينة المنتجات قبل
          الشراء.
        </p>
      </div>

      <!-- مدة التوصيل -->
      <div class="info-card">
        <h2><i class="fas fa-clock"></i> مدة التوصيل داخل اليمن</h2>
        <table class="shipping-table">
          <tr>
            <th>المدينة</th>
            <th>المدة المتوقعة</th>
            <th>رسوم الشحن</th>
          </tr>
          <tr>
            <td><strong>صنعاء</strong> (الفرع الرئيسي)</td>
            <td>توصيل فوري - خلال 24 ساعة</td>
            <td>مجاني للطلبات فوق 50,000 ريال</td>
          </tr>
          <tr>
            <td><strong>تعز</strong></td>
            <td>1-2 يوم عمل</td>
            <td>2,500 ريال</td>
          </tr>
          <tr>
            <td><strong>إب</strong></td>
            <td>1-2 يوم عمل</td>
            <td>2,500 ريال</td>
          </tr>
          <tr>
            <td>عدن</td>
            <td>2-3 أيام عمل</td>
            <td>3,000 ريال</td>
          </tr>
          <tr>
            <td>المكلا، حضرموت</td>
            <td>3-4 أيام عمل</td>
            <td>3,500 ريال</td>
          </tr>
          <tr>
            <td>باقي المدن اليمنية</td>
            <td>4-6 أيام عمل</td>
            <td>4,000 ريال</td>
          </tr>
        </table>
      </div>

      <!-- فروع رِواق -->
      <div class="info-card" id="branches">
        <h2><i class="fas fa-store"></i> فروع رِواق في اليمن</h2>
        <div class="branches-grid">
          <!-- فرع صنعاء -->
          <div class="branch-card">
            <i class="fas fa-landmark"></i>
            <h3>🏛️ صنعاء - الفرع الرئيسي</h3>
            <p>شارع تعز، جوار سوق الذهب</p>
            <p>📍 صنعاء القديمة - باب اليمن</p>
            <p class="phone"><i class="fas fa-phone"></i> +967 1 234 567</p>
            <span class="feature-badge">معرض رئيسي</span>
          </div>
          <!-- فرع تعز -->
          <div class="branch-card">
            <i class="fas fa-mountain"></i>
            <h3>🏔️ تعز</h3>
            <p>شارع جمال، حي الروضة</p>
            <p>📍 مقابل سوق الذهب القديم</p>
            <p class="phone"><i class="fas fa-phone"></i> +967 4 567 890</p>
            <span class="feature-badge">أحجار نادرة</span>
          </div>
          <!-- فرع إب -->
          <div class="branch-card">
            <i class="fas fa-tree"></i>
            <h3>🌿 إب</h3>
            <p>شارع الثلاثين، حي التحرير</p>
            <p>📍 بجوار مجمع رويال</p>
            <p class="phone"><i class="fas fa-phone"></i> +967 2 345 678</p>
            <span class="feature-badge">تشكيلات حصرية</span>
          </div>
        </div>
      </div>

      <!-- الشحن المجاني -->
      <div class="info-card">
        <h2><i class="fas fa-gift"></i> الشحن المجاني</h2>
        <p>
          نوفر خدمة الشحن المجاني للطلبات التي تتجاوز قيمتها
          <span class="highlight">100,000 ريال يمني</span> داخل الجمهورية
          اليمنية. كما يمكنك الاستلام من أي فرع من فروعنا دون أي رسوم إضافية.
        </p>
      </div>

      <!-- تتبع الشحنة -->
      <div class="info-card">
        <h2><i class="fas fa-box"></i> تتبع الشحنة</h2>
        <p>
          بعد إتمام عملية الشراء، سنرسل لك رابط تتبع الشحنة عبر البريد الإلكتروني
          والواتساب. يمكنك متابعة شحنتك لحظة بلحظة حتى تصل إليك. للاستفسار،
          يمكنك التواصل معنا عبر الواتساب على الرقم
          <span class="highlight">+967 772 885 397</span>.
        </p>
      </div>

      <!-- خدمة الزبائن -->
      <div class="info-card">
        <h2><i class="fas fa-headset"></i> خدمة الزبائن</h2>
        <p>
          فريق خدمة العملاء لدينا متاح من السبت إلى الخميس من 9 صباحاً حتى 9
          مساءً. يمكنك التواصل معنا لمعرفة تفاصيل طلبك أو للاستفسار عن أي
          منتج. كما يمكنك زيارة أقرب فرع إليك في <strong>صنعاء، تعز، أو إب</strong>.
        </p>
      </div>
    </div>

    
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/rawaq/includes/footer.php'; ?>
