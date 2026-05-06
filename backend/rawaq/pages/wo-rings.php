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
    <h1>خواتم نسائية</h1>
    <p>تشكيلة فاخرة من الخواتم النسائية المصنوعة من الفضة النقية والأحجار الكريمة</p>
  </div>

  <!-- ========== منتجات الصفحة ========== -->
  <div class="additional-content">
    <div class="products-container" id="rings">
        

<!-- المنتج 1 -->
      <div class="product" data-name="خاتم حجر القمر المطلي بالذهب" data-price="40" 
           data-desc="خاتم راقٍ يتميز بحجر قمر بيضاوي بقطع كابوشون، يبرز جماله الطبيعي بتصميم انسيابي ناعم مطلي بالذهب، ليمنحك إطلالة هادئة ومفعمة بالرقي والبساطة." 
           data-img="../assets/ass/خواتم نسائي/wr1.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr1.jpg" alt="خاتم حجر القمر"></div>
        <h3>خاتم حجر القمر المطلي بالذهب</h3>
        <div class="price-info-row"><span class="price">40$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 2 -->
      <div class="product" data-name="خاتم الفضة الإسترلينية بتصميم زهور الربيع" data-price="38" 
           data-desc="خاتم فضي ناعم يجمع بين رقة الطبيعة وفخامة التصميم، يتميز بحجر كريم بقطع كابوشون مصقول يحيط به هيكل مزين بزهور فضية دقيقة تضفي لمسة مفعمة بالأنوثة." 
           data-img="../assets/ass/خواتم نسائي/wr4.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr4.jpg" alt="خاتم زهور الربيع"></div>
        <h3>خاتم الفضة الإسترلينية بتصميم زهور الربيع</h3>
        <div class="price-info-row"><span class="price">38$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" data-name="خاتم الفضة الإسترلينية بحجر الكوارتز الوردي" data-price="30" 
           data-desc="خاتم عصري يتميز بحجر كوارتز وردي (Rose Quartz) بقطع روزمات المتعدد الأوجه، يحتضنه إطار من الفضة اللامعة بتصميم انسيابي يمنح اليد مظهراً مفعماً بالنعومة والجاذبية." 
           data-img="../assets/ass/خواتم نسائي/wr2.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr2.jpg" alt="خاتم كوارتز وردي"></div>
        <h3>خاتم الفضة الإسترلينية بحجر الكوارتز الوردي</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 4 -->
      <div class="product" data-name="خاتم غصن الزيتون المرصع بالزركون" data-price="24" 
           data-desc="خاتم فضي بتصميم مفتوح يمثل أغصان الزيتون الرقيقة، مرصع بفصوص الزركون اللامعة التي تضفي لمسة من الأناقة العصرية والبساطة" 
           data-img="../assets/ass/خواتم نسائي/wr5.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr5.jpg" alt="خاتم غصن الزيتون"></div>
        <h3>خاتم غصن الزيتون المرصع بالزركون</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 5 -->
      <div class="product" data-name="خاتم الفضة الإسترلينية المرصع بالعقيق الأحمر الملكي" data-price="45" 
           data-desc="خاتم فاخر يتميز بحجر عقيق أحمر (Ruby Red Agate) بقطع كابوشون بيضاوي بارز، يجمع بين بريق الفضة اللامعة وعمق اللون الأحمر الكلاسيكي، ليمنحك إطلالة ملكية تعكس الفخامة والرقي" 
           data-img="../assets/ass/خواتم نسائي/wr3.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr3.jpg" alt="خاتم عقيق أحمر"></div>
        <h3>خاتم الفضة الإسترلينية المرصع بالعقيق الأحمر الملكي</h3>
        <div class="price-info-row"><span class="price">45$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 6 -->
      <div class="product" data-name="خاتم الفضة المصقول بحجر الأوبال الأبيض" data-price="24" 
           data-desc="خاتم بتصميم عصري وبسيط (Minimalist)، يتميز بهيكل مطلي بالذهب اللامع يتوسطه حجر أوبال أبيض بقطع كابوشون بيضاوي، يجمع بين نعومة اللون وفخامة المعدن ليناسب الإطلالات اليومية والمناسبات الرسمية" 
           data-img="../assets/ass/خواتم نسائي/wr1.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr1.jpg" alt="خاتم أوبال"></div>
        <h3>خاتم الفضة المصقول بحجر الأوبال الأبيض</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 7 -->
      <div class="product" data-name="خاتم الذهب الملكي بحجر الجمشت الأرجواني" data-price="50" 
           data-desc="خاتم استثنائي يتميز بحجر جمشت (Amethyst) كبير بقطع كابوشون بيضاوي، مصاغ بإطار عريض من الذهب المصقول. قطعة تجمع بين الجرأة والفخامة، صُممت لتكون المركز الأساسي لإطلالتك في المناسبات الراقية" 
           data-img="../assets/ass/خواتم نسائي/wr10.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr10.jpg" alt="خاتم جمشت"></div>
        <h3>خاتم الذهب الملكي بحجر الجمشت الأرجواني</h3>
        <div class="price-info-row"><span class="price">50$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" data-name="خاتم الفضة الإسترلينية بتصميم حجر القمر" data-price="40" 
           data-desc="خاتم من الفضة عيار 925 بتصميم فني يجسد تداخل أزهار اللوتس وأوراق الشجر، يتوسطه حجر قمر بيضاوي مصقول بعناية. قطعة فريدة تمزج بين الروح الطبيعية والحرفية العالية لتناسب ذوقك الرفيع" 
           data-img="../assets/ass/خواتم نسائي/wr6.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr6.jpg" alt="خاتم لوتس"></div>
        <h3>خاتم الفضة الإسترلينية</h3>
        <div class="price-info-row"><span class="price">40$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 9 -->
      <div class="product" data-name="خاتم الزمرد الملكي" data-price="50" 
           data-desc="خاتم فاخر يجسد الأناقة الكلاسيكية، يتميز بحجر أخضر عميق بقطع كابوشون بيضاوي يحاكي سحر الزمرد، يحتضنه إطار متشابك مطلي بالذهب الوردي ومرصع بفصوص الزركون الدقيقة لبريق استثنائي في كل حركة." 
           data-img="../assets/ass/خواتم نسائي/wr7.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr7.jpg" alt="خاتم زمرد"></div>
        <h3>خاتم الزمرد الملكي</h3>
        <div class="price-info-row"><span class="price">50$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 10 -->
      <div class="product" data-name="خاتم العقيق الأبيض المصقول (تصميم مزدوج)" data-price="60" 
           data-desc="طقم خواتم يجمع بين التصميم الدائري والمربع، مرصع بحجر العقيق الأبيض بقطع كابوشون بارز، ومحاط بإطار ذهبي كلاسيكي يضفي لمسة من الفخامة العصرية على إطلالتك." 
           data-img="../assets/ass/خواتم نسائي/wr9.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr9.jpg" alt="خاتم عقيق أبيض"></div>
        <h3>خاتم العقيق الأبيض المصقول</h3>
        <div class="price-info-row"><span class="price">60$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 11 -->
      <div class="product" data-name="خاتم الفضة الإسترلينية المرصع بحجر الجمشت الأرجواني" data-price="24" 
           data-desc="خاتم ملكي مصاغ من الفضة عيار 925 بتصميم كلاسيكي فاخر، يتوسطه حجر جمشت أرجواني بقطع كابوشون بيضاوي كبير" 
           data-img="../assets/ass/خواتم نسائي/wr16.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/خواتم نسائي/wr16.jpg" alt="خاتم جمشت أرجواني"></div>
        <h3>خاتم الفضة الإسترلينية الأرجواني</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>


    </div>
  </div>

<?php
require_once $root . '/includes/footer.php';
?>
