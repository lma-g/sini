<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';
require_once $root . '/includes/header.php';

// 1. الاتصال بقاعدة البيانات وتعريف الثوابت
// 2. استدعاء الهيدر (الذي سيعتمد على المسارات المعرفة في ملف الاتصال)

?>

<!-- ========== محتوى المنتجات ========== -->
  <div class="additional-content">
    <div class="shop-header">
      <h1>مسابح</h1>
      <p>تشكيلة فاخرة من المسابح الرجالية المصنوعة من العقيق اليماني والأحجار الكريمة</p>
    </div>

    <div class="products-container">
      
      <!-- المنتج 1 -->
      <div class="product" 
           data-name="مسبحة من حجر اللازورد" 
           data-price="45" 
           data-desc="تتميز هذه المسبحة بلون أزرق ملكي عميق يعكس فخامة حجر اللازورد الطبيعي المزين بنقوش فضية يدوية دقيقة." 
           data-img="../assets/ass/مسابح/b1.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b1.jpg" alt="مسبحة لازورد">
        </div>
        <h3>مسبحة من حجر اللازورد مع فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">45$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 2 -->
      <div class="product" 
           data-name="مسبحة من حجر الكهرمان"
           data-price="40" 
           data-desc="مسبحة كهرمان بني وفضة تُجسّد عراقة التراث وفخامة الكهرمان الطبيعي في تصميم يدوي أنيق، لتكون رفيقك المثالي في كل وقت." 
           data-img="../assets/ass/مسابح/b2.png">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b2.png" alt="مسبحة كهرمان">
        </div>
        <h3>مسبحة من حجر الكهرمان مع فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">40$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 3 -->
      <div class="product" 
           data-name="مسبحة من حجر العقيق الأسود" 
           data-price="40" 
           data-desc="تجمع بين فخامة العقيق الأسود وجمال التباين مع التفاصيل الحمراء والفضية، لتمنحك مظهراً عصرياً وأنيقاً يعكس التميز." 
           data-img="../assets/ass/مسابح/b3.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b3.jpg" alt="مسبحة عقيق أسود">
        </div>
        <h3>مسبحة من حجر العقيق الأسود مع فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">40$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 4 -->
      <div class="product" 
           data-name="مسبحة فضية بنقوش العين الزرقاء"
           data-price="70" 
           data-desc="مسبحة فاخرة تجمع بين التصميم الفني العريق والحماية الروحية، مصنوعة من الفضة الخالصة عيار 925 ومزينة بنقوش الدقيقة والتطريز العثماني الأصيل." 
           data-img="../assets/ass/مسابح/b4.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b4.jpg" alt="مسبحة فضية">
        </div>
        <h3>مسبحة فضية بنقوش والتطريز العثماني</h3>
        <div class="price-info-row">
          <span class="price">70$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 5 -->
      <div class="product" 
           data-name="مسبحة فاتوران ألماني صب جديد" 
           data-price="30" 
           data-desc="تتميز بلونها الأحمر الياقوتي الشفاف الذي يزداد جمالاً مع الاستخدام، صُممت بخرز بيضاوي متناسق يمنحك راحة تامة وسلاسة في التسبيح." 
           data-img="../assets/ass/مسابح/b5.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b5.jpg" alt="مسبحة فاتوران">
        </div>
        <h3>مسبحة فاتوران ألماني صب مع كركوشة فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">30$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 6 -->
      <div class="product" 
           data-name="مسبحة حجر المرجان المنقوش" 
           data-price="48" 
           data-desc="تأتي بتصميم ملكي يدمج بين حبات المرجان الأحمر المعتق واللمسات الذهبية الفاخرة، مزينة بقلادة تحمل الطغراء العثمانية لتمنحك قطعة تراثية فريدة تفيض بالهيبة والأناقة." 
           data-img="../assets/ass/مسابح/b6.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b6.jpg" alt="مسبحة مرجان">
        </div>
        <h3>مسبحة حجر مرجان مع كركوشة مطلية بالذهب عيار 21</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 7 -->
      <div class="product" 
           data-name="مسبحة حجر الفيروز التركي" 
           data-price="48" 
           data-desc="تتألق بحبات الفيروز السماوية ذات العروق الطبيعية الجذابة، وتكتمل فخامتها بكركوشة ذهبية تحمل شعار الهلال والنجمة، لتقدم لك تصميماً يجمع بين الأصالة العثمانية والجمال العصري." 
           data-img="../assets/ass/مسابح/b7.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b7.jpg" alt="مسبحة فيروز">
        </div>
        <h3>مسبحة حجر فيروز مع كركوشة مطلية بالذهب عيار 21</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 8 -->
      <div class="product" 
           data-name="مسبحة بكلايت بلجيكي معجن" 
           data-price="48" 
           data-desc="تتميز بتموجات ألوانها الساحرة التي تدمج بين الأصفر والعسلي في نسيج فني فريد، مع كركوشة وفواصل من الفضة المشغولة يدوياً (طرابزون)." 
           data-img="../assets/ass/مسابح/b8.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b8.jpg" alt="مسبحة بكلايت">
        </div>
        <h3>مسبحة بكلايت معجن مع كركوشة فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 9 -->
      <div class="product" 
           data-name="مسبحة بكلايت بلجيكي أصفر" 
           data-price="48" 
           data-desc="تتألق بلونها الأصفر الزاهي وتصميمها الكلاسيكي المريح، حيث تتميز حباتها بلمعة صقيلة وملمس انسيابي يجعلها مثالية للاستخدام اليومي." 
           data-img="../assets/ass/مسابح/b9.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b9.jpg" alt="مسبحة بكلايت أصفر">
        </div>
        <h3>مسبحة بكلايت بلجيكي مع كركوشة قماشية فاخرة</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 10 -->
      <div class="product" 
           data-name="مسبحة كوك مع كركوشة طرابزونية" 
           data-price="48" 
           data-desc="تتميز بلونها البني الداكن المستخلص من ثمار جوز الكوك الطبيعي، وتتزين بمئذنة مطعمة بالفضة والألوان مع كركوشة فضية مشغولة يدوياً." 
           data-img="../assets/ass/مسابح/b10.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b10.jpg" alt="مسبحة كوك">
        </div>
        <h3>مسبحة كوك طبيعي مع فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 11 -->
      <div class="product" 
           data-name="مسبحة سندلوس ألماني زيتوني" 
           data-price="48" 
           data-desc="تتميز بلونها الزيتوني الفريد مع تموجات تعطيها طابعاً تراثياً عريقاً، ومزودة بكركوشة فضية أنيقة مطعمة بالفصوص السوداء." 
           data-img="../assets/ass/مسابح/b11.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b11.jpg" alt="مسبحة سندلوس">
        </div>
        <h3>مسبحة سندلوس مع كركوشة فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
        <button class="add-cart">➕ أضف إلى السلة</button>
      </div>

      <!-- المنتج 12 -->
      <div class="product" 
           data-name="مسبحة الكوك التركي المطعمة" 
           data-price="48" 
           data-desc="تتميز بلونها البني الداكن المستخلص من خشب الكوك الطبيعي، ومزينة بمئذنة مطعمة بالفضة وكركوشة ثقيلة مشغولة يدوياً، لتمنحك قطعة تراثية فاخرة تتميز برائحتها اللطيفة وملمسها الذي يزداد جمالاً مع الاستخدام." 
           data-img="../assets/ass/مسابح/b12.jpg">
        <div class="product-img-wrapper">
          <img src="../assets/ass/مسابح/b12.jpg" alt="مسبحة كوك تركي">
        </div>
        <h3>مسبحة كوك طبيعي مع فضة عيار 925</h3>
        <div class="price-info-row">
          <span class="price">48$</span>
          <button class="info-btn">ⓘ</button>
        </div>
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
