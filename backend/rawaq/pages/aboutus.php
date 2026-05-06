 <?php
// pages/aboutus.php
$root = dirname(__DIR__); // يصل إلى مجلد rawaq
require_once $root . '/includes/db_connect.php';

$page_title = "من نحن | رِواق للفضة والأحجار الكريمة";
include $root . '/includes/header.php';
?>

<main>
    <section class="about-us" style="padding: 80px 0;">
        <div class="container" style="max-width:1280px; margin:auto; padding:0 20px;">
            <div class="about-hero" style="text-align:center; margin-bottom:60px;">
                <h1 style="font-size:2.5rem;">من نحن</h1>
                <p>حكاية عشق للحجر الكريم تروى بلمسة عصرية</p>
            </div>

            <div class="about-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:48px; align-items:center; background:white; border-radius:32px; padding:40px; margin-bottom:80px;">
                <div class="about-text">
                    <h2>رِواق .. حيث تروي الأحجار قصتها</h2>
                    <p>منذ أكثر من <strong>١٥ عاماً</strong> ونحن نسعى لتقديم أرقى تشكيلات الخواتم والأحجار الكريمة والعقيق اليمني الأصيل. تأسست <strong>رِواق</strong> على يد فريق من الخبراء.</p>
                    <p>كل قطعة يتم اختيارها بعناية من أفضل المناجم حول العالم وتصميمها بأيدي محترفين.</p>
                    <p>نؤمن أن الحجر الكريم يعكس شخصية صاحبه ونقدم <strong>شهادات أصالة</strong> لكل قطعة.</p>
                </div>
                <div class="about-image">
                    <img src="/rawaq/assets/ass/ab1.png" alt="خواتم وأحجار كريمة" style="width:100%; border-radius:24px;">
                </div>
            </div>

            <div class="mission-values" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px,1fr)); gap:28px; margin-bottom:80px;">
                <div class="mission-card" style="background:white; padding:32px 24px; border-radius:28px; text-align:center;">
                    <h3>✨ رسالتنا</h3>
                    <p>تقديم أحجار أصلية وتجربة تسوق موثوقة بكل شفافية.</p>
                </div>
                <div class="mission-card">
                    <h3>🔍 أصالة مضمونة</h3>
                    <p>فحص دقيق وشهادات معتمدة لكل حجر كريم.</p>
                </div>
                <div class="mission-card">
                    <h3>💎 تصاميم حصرية</h3>
                    <p>تصاميم فريدة تعبر عن شخصيتك وذوقك الخاص.</p>
                </div>
                <div class="mission-card">
                    <h3>🚚 خدمة مميزة</h3>
                    <p>تغليف فاخر وشحن سريع مع متابعة شحن لحظة بلحظة.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include $root . '/includes/footer.php'; ?>