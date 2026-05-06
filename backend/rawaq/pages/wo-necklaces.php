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
    <h1>قلائد نسائية</h1>
    <p>تشكيلة فاخرة من القلائد النسائية المصنوعة من الفضة النقية والأحجار الكريمة</p>
  </div>

  <!-- ========== منتجات الصفحة ========== -->
  <div class="additional-content">
    <div class="products-container" id="rings">
        

<!-- المنتج 1 -->
      <div class="product" data-name="قلادة أجنحة القدر بقلب ياقوتي" data-price="30" 
           data-desc="قلادة ساحرة تجمع بين جناح ملاك مرصع بالكريستال وجناح أسود غامض يحيطان بقلب من الزركون الأحمر القاني" 
           data-img="../assets/ass/قلائد/ne1.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne1.jpg" alt="قلادة أجنحة القدر"></div>
        <h3>قلادة أجنحة القدر بقلب ياقوتي</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 2 -->
      <div class="product" data-name="قلادة النبض الحيوي" data-price="25" 
           data-desc="قلادة استثنائية تجسد التفاصيل الدقيقة للقلب البشري بلمسة فنية من المينا الحمراء والمعدن المصقول لتعكس القوة والعاطفة في تصميم عصري فريد" 
           data-img="../assets/ass/قلائد/ne2.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne2.jpg" alt="قلادة النبض الحيوي"></div>
        <h3>قلادة النبض الحيوي</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" data-name="قلادة الريشة الملكية وحجر الجارنيت الكريستالي" data-price="30" 
           data-desc="توليفة راقية تجمع بين ريشة فضية بتفاصيل دقيقة وحجر زركون أحمر بقصة مربعة فاخرة لتقدم تصميماً كلاسيكياً يفيض بالأناقة والتميز." 
           data-img="../assets/ass/قلائد/ne3.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne3.jpg" alt="قلادة الريشة الملكية"></div>
        <h3>قلادة الريشة الملكية</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 4 -->
      <div class="product" data-name="قلادة الانسياب الفضي بحجر التوباز الأزرق" data-price="35" 
           data-desc="قلادة ذات تصميم انسيابي عصري يحتضن حجراً بيضاوياً بلون أزرق سماوي صافٍ، صُممت لتمنح مرتديها لمسة من الهدوء والأناقة الرفيعة في آن واحد." 
           data-img="../assets/ass/قلائد/ne4.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne4.jpg" alt="قلادة توباز أزرق"></div>
        <h3>قلادة الانسياب الفضي بحجر التوباز الأزرق</h3>
        <div class="price-info-row"><span class="price">35$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 5 -->
      <div class="product" data-name="قلادة الأرملة السوداء الفضية" data-price="24" 
           data-desc="قلادة عصرية تتميز بتصميم هندسي دقيق لشكل العنكبوت يتوسطه حجر أسود مصقول، تعكس مزيجاً من الجرأة والأناقة الغامضة لتناسب الإطلالات المتفردة." 
           data-img="../assets/ass/قلائد/ne5.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne5.jpg" alt="قلادة أرملة سوداء"></div>
        <h3>قلادة الأرملة السوداء الفضية</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 6 -->
      <div class="product" data-name="قلادة أعماق المحيط بحجر الزركون الأزرق" data-price="30" 
           data-desc="قلادة دائرية أنيقة تجسد مشهداً بحرياً ساحراً لحوت فضي يغوص في حجر من الزركون الأزرق المتلألئ، لتقدم تصميماً يفيض بالحيوية والصفاء." 
           data-img="../assets/ass/قلائد/be6.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/be6.jpg" alt="قلادة أعماق المحيط"></div>
        <h3>قلادة أعماق المحيط بحجر الزركون الأزرق</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 7 -->
      <div class="product" data-name="قلادة زهرة الأوركيد الكريستالية (جمشت)" data-price="40" 
           data-desc="قلادة فاخرة مصممة على شكل زهرة رباعية الأوراق مرصعة بأربعة أحجار من الزركون الأرجواني بقطع كمثري ومحاطة بإطار من الكريستالات الصغيرة لتمنحك بريقاً استثنائياً في المناسبات الخاصة." 
           data-img="../assets/ass/قلائد/ne7.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne7.jpg" alt="قلادة أوركيد"></div>
        <h3>قلادة زهرة الأوركيد الكريستالية (جمشت)</h3>
        <div class="price-info-row"><span class="price">40$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" data-name="قلادة قلادة الفراشة المتألقة" data-price="28" 
           data-desc="قلادة راقية بتصميم فراشة مرصعة بأحجار الزركون البراقة على خلفية فضية لامعة، تجمع بين الأنوثة والبريق الجذاب لتناسب الإطلالات النهارية والمسائية." 
           data-img="../assets/ass/قلائد/ne8.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/قلائد/ne8.jpg" alt="قلادة فراشة"></div>
        <h3>قلادة الفراشة المتألقة</h3>
        <div class="price-info-row"><span class="price">28$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>


    </div>
  </div>

<?php
require_once $root . '/includes/footer.php';
?>
