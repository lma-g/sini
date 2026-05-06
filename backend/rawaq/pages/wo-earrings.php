<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';
require_once $root . '/includes/header.php';

// 1. الاتصال بقاعدة البيانات وتعريف الثوابت
// 2. استدعاء الهيدر (الذي سيعتمد على المسارات المعرفة في ملف الاتصال)

?>

<style>
/* تنسيق إضافي للصفحة */
    .page-header {
      text-align: center;
      padding: 2rem 1rem;
      background: linear-gradient(135deg, #faf3e8 0%, #f0e8df 100%);
      margin-bottom: 1rem;
    }
    
    .page-header h1 {
      font-size: 2.5rem;
      color: #4a2c1a;
      font-weight: 700;
    }
    
    .page-header p {
      color: #6b4e2e;
      font-size: 1.1rem;
    }
</style>

<!-- ========== عنوان الصفحة ========== -->
  <div class="page-header">
    <h1>أقراط نسائية</h1>
    <p>تشكيلة فاخرة من الأقراط النسائية المصنوعة من الفضة النقية والأحجار الكريمة</p>
  </div>

  <!-- ========== منتجات الصفحة ========== -->
  <div class="additional-content">
    <div class="products-container" id="rings">
       

<!-- المنتج 1 -->
      <div class="product" data-name="أقراط فراشة المتدلية بالكريستال" data-price="16" 
           data-desc="أقراط استثنائية بتصميم فراشة مرصعة بالكامل بأحجار الزركون البراقة، يتدلى منها سلاسل فضية ناعمة تضفي حركة انسيابية وبريقاً ساحراً يناسب الإطلالات المسائية الراقية." 
           data-img="../assets/ass/اقراط/ea2.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea2.jpg" alt="أقراط فراشة"></div>
        <h3>أقراط فراشة المتدلية بالكريستال</h3>
        <div class="price-info-row"><span class="price">16$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 2 -->
      <div class="product" data-name="أقراط نجم القطب المتدلية بخيط فضي" data-price="14" 
           data-desc="أقراط بتصميم Threader العصري تتميز بنجمتين رباعيتين بلمعة معدنية مصقولة، يربط بينهما سلسلة رقيقة تمنحك مظهراً حالماً يجمع بين البساطة والرقي لإطلالة يومية مميزة" 
           data-img="../assets/ass/اقراط/ea1.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea1.jpg" alt="أقراط نجم القطب"></div>
        <h3>أقراط نجم القطب المتدلية بخيط فضي</h3>
        <div class="price-info-row"><span class="price">14$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" data-name="مشبك أذن تراسل الفراشات المرصع" data-price="18" 
           data-desc="قطعة فنية تغطي منحنى الأذن بتصميم انسيابي يضم أربع فراشات متدرجة الحجم، مرصعة بالكامل بأحجار الزركون اللامعة" 
           data-img="../assets/ass/اقراط/ea3.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea3.jpg" alt="مشبك أذن فراشات"></div>
        <h3>مشبك أذن مرصع</h3>
        <div class="price-info-row"><span class="price">18$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 4 -->
      <div class="product" data-name="مشبك أذن غصن الغار الكريستالي" data-price="15" 
           data-desc="قطعة فنية انسيابية مصممة لتعانق غضروف الأذن، تتميز بصف من أحجار الزركون المستديرة والمتصلة بأوراق شجر فضية ناعمة" 
           data-img="../assets/ass/اقراط/ea4.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea4.jpg" alt="مشبك أذن غصن الغار"></div>
        <h3>مشبك أذن كريستالي</h3>
        <div class="price-info-row"><span class="price">15$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 5 -->
      <div class="product" data-name="أقراط رواق الفراشات بنظام المشبك والسلسلة" data-price="12" 
           data-desc="تصميم Ear Cuff مبتكر يربط بين فص كريستالي لامع في أسفل الأذن ومشبك علوي مزين بفراشة معدنية رقيقة عبر سلسلة فضية انسيابية" 
           data-img="../assets/ass/اقراط/ea5.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea5.jpg" alt="أقراط رواق"></div>
        <h3>أقراط رواق الفراشات بنظام المشبك والسلسلة</h3>
        <div class="price-info-row"><span class="price">12$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 6 -->
      <div class="product" data-name="أقراط كرمة الضياء المتدلية بالزركون" data-price="20" 
           data-desc="أقراط متدلية بتصميم انسيابي مستوحى من أغصان النباتات الرقيقة، مرصعة بأحجار زركون بيضاء بقطع ماركيز(Marquise) اللامع" 
           data-img="../assets/ass/اقراط/ea6.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea6.jpg" alt="أقراط كرمة"></div>
        <h3>أقراط كرمة الضياء المتدلية بالزركون</h3>
        <div class="price-info-row"><span class="price">20$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 7 -->
      <div class="product" data-name="أقراط أجنحة النقاء المتدلية بالزركون" data-price="24" 
           data-desc="أقراط بتصميم ساحر مستوحى من أجنحة الملائكة، مرصعة بأحجار الزركون اللامعة يتدلى منها سلاسل رقيقة تنتهي بقطرات كريستالية شفافة" 
           data-img="../assets/ass/اقراط/ea7.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea7.jpg" alt="أقراط أجنحة"></div>
        <h3>أقراط أجنحة النقاء المتدلية بالزركون</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" data-name="أقراط حلم ليلة مقمرة المتدلية بالزركون" data-price="30" 
           data-desc="أقراط استثنائية بتصميم يجسد سحر السماء الليلية، يجمع بين شكل الهلال المرصع بالكامل بأحجار الزركون البراقة، ومجموعة من النجوم المتلألئة" 
           data-img="../assets/ass/اقراط/ea8.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اقراط/ea8.jpg" alt="أقراط هلال"></div>
        <h3>أقراط حلم ليلة مقمرة المتدلية بالزركون</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>


    </div>
  </div>

<?php
require_once $root . '/includes/footer.php';
?>
