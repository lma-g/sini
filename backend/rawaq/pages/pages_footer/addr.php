<?php
$root = dirname(dirname(__DIR__));
require_once $root . '/includes/db_connect.php';
$page_title = "فروع رِواق | الفضة والأحجار الكريمة - صنعاء، إب، تعز";
include $root . '/includes/header.php';
?>

<style>
* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }

          body {
            
            background-color: #faf7f2;
            color: #2c241a;
          }

          /* page header */
          .page-header {
            background: linear-gradient(135deg, #6b4f3a, #4f3a2b);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            border-bottom-left-radius: 2rem;
            border-bottom-right-radius: 2rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
          }

          .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
          }

          .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
          }

          /* branches container */
          .branches-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
          }

          /* branch card */
          .branch-card {
            display: flex;
            flex-wrap: wrap;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(107, 79, 58, 0.12);
          }

          .branch-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.12);
          }

          /* icon section */
          .branch-icon {
            flex: 1;
            min-width: 120px;
            background: linear-gradient(135deg, #f5ede2, #efe3d4);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
          }

          .branch-icon i {
            font-size: 3.5rem;
            color: #6b4f3a;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
          }

          /* info section */
          .branch-info {
            flex: 3;
            padding: 1.8rem;
          }

          .branch-info h3 {
            color: #4a2c1a;
            margin-bottom: 0.5rem;
            font-size: 1.6rem;
            font-weight: 700;
            border-right: 4px solid #b48c63;
            padding-right: 12px;
          }

          .branch-location {
            color: #b48c63;
            margin-bottom: 1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
          }

          .branch-location i {
            font-size: 1rem;
            width: 24px;
            color: #8b694c;
          }

          .branch-details p {
            margin: 0.7rem 0;
            color: #4f3e2e;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
          }

          .branch-details i {
            width: 28px;
            color: #b48c63;
            font-size: 1.1rem;
            text-align: center;
          }

          .map-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 1rem;
            color: #6b4f3a;
            text-decoration: none;
            font-weight: 600;
            background: #f7efe7;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            transition: all 0.2s;
            font-size: 0.9rem;
          }

          .map-link i {
            font-size: 0.9rem;
            transition: transform 0.2s;
          }

          .map-link:hover {
            background-color: #6b4f3a;
            color: white;
          }

          .map-link:hover i {
            transform: translateX(-3px);
          }

          /* decorative footer suggestion (subtle) */
          .footer-note {
            text-align: center;
            padding: 2rem;
            color: #9b7e66;
            border-top: 1px solid #e9dfd3;
            max-width: 1200px;
            margin: 1rem auto 2rem auto;
            font-size: 0.85rem;
          }

          /* responsive */
          @media (max-width: 768px) {
            .page-header h1 {
              font-size: 1.8rem;
            }
            .branch-icon {
              min-width: 80px;
              padding: 1.5rem;
            }
            .branch-icon i {
              font-size: 2.5rem;
            }
            .branch-info h3 {
              font-size: 1.3rem;
            }
            .branches-container {
              padding: 0 1.2rem;
            }
            .branch-card {
              border-radius: 24px;
            }
          }

          @media (max-width: 480px) {
            .branch-details p {
              flex-direction: column;
              align-items: flex-start;
              gap: 4px;
            }
            .branch-details i {
              width: auto;
            }
          }
</style>

<main style="background: #fdfbf9; min-height: 80vh;">
<div class="page-header">
          <h1>📍 فروع رِواق</h1>
          <p>لمسة أصالة يمنية — تشكيلات حصرية من الفضة والأحجار الكريمة</p>
        </div>

        <div class="branches-container">
          <!-- فرع صنعاء (اليمن) - العاصمة -->
          <div class="branch-card">
            <div class="branch-icon">
              <i class="fas fa-landmark"></i>
            </div>
            <div class="branch-info">
              <h3>فرع صنعاء</h3>
              <div class="branch-location">
                <i class="fas fa-map-marker-alt"></i> شارع تعز، حدة، مقابل حديقة
                السبعين، صنعاء - اليمن
              </div>
              <div class="branch-details">
                <p><i class="fas fa-phone-alt"></i> +967 77 123 4567</p>
                <p>
                  <i class="fas fa-clock"></i> السبت - الخميس: 9:00 ص - 10:30 م
                </p>
                <p><i class="fas fa-clock"></i> الجمعة: 2:00 م - 10:00 م</p>
                <p>
                  <i class="fas fa-gem"></i> خدمة التوصيل داخل العاصمة | تصميم
                  مجوهرات حسب الطلب
                </p>
              </div>
              <a href="#" class="map-link"
                ><i class="fas fa-map"></i> عرض على الخريطة
                <i class="fas fa-arrow-left"></i
              ></a>
            </div>
          </div>

          <!-- فرع إب - اليمن -->
          <div class="branch-card">
            <div class="branch-icon">
              <i class="fas fa-tree"></i>
            </div>
            <div class="branch-info">
              <h3>فرع إب</h3>
              <div class="branch-location">
                <i class="fas fa-map-marker-alt"></i> شارع الجيش، وسط المدينة،
                بجوار سوق الذهب القديم، إب - اليمن
              </div>
              <div class="branch-details">
                <p><i class="fas fa-phone-alt"></i> +967 77 234 5678</p>
                <p>
                  <i class="fas fa-clock"></i> السبت - الخميس: 9:30 ص - 9:30 م
                </p>
                <p><i class="fas fa-clock"></i> الجمعة: 1:30 م - 9:30 م</p>
                <p>
                  <i class="fas fa-ring"></i> تشكيلة خاصة من الأحجار الكريمة
                  اليمنية (العقيق، الجزع)
                </p>
              </div>
              <a href="#" class="map-link"
                ><i class="fas fa-map"></i> عرض على الخريطة
                <i class="fas fa-arrow-left"></i
              ></a>
            </div>
          </div>

          <!-- فرع تعز - اليمن -->
          <div class="branch-card">
            <div class="branch-icon">
              <i class="fas fa-mountain-city"></i>
            </div>
            <div class="branch-info">
              <h3>فرع تعز</h3>
              <div class="branch-location">
                <i class="fas fa-map-marker-alt"></i> شارع جمال، حي الروضة،
                مقابل مجمع السعيد التجاري، تعز - اليمن
              </div>
              <div class="branch-details">
                <p><i class="fas fa-phone-alt"></i> +967 77 345 6789</p>
                <p>
                  <i class="fas fa-clock"></i> السبت - الخميس: 10:00 ص - 10:00 م
                </p>
                <p><i class="fas fa-clock"></i> الجمعة: 3:00 م - 10:00 م</p>
                <p>
                  <i class="fas fa-certificate"></i> شهادات أصالة مرفقة | نقاء
                  الفضة 925
                </p>
              </div>
              <a href="#" class="map-link"
                ><i class="fas fa-map"></i> عرض على الخريطة
                <i class="fas fa-arrow-left"></i
              ></a>
            </div>
          </div>

          <!-- ملاحظة تراثية إضافية: فروع سابقة في الرياض وجدة والدمام تم دمجها مع الهوية اليمنية الجديدة،
         ولكن تم إزالة الفروع القديمة حسب متطلبات المشروع: صنعاء، إب، تعز فقط -->
        </div>

        <div class="footer-note">
          <i class="fas fa-hand-sparkles"></i> رِواق للفضة والأحجار الكريمة —
          فروعنا في صنعاء، إب، تعز ننتظركم لتجربة فريدة
        </div>

        <!-- مرجع script.js موجود في المشروع، لا يتعارض مع الصفحة -->
</main>

<script>
(function () {
            // تحسين تجربة المستخدم: عند النقر على "عرض على الخريطة" نعرض رسالة تفيد بفتح الخريطة قريباً،
            // ويمكن ربطها بخرائط جوجل مستقبلاً. لكن نضيف سلوكاً ودوداً بدلاً من الرابط الفارغ.
            const mapLinks = document.querySelectorAll(".map-link");
            mapLinks.forEach((link) => {
              link.addEventListener("click", function (e) {
                e.preventDefault();
                // تحديد اسم الفرع من الـ h3 القريب
                const branchCard = this.closest(".branch-card");
                let branchName = "";
                if (branchCard) {
                  const titleElem = branchCard.querySelector("h3");
                  if (titleElem) branchName = titleElem.innerText.trim();
                }
                // رسالة توضيحية لطيفة لأن العرض على الخريطة قد يكون مستقبلياً أو مدمج مع API
                alert(
                  `📍 سيتم توجيهك إلى خرائط تفاعلية لـ "${branchName}" قريباً. يمكنك استخدام العنوان المذكور للوصول إلينا. شكراً لثقتكم برِواق.`,
                );
              });
            });

            // إضافة تأثير تحسيني لأيقونات الساعات أو تفاصيل إضافية
            console.log("فروع رِواق (صنعاء، إب، تعز) تم تحميلها بنجاح");
          })();
</script>

<?php include $root . '/includes/footer.php'; ?>
