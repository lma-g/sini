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
    <h1>أطقم فضة نسائية</h1>
    <p>تشكيلة فاخرة من الأطقم النسائية المصنوعة من الفضة النقية والأحجار الكريمة</p>
  </div>

  <!-- ========== منتجات الصفحة ========== -->
  <div class="additional-content">
    <div class="products-container" id="rings">
        

<!-- المنتج 1 -->
      <div class="product" data-name="طقم القطرة الملكية المرصع بالكامل" data-price="120" 
           data-desc="طقم متكامل يجسد ذروة الفخامة، مصمم بنمط قطرة الندى المتكرر. يتألف من قلادة فاخرة، أقراط متدلية، سوار ناعم، وخاتم مطابق. جميع القطع مرصعة بأحجار الزركون" 
           data-img="../assets/ass/اطقم/si1.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si1.jpg" alt="طقم قطرة ملكية"></div>
        <h3>طقم القطرة الملكية المرصع بالكامل</h3>
        <div class="price-info-row"><span class="price">120$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 2 -->
      <div class="product" data-name="طقم تدرج التنزانيت الفاخر" data-price="130" 
           data-desc="طقم مجوهرات متكامل يتميز بتناغم مذهل بين أحجار الزركون الزرقاء بتدرجات التنزانيت والياقوت الأزرق، مرصعة يدوياً على إطار من الفضة المصقولة" 
           data-img="../assets/ass/اطقم/si2.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si2.jpg" alt="طقم تنزانيت"></div>
        <h3>طقم تدرج التنزانيت الفاخر</h3>
        <div class="price-info-row"><span class="price">130$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" data-name="طقم الأرجوان الملكي المرصع بالجمشت" data-price="80" 
           data-desc="طقم مجوهرات يتألف من قلادة، أقراط متدلية، وخاتم، يتميز بتصميم انسيابي على شكل حرف V مرصع بأحجار الزركون الدقيقة" 
           data-img="../assets/ass/اطقم/si3.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si3.jpg" alt="طقم جمشت"></div>
        <h3>طقم الأرجوان الملكي المرصع بالجمشت</h3>
        <div class="price-info-row"><span class="price">80$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 4 -->
      <div class="product" data-name="طقم سكينة البحر بالأكوامارين والفضة" data-price="100" 
           data-desc="طقم مجوهرات ناعم يعكس الهدوء والصفاء، مصمم من الفضة الإسترلينية مع أحجار أكوامارين طبيعية بقطع كابوشون (Cabochon) أملس" 
           data-img="../assets/ass/اطقم/si4.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si4.jpg" alt="طقم أكوامارين"></div>
        <h3>طقم سكينة البحر بالأكوامارين والفضة</h3>
        <div class="price-info-row"><span class="price">100$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 5 -->
      <div class="product" data-name="طقم ثعلب القرمز المرصع بالياقوت الأحمر" data-price="90" 
           data-desc="طقم مجوهرات بتصميم مبتكر يدمج بين الرمزية الفنية والجمال الكلاسيكي. يتميز بقطع مشغولة على شكل ثعلب من الفضة اللامعة، تحتضن أحجار زركون حمراء (Red Stone) بقطع دائري لافت" 
           data-img="../assets/ass/اطقم/si5.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si5.jpg" alt="طقم ثعلب"></div>
        <h3>طقم ثعلب القرمز المرصع بالياقوت الأحمر</h3>
        <div class="price-info-row"><span class="price">90$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 6 -->
      <div class="product" data-name="طقم الليل الملكي من الأونيكس والفضة عيار 925" data-price="120" 
           data-desc="طقم مجوهرات فاخر مصمم لعشاق الأناقة الغامضة، يتألف من عقد، أقراط متدلية، وخاتم. يتميز الطقم بأحجار أونيكس سوداء (Black Onyx) بقطع دائري كبير ومصقول" 
           data-img="../assets/ass/اطقم/si6.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si6.jpg" alt="طقم أونيكس"></div>
        <h3>طقم الليل الملكي من الأونيكس والفضة</h3>
        <div class="price-info-row"><span class="price">120$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 7 -->
      <div class="product" data-name="طقم الياقوت الأزرق الفضي بتصميم اللانهاية" data-price="90" 
           data-desc="طقم فاخر يجمع بين عمق اللون الأزرق وبريق الفضة، يتميز بتصميم انسيابي متشابك يرمز للأناقة الأبدية. القلادة والأقراط مرصعة بأحجار زرقاء ملكية بقطع دائري" 
           data-img="../assets/ass/اطقم/si7.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si7.jpg" alt="طقم ياقوت أزرق"></div>
        <h3>طقم الياقوت الأزرق الفضي بتصميم اللانهاية</h3>
        <div class="price-info-row"><span class="price">90$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" data-name="طقم البريق الأبدي المرصع بالزركون النقي" data-price="90" 
           data-desc="طقم مجوهرات فاخر يجسد الأناقة الكلاسيكية بلمسة عصرية، يتميز بتصميم انسيابي متشابك (Infinity Style) يرمز للاستمرارية والجمال" 
           data-img="../assets/ass/اطقم/si8.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si8.jpg" alt="طبق بريق أبدي"></div>
        <h3>طقم البريق الأبدي المرصع بالزركون النقي</h3>
        <div class="price-info-row"><span class="price">90$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 9 -->
      <div class="product" data-name="طقم الدانتيل الكريستالي العنقودي" data-price="100" 
           data-desc="طقم مجوهرات فاخر مصمم بأناقة هندسية دقيقة، يجمع بين القضبان الفضية المستقيمة والزخارف العنقودية الدائرية التي تذكر بنعومة الدانتيل" 
           data-img="../assets/ass/اطقم/si9.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si9.jpg" alt="طقم دانتيل"></div>
        <h3>طقم الدانتيل الكريستالي العنقودي</h3>
        <div class="price-info-row"><span class="price">100$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 10 -->
      <div class="product" data-name="طقم الزنبقة الفيكتورية بالزركون الملكي" data-price="130" 
           data-desc="طقم مجوهرات استثنائي يجمع بين سحر التصاميم الفيكتورية ودقة الصياغة الحديثة. يتميز العقد بتصميم عريض يتألف من وحدات زخرفية متكررة على شكل أقواس مرصعة بالكامل بأحجار الزركون الدقيقة" 
           data-img="../assets/ass/اطقم/si10.jpg">
        <div class="product-img-wrapper"><img src="../assets/ass/اطقم/si10.jpg" alt="طقم زنبقة"></div>
        <h3>طقم الزنبقة الفيكتورية بالزركون الملكي</h3>
        <div class="price-info-row"><span class="price">130$</span><button class="info-btn">ⓘ</button></div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>


    </div>
  </div>

<?php
require_once $root . '/includes/footer.php';
?>
