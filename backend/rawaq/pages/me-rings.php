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
    <h1>خواتم رجالية</h1>
    <p>تشكيلة فاخرة من الخواتم الرجالية المصنوعة من الفضة النقية والأحجار الكريمة</p>
  </div>

  <!-- ========== منتجات الصفحة ========== -->
  <div class="additional-content">
    <div class="products-container" id="rings">
       
      <!-- المنتج 1 -->
      <div class="product" data-name="عين النمر" data-price="30" 
           data-desc="حجر 'عين النمر' (Tiger's Eye) يتميز بتموجات بنية وذهبية طبيعية تضفي بريقاً حريرياً." 
           data-img="../assets/ass/منتجات/P3.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P3.jpg" alt="عين النمر"></div>
        <h3>عين النمر - تموجات بنية وذهبية طبيعية</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>
 
 <!-- المنتج 2 -->
      <div class="product" data-name="عقيق كبدي فاخر" data-price="37" 
           data-desc="خاتم فاخر بحجر عقيق كبدي (أحمر داكن) كبير الحجم، محاط بإطار فضي سميك بنقوش ماسية الشكل. قطعة جذابة تلفت الأنظار." 
           data-img="../assets/ass/منتجات/P26.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P26.jpg" alt="عقيق كبدي"></div>
        <h3>عقيق كبدي فاخر - إطار فضي بنقوش ماسية</h3>
        <div class="price-info-row"><span class="price">37$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" data-name="كريستال أزرق ملكي" data-price="28" 
           data-desc="كريستال أزرق ملكي (Royal Blue) بقطع 'فيسيت' متعدد الأوجه يعكس الضوء بشكل مبهر." 
           data-img="../assets/ass/منتجات/m1 (2).jpeg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/m1 (2).jpeg" alt="كريستال أزرق"></div>
        <h3>كريستال أزرق ملكي - قطع فيسيت متعدد الأوجه</h3>
        <div class="price-info-row"><span class="price">28$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>
 
      <!-- المنتج 5 -->
      <div class="product" data-name="عين النمر بيضاوي" data-price="22" 
           data-desc="عين النمر (Tiger's Eye) بيضاوي بتموجات بنية وذهبية طبيعية ناعمة." 
           data-img="../assets/ass/منتجات/P5.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P5.jpg" alt="عين النمر بيضاوي"></div>
        <h3>عين النمر بيضاوي - تموجات بنية وذهبية</h3>
        <div class="price-info-row"><span class="price">22$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>
 
      <!-- المنتج 7 -->
      <div class="product" data-name="أونيكس أسود لامع" data-price="32" 
           data-desc="حجر أسود لامع (أونيكس طبيعي) بقطع مربع الشكل أنيق. يتميز بسطحه المصقول بشكل استثنائي، يضيف لمسة دراماتيكية لأي خاتم." 
           data-img="../assets/ass/منتجات/P7.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P7.jpg" alt="أونيكس أسود"></div>
        <h3>أونيكس أسود لامع - قطع مربع أنيق</h3>
        <div class="price-info-row"><span class="price">32$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" data-name="فص أسود دائري" data-price="29" 
           data-desc="فص أسود دائري مسطح مدمج داخل إطار الخاتم بشكل مميز، حجر كريم ناعم ذو ملمس حريري يبرز جمال التصميم." 
           data-img="../assets/ass/منتجات/P8.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P8.jpg" alt="فص أسود"></div>
        <h3>فص أسود دائري مسطح - ملمس حريري</h3>
        <div class="price-info-row"><span class="price">29$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 9 -->
      <div class="product" data-name="أونيكس بنقوش عربية" data-price="26" 
           data-desc="خاتم بحجر أونيكس أسود بيضاوي كبير، يبرز بجمال النقوش العربية (الأرابيسك) الملتوية على كامل الهيكل. تحفة فنية تجمع بين الفخامة والتراث." 
           data-img="../assets/ass/منتجات/P9.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P9.jpg" alt="أونيكس بنقوش عربية"></div>
        <h3>أونيكس أسود - نقوش أرابيسك عربية</h3>
        <div class="price-info-row"><span class="price">26$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 10 -->
      <div class="product" data-name="خاتم ملكي أزرق" data-price="40" 
           data-desc="خاتم ملكي بحجر أزرق داكن محاط بإطار من الفصوص الصغيرة، مع نقش يدوي فاخر على الفضة. تصميم راقٍ يناسب الشخصيات القيادية." 
           data-img="../assets/ass/منتجات/P30.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P30.jpg" alt="خاتم ملكي أزرق"></div>
        <h3>خاتم ملكي أزرق - نقش يدوي فاخر</h3>
        <div class="price-info-row"><span class="price">40$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 11 -->
      <div class="product" data-name="خاتم تراثي فيروزي" data-price="24" 
           data-desc="خاتم تراثي مميز بحجر فيروزي منقوش بكلمات عربية، محاط بإطار أبيض وتفاصيل مرصعة بفصوص. قطعة فنية نادرة." 
           data-img="../assets/ass/منتجات/P29.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P29.jpg" alt="خاتم فيروزي"></div>
        <h3>خاتم تراثي فيروزي - منقوش بكلمات عربية</h3>
        <div class="price-info-row"><span class="price">24$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- 23 -->
      <div class="product" data-name="هلال ونجمة" data-price="36" 
           data-desc="خاتم ملكي بلمسة الهلال والنجمة وحجر أسود فاحم لإطلالة فخمة. تصميم شرقي أصيل." 
           data-img="../assets/ass/منتجات/P17.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P17.jpg" alt="هلال ونجمة" /></div>
        <h3>هلال ونجمة - حجر أسود فاحم بتصميم شرقي</h3>
        <div class="price-info-row"><span class="price">36$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- 18 -->
      <div class="product" data-name="عقيق كبدي مذهب" data-price="28" 
           data-desc="عقيق كبدي بيضاوي محاط بإطار مذهب ونقوش جانبية ملكية تعكس أصالة التراث الرفيع. خاتم يليق بالمناسبات الخاصة." 
           data-img="../assets/ass/منتجات/P22.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P22.jpg" alt="عقيق كبدي مذهب" /></div>
        <h3>عقيق كبدي مذهب - إطار مذهب بنقوش ملكية</h3>
        <div class="price-info-row"><span class="price">28$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- 25 -->
      <div class="product" data-name="طغراء عثماني" data-price="44" 
           data-desc="حجر أونيكس أسود يحمل شعار الطغراء العثماني بإطار مذهب فاخر. قطعة تاريخية فريدة." 
           data-img="../assets/ass/منتجات/P15.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P15.jpg" alt="طغراء عثماني" /></div>
        <h3>طغراء عثماني - أونيكس أسود بإطار مذهب</h3>
        <div class="price-info-row"><span class="price">44$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- 26 -->
      <div class="product" data-name="حجر أسود أرابيسك" data-price="39" 
           data-desc="حجر أسود بقطع زمردي مع نقش 'أرابيسك' جانبي كلاسيكي. دقة الحفر تجعله تحفة فنية." 
           data-img="../assets/ass/منتجات/P14.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P14.jpg" alt="حجر أسود أرابيسك" /></div>
        <h3>حجر أسود أرابيسك - نقش جانبي كلاسيكي</h3>
        <div class="price-info-row"><span class="price">39$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- 30 -->
      <div class="product" data-name="أونيكس بمخالب فضية" data-price="30" 
           data-desc="حجر أونيكس بيضاوي مثبت بمخالب فضية وتصميم جانبي فني معقد. يعكس الحرفية العالية في الصناعة." 
           data-img="../assets/ass/منتجات/P10.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P10.jpg" alt="أونيكس بمخالب" /></div>
        <h3>أونيكس بمخالب فضية - تصميم جانبي فني معقد</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- 31 -->
      <div class="product" data-name="عقيق أحمر منقوش" data-price="30" 
           data-desc="عقيق أحمر مستطيل منقوش بآيات كريمة مع هيكل فضي مزخرف. يجمع بين الروحانية والجمال." 
           data-img="../assets/ass/منتجات/p31.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/p31.jpg" alt="عقيق أحمر منقوش" /></div>
        <h3>عقيق أحمر منقوش - آيات كريمة بهيكل فضي</h3>
        <div class="price-info-row"><span class="price">30$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>
    
      <!-- 19 -->
      <div class="product" data-name="زمرد أخضر مستطيل" data-price="34" 
           data-desc="خاتم مرصع بحجر زمرد أخضر مستطيل، يجمع بين الفضة النقية والتفاصيل الجانبية المتقنة. حجر كريم بلمعة ساحرة." 
           data-img="../assets/ass/منتجات/P21.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/منتجات/P21.jpg" alt="زمرد أخضر" /></div>
        <h3>زمرد أخضر مستطيل - فضة نقية بتفاصيل متقنة</h3>
        <div class="price-info-row"><span class="price">34$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>
 
 
    </div>
  </div>
 
  <?php 
// 3. استدعاء الفوتر في نهاية الملف
include '../includes/footer.php'; 
?>
 

  <!-- ========== سلة التسوق الجانبية ========== -->

<?php
require_once $root . '/includes/footer.php';
?>
