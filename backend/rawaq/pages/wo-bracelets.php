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
    <h1>أساور نسائية</h1>
    <p>تشكيلة فاخرة من الأساور النسائية المصنوعة من الفضة النقية والأحجار الكريمة</p>
  </div>

  <!-- ========== منتجات الصفحة ========== -->
  <div class="additional-content">
    <div class="products-container" id="rings">
        


<!-- المنتج 1 -->
      <div class="product" data-name="سوار الإرث العتيق بحجر اليشم الأبيض" data-price="45" 
           data-desc="سوار مفتوح من الفضة المصقولة بتصميم كلاسيكي يجمع بين حجر اليشم الأبيض المستدير وزخارف فضية معقدة يتوسطها فص عقيقي صغير ليعطي لمسة من الفخامة التراثية" 
           data-img="../assets/ass/اساور/bra4.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra4.jpg" alt="سوار يشم أبيض"></div>
        <h3>سوار الإرث العتيق بحجر اليشم الأبيض</h3>
        <div class="price-info-row"><span class="price">45$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 2 -->
      <div class="product" data-name="سوار الأكوامارين الفيكتوري المرصع" data-price="50" 
           data-desc="سوار صلب بتصميم عتيق مزخرف بنقوش يدوية دقيقة، يتوسطه حجر أكوامارين بيضاوي بلمعة ناعمة، مضاف إليه دلاية رقيقة تضفي لمسة من الأنوثة الكلاسيكية" 
           data-img="../assets/ass/اساور/bra1.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra1.jpg" alt="سوار أكوامارين"></div>
        <h3>سوار الأكوامارين الفيكتوري المرصع</h3>
        <div class="price-info-row"><span class="price">50$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" data-name="سوار جارنيت إمبيير المفتوح بنقوش ملكية" data-price="50" 
           data-desc="سوار صلب عالي التفاصيل يتميز بنقوش كلاسيكية بارزة على الطراز العتيق، ينتهي برأسين مرصعين بحجري زركون أحمر بقطع كمثري فاخر ليعكس مظهراً ملكياً يجمع بين القوة والأناقة." 
           data-img="../assets/ass/اساور/bra6.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra6.jpg" alt="سوار جارنيت"></div>
        <h3>سوار جارنيت إمبيير المفتوح بنقوش ملكية</h3>
        <div class="price-info-row"><span class="price">50$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 4 -->
      <div class="product" data-name="سوار السلسلة الكلاسيكي بحجر الزمرد الكريستالي" data-price="35" 
           data-desc="سوار ناعم بتصميم حلقات متصلة (Chain Style) من المعدن المصقول، يتوسطه حجر زركون أخضر بقطع مستطيل فاخر يضفي لمسة من الرقي العصري على معصمك." 
           data-img="../assets/ass/اساور/bra2.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra2.jpg" alt="سوار زمرد"></div>
        <h3>سوار السلسلة الكلاسيكي بحجر الزمرد الكريستالي</h3>
        <div class="price-info-row"><span class="price">35$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 5 -->
      <div class="product" data-name="سوار أرابيسك الفضي المرصع بالجارنيت" data-price="55" 
           data-desc="سوار مشغول بدقة من الفضة المؤكسدة بتصميم يتألف من وحدات زخرفية هندسية بنقوش عربية عتيقة، تتخللها أحجار جارنيت حمراء بقطع مربع لإضفاء لمسة من الفخامة التاريخية." 
           data-img="../assets/ass/اساور/bra7.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra7.jpg" alt="سوار أرابيسك"></div>
        <h3>سوار أرابيسك الفضي المرصع بالجارنيت</h3>
        <div class="price-info-row"><span class="price">55$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 6 -->
      <div class="product" data-name="سوار الإرث الشرقي من الفضة واليشم الأخضر" data-price="40" 
           data-desc="سوار صلب مزخرف بنقوش زهرية دقيقة على الطراز العتيق، يحتضن حجراً مستديراً من اليشم الأخضر الطبيعي يتوسطه رمز 'فو' التقليدي لجلب الحظ والسكينة" 
           data-img="../assets/ass/اساور/bra3.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra3.jpg" alt="سوار يشم أخضر"></div>
        <h3>سوار الإرث الشرقي من الفضة واليشم الأخضر</h3>
        <div class="price-info-row"><span class="price">40$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 7 -->
      <div class="product" data-name="سوار توليب الفضي بحجر الكوارتز الشفاف" data-price="60" 
           data-desc="سوار مصنوع من الفضة المؤكسدة بتصميم مجدول يدويًا، يتألق بحجر كوارتز شفاف بقطع كوشين محاط بإطار فني معقد ووحدات زخرفية جانبية تضفي لمسة من الأناقة التاريخية." 
           data-img="../assets/ass/اساور/bra8.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra8.jpg" alt="سوار كوارتز"></div>
        <h3>سوار توليب الفضي بحجر الكوارتز الشفاف</h3>
        <div class="price-info-row"><span class="price">60$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" data-name="سوار نجمة بالي المجدول بالفضة والذهب" data-price="65" 
           data-desc="سوار يدوي الصنع يتميز بتصميم السلسلة المجدولة التقليدية، يتوسطه شريط فضي مزين بزهور فرانجيباني المطلية بذهب عيار 18 قيراط، مع قفل دائري كلاسيكي يجمع بين المتانة والأناقة الفنية" 
           data-img="../assets/ass/اساور/bra9.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اساور/bra9.jpg" alt="سوار بالي"></div>
        <h3>سوار نجمة بالي المجدول بالفضة والذهب</h3>
        <div class="price-info-row"><span class="price">65$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>




    </div>
  </div>

<?php
require_once $root . '/includes/footer.php';
?>
