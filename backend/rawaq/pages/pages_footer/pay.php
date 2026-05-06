<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "طرق الدفع | رِواق للفضة والأحجار الكريمة";
include $root . '/includes/header.php';
?>

<style>
* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          body {
            
            background: #faf6f0;
            color: #2b241c;
          }
          .page-header {
            background: linear-gradient(135deg, #6b4f3a, #4f3a2b);
            color: white;
            padding: 2.8rem 2rem;
            text-align: center;
            border-radius: 0 0 2.5rem 2.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
          }
          .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            font-weight: 800;
            letter-spacing: -0.3px;
          }
          .page-header p {
            font-size: 1.1rem;
            opacity: 0.92;
          }
          .content-container {
            max-width: 1300px;
            margin: 2rem auto 4rem auto;
            padding: 0 2rem;
          }
          /* تصنيفات طرق الدفع */
          .payment-category {
            margin-bottom: 3rem;
          }
          .category-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
            border-right: 5px solid #b48c63;
            padding-right: 1rem;
          }
          .category-title i {
            font-size: 1.9rem;
            color: #6b4f3a;
            background: #efe3d4;
            padding: 0.6rem;
            border-radius: 50%;
          }
          .category-title h2 {
            font-size: 1.7rem;
            color: #3e2a1c;
            font-weight: 700;
          }
          .payments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 1.5rem;
          }
          .pay-card {
            background: white;
            border-radius: 24px;
            padding: 1.6rem 1rem;
            text-align: center;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
            border: 1px solid #f0e4d8;
            backdrop-filter: blur(0px);
          }
          .pay-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 28px rgba(0, 0, 0, 0.1);
            border-color: #dbbc9b;
          }
          .pay-card i {
            font-size: 2.7rem;
            color: #b48c63;
            margin-bottom: 1rem;
            display: inline-block;
          }
          /* لأيقونات المحافظ والصرافات نستخدم فونتويسوم أو إيموجي backup */
          .pay-card .custom-icon {
            font-size: 2.7rem;
            margin-bottom: 0.8rem;
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            background: #f8efe7;
            border-radius: 60px;
            color: #6b4f3a;
          }
          .pay-card h3 {
            color: #4a2c1a;
            margin: 0.5rem 0 0.4rem;
            font-size: 1.25rem;
            font-weight: 700;
          }
          .pay-card p {
            color: #6b5a4a;
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 0.2rem;
          }
          .badge-note {
            font-size: 0.7rem;
            background: #f2e8de;
            display: inline-block;
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
            color: #6b4f3a;
            margin-top: 8px;
          }
          hr {
            margin: 0.5rem 0;
            border-color: #f0e2d4;
          }
          @media (max-width: 700px) {
            .content-container {
              padding: 0 1.2rem;
            }
            .category-title h2 {
              font-size: 1.4rem;
            }
            .payments-grid {
              grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
            .pay-card {
              padding: 1.2rem 0.8rem;
            }
            .pay-card h3 {
              font-size: 1rem;
            }
          }
          @media (max-width: 480px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
          }
          .footer-note {
            text-align: center;
            padding: 1.5rem;
            background: #fffaf5;
            border-top: 1px solid #eedfcb;
            font-size: 0.85rem;
            color: #8f725a;
            margin-top: 2rem;
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>💎 طرق الدفع في رِواق</h1>
          <p>
            نوفر لك多种 خيارات دفع مرنة وآمنة تناسب جميع عملائنا في اليمن
            وخارجها
          </p>
        </div>

        <div class="content-container">
          <!-- 1. الدفع عند الاستلام -->
          <div class="payment-category">
            <div class="category-title">
              <i class="fas fa-truck-fast"></i>
              <h2>📦 الدفع عند الاستلام</h2>
            </div>
            <div class="payments-grid">
              <div class="pay-card">
                <i class="fas fa-money-bill-wave"></i>
                <h3>الدفع عند الاستلام</h3>
                <p>استلام طلبك ودفع قيمته نقداً للمندوب (متاح داخل اليمن)</p>
                <span class="badge-note">خدمة سريعة وآمنة</span>
              </div>
            </div>
          </div>

          <!-- 2. المحافظ الإلكترونية (5 محافظ: جيب, وجوالي, ون كاش, فلوسك, محفظتي) -->
          <div class="payment-category">
            <div class="category-title">
              <i class="fas fa-wallet"></i>
              <h2>📱 المحافظ الإلكترونية</h2>
            </div>
            <div class="payments-grid">
              <!-- جيب -->
              <div class="pay-card">
                <i class="fas fa-mobile-alt"></i>
                <h3>جيب - Jeeb</h3>
                <p>تحويل فوري عبر محفظة جيب</p>
              </div>
              <!-- وجوالي -->
              <div class="pay-card">
                <i class="fas fa-phone-volume"></i>
                <h3>وجوالي - Wejohaly</h3>
                <p>الدفع عبر محفظة وجوالي</p>
              </div>
              <!-- ون كاش -->
              <div class="pay-card">
                <i class="fas fa-coins"></i>
                <h3>ون كاش - OneCash</h3>
                <p>مدفوعات ون كاش السريعة</p>
              </div>
              <!-- فلوسك -->
              <div class="pay-card">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>فلوسك - Floosak</h3>
                <p>محفظة فلوسك الإلكترونية</p>
              </div>
              <!-- محفظتي -->
              <div class="pay-card">
                <i class="fas fa-id-card"></i>
                <h3>محفظتي - Mahfadhti</h3>
                <p>تحويل مباشر عبر محفظتي</p>
              </div>
            </div>
          </div>

          <!-- 3. التحويل عبر شركات الصرافة: النجم، الكريمي العامري، الحزمي -->
          <div class="payment-category">
            <div class="category-title">
              <i class="fas fa-exchange-alt"></i>
              <h2>🏦 شركات الصرافة</h2>
            </div>
            <div class="payments-grid">
              <div class="pay-card">
                <i class="fas fa-star-of-life"></i>
                <h3>النجم للصرافة</h3>
                <p>تحويلات سريعة داخل اليمن</p>
              </div>
              <div class="pay-card">
                <i class="fas fa-building"></i>
                <h3>العامري للصرافة</h3>
                <p>Al-Karimi Al-Amri Exchange</p>
              </div>
              <div class="pay-card">
                <i class="fas fa-handshake"></i>
                <h3>الحزمي للصرافة</h3>
                <p>Al-Hazmi Exchange - موثوقية عالية</p>
              </div>
            </div>
          </div>

          <!-- 4. التحويل البنكي (بنك الكريمي وبنك التضامن) -->
          <div class="payment-category">
            <div class="category-title">
              <i class="fas fa-university"></i>
              <h2>🏛️ التحويل البنكي المحلي</h2>
            </div>
            <div class="payments-grid">
              <div class="pay-card">
                <i class="fas fa-landmark"></i>
                <h3>بنك الكريمي</h3>
                <p>Al-Karimi Bank | تحويلات حساب رِواق</p>
                <span class="badge-note">حساب ريال يمني / دولار</span>
              </div>
              <div class="pay-card">
                <i class="fas fa-hand-holding-heart"></i>
                <h3>بنك التضامن</h3>
                <p>Tadamun Islamic Bank | تحويل إلكتروني</p>
              </div>
            </div>
          </div>

          <!-- 5. الدفع الدولي (PayPal + وسطاء مثل YemenCash) -->
          <div class="payment-category">
            <div class="category-title">
              <i class="fas fa-globe-asia"></i>
              <h2>🌍 طرق دفع دولية</h2>
            </div>
            <div class="payments-grid">
              <div class="pay-card">
                <i class="fab fa-paypal"></i>
                <h3>PayPal</h3>
                <p>دفع آمن بالدولار | جميع البطاقات العالمية</p>
              </div>
              <div class="pay-card">
                <i class="fas fa-charging-station"></i>
                <h3>YemenCash</h3>
                <p>وسيط دفع دولي - YemenCash للمغتربين</p>
                <span class="badge-note">استقبال تحويلات سريعة</span>
              </div>
            </div>
          </div>

          <!-- ملاحظة إضافية: نعرض جميع الخيارات المطلوبة بالكامل -->
          <div
            style="
              background: #fff6ed;
              border-radius: 24px;
              padding: 1.2rem;
              margin-top: 1.5rem;
              text-align: center;
              border-right: 4px solid #b48c63;
            "
          >
            <i
              class="fas fa-shield-alt"
              style="color: #6b4f3a; margin-left: 8px"
            ></i>
            <span style="font-weight: 500"
              >جميع طرق الدفع آمنة ومباشرة. للاستفسار حول أي وسيلة، يرجى مراسلة
              فريق الدعم.</span
            >
          </div>
        </div>

        <div class="footer-note">
          <i class="fas fa-gem"></i> رِواق للفضة والأحجار الكريمة - نقدم لكم
          تجربة تسوق مرنة وآمنة في اليمن والعالم
        </div>

        <!-- script.js الخاص بالمشروع -->
</main>

<script>
(function () {
            // رسائل ودية لعرض تفاصيل إضافية عند النقر على أي بطاقة دفع
            const paymentCards = document.querySelectorAll(".pay-card");
            paymentCards.forEach((card) => {
              card.style.cursor = "pointer";
              card.addEventListener("click", (e) => {
                // تجنب التعارض مع أي روابط
                e.stopPropagation();
                const titleElem = card.querySelector("h3");
                let methodName = titleElem
                  ? titleElem.innerText
                  : "طريقة الدفع";
                // رسالة توضيحية تحترم جميع الخيارات الجديدة
                let extraMessage = "";
                if (methodName.includes("جيب") || methodName.includes("Jeeb"))
                  extraMessage =
                    "محفظة جيب: يمكنك الإيداع عبر تطبيق جيب واستلام تأكيد الدفع فوراً.";
                else if (methodName.includes("وجوالي"))
                  extraMessage =
                    "وجوالي: متاحة لجميع مستخدمي الهواتف المحمولة.";
                else if (methodName.includes("ون كاش"))
                  extraMessage =
                    "OneCash: خدمة سريعة للتحويلات الصغيرة والكبيرة.";
                else if (methodName.includes("فلوسك"))
                  extraMessage = "فلوسك Floosak: محفظة رقمية يمنية متطورة.";
                else if (methodName.includes("محفظتي"))
                  extraMessage = "محفظتي Mahfadhti: سهولة وسرعة في الإرسال.";
                else if (methodName.includes("النجم"))
                  extraMessage =
                    "شركة النجم للصرافة: فروع منتشرة، حوِّل بسهولة إلى حساب رِواق.";
                else if (methodName.includes("الكريمي العامري"))
                  extraMessage =
                    "الكريمي العامري للصرافة: خدمة موثوقة وتحويلات لحظية.";
                else if (methodName.includes("الحزمي"))
                  extraMessage =
                    "الحزمي للصرافة: إحدى كبرى شركات الصرافة في اليمن.";
                else if (methodName.includes("بنك الكريمي"))
                  extraMessage =
                    "بنك الكريمي: الحساب البنكي لرِواق متوفر، يرجى طلب التفاصيل عبر الواتساب.";
                else if (methodName.includes("بنك التضامن"))
                  extraMessage =
                    "بنك التضامن الإسلامي: متوفر للتحويلات المحلية.";
                else if (methodName.includes("PayPal"))
                  extraMessage =
                    "الدفع عبر PayPal: أرسل المبلغ إلى بريد رِواق الإلكتروني مع إشعار الطلب.";
                else if (methodName.includes("YemenCash"))
                  extraMessage =
                    "YemenCash وسيط دفع دولي: مناسب للمغتربين اليمنيين حول العالم.";
                else if (methodName.includes("وسطاء"))
                  extraMessage =
                    "يمكنك استخدام Western Union أو MoneyGram - يرجى التواصل للحصول على بيانات الاستلام.";
                else if (methodName.includes("الدفع عند الاستلام"))
                  extraMessage =
                    "الدفع عند الاستلام متاح لجميع محافظات اليمن (صنعاء، تعز، إب، عدن، حضرموت وغيرها).";
                else
                  extraMessage =
                    "لمزيد من التفاصيل حول هذه الطريقة، يُرجى التواصل مع خدمة العملاء عبر الواتساب.";

                // عرض تنبيه أنيق بدلاً من alert العادي (نستخدم alert مؤقتاً ولكنها مقبولة)
                alert(
                  `🔹 ${methodName}\n${extraMessage}\n\nشكراً لاختيارك رِواق للفضة والأحجار الكريمة.`,
                );
              });
            });
          })();
</script>

<?php include $root . '/includes/footer.php'; ?>
