 <?php
// header.php - بداية الصفحة (يُفتح HTML والـ Body ولا يُغلق)
// لا تبدأ session_start() هنا لأنها في db_connect.php
// لا تستدعي db_connect.php هنا لأن الصفحة الرئيسية تستدعيه قبل تضمين الهيدر
require_once __DIR__ . '/lang_system.php';
?>
<!DOCTYPE html>
<html lang="<?= $current_lang ?>" dir="<?= $text_dir ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/rawaq/assets/css/style.css">
    <?php if (isset($page_title) && $page_title): ?>
        <title><?php echo htmlspecialchars($page_title); ?></title>
    <?php else: ?>
        <title>رِواق | فضة وأحجار كريمة</title>
    <?php endif; ?>
</head>
<body>


<header class="header" id="header">
    <div class="header-container">
        <div class="logo">
            <a href="/rawaq/index.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <img src="/rawaq/assets/ass/رواق.jpeg" alt="رواق" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; margin-left: 10px; border: 2px solid #c5a059;">
                <span style="font-size: 24px; font-weight: bold; color: #c5a059;">رِواق</span>
            </a>
        </div>
        
        <div class="mobile-menu-toggle" id="mobileMenuBtn" style="display: none; font-size: 24px; cursor: pointer; color: #c5a059;">
            <i class="fas fa-bars"></i>
        </div>

        <div class="nav-wrapper">
            <div class="main-nav">
                <a href="/rawaq/index.php"><?= __('home') ?></a>
                <a href="/rawaq/category/wo-rings"><?= __('rings') ?></a>
                <a href="/rawaq/category/stones"><?= __('stones') ?></a>
                <a href="/rawaq/pages/track_order.php"><?= __('track_order') ?></a>
                <a href="/rawaq/pages/aboutus.php"><?= __('about_us') ?></a>
                <a href="/rawaq/index.php#contact"><?= __('contact') ?></a>
            </div>
            <div class="icon-nav">
                <a href="?lang=<?= $current_lang == 'ar' ? 'en' : 'ar' ?>" class="lang-switch" style="font-weight:bold; color:#c5a059; text-decoration:none;">
                    <?= $current_lang == 'ar' ? 'EN' : 'عربي' ?>
                </a>
                <div class="search-box">
                    <form action="/rawaq/pages/products_view.php" method="GET" id="searchForm">
                        <input type="text" name="search" id="searchInput" placeholder="<?= __('search') ?>">
                        <button type="submit" onclick="submitSearch(event)"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <a href="javascript:void(0)" class="cart" id="cartBtn" style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #c5a059; font-weight: bold; font-size: 1.1rem;">
                    <i class="fas fa-shopping-cart" style="font-size: 1.3rem;"></i>
                    <span><?= __('cart') ?></span>
                    <span id="cartBadge" class="badge" style="display:none; background:#c5a059; color:#fff; border-radius:50%; padding:2px 6px; font-size:12px; margin-right:5px;">0</span>
                </a>

                <?php if(isset($_SESSION['user_id'])): ?>
                    <div class="dropdown" style="position: relative; display: inline-block;">
                        <a href="javascript:void(0)" class="user" style="display: flex; align-items: center; gap: 8px; color: #c5a059; font-weight: bold; text-decoration: none; font-size: 1.1rem;">
                            <i class="fas fa-user-check" style="font-size: 1.3rem;"></i>
                            <span><?= __('welcome') ?> <?php echo htmlspecialchars(explode(' ', trim($_SESSION['username'] ?? 'مستخدم'))[0]); ?></span>
                        </a>
                        <ul class="dropdown-menu" style="list-style: none; padding: 10px; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 8px; min-width: 160px;">
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <li style="margin-bottom: 8px; border-bottom: 1px solid #eee; padding-bottom: 8px;">
                                    <a href="/rawaq/pages/admin_products.php" style="color: #c5a059; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                                        <i class="fas fa-cog"></i> إدارة المنتجات
                                    </a>
                                </li>
                                <li style="margin-bottom: 8px; border-bottom: 1px solid #eee; padding-bottom: 8px;">
                                    <a href="/rawaq/pages/admin_orders.php" style="color: #c5a059; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                                        <i class="fas fa-boxes"></i> إدارة الطلبات
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="/rawaq/php/logout.php" style="color: #c62828; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                                    <i class="fas fa-sign-out-alt"></i> تسجيل خروج
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/rawaq/pages/login.php" class="user" style="display: flex; align-items: center; gap: 8px; color: #c5a059; font-weight: bold; text-decoration: none; font-size: 1.1rem;">
                        <i class="fas fa-user" style="font-size: 1.3rem;"></i>
                        <span><?= __('account') ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<style>
.dropdown:hover .dropdown-menu { display: block !important; position: absolute; top: 100%; right: 0; z-index: 1000; min-width: 120px; }
.dropdown-menu { display: none; }
</style>

<!-- ==================== CART SIDEBAR ==================== -->
<div class="cart-overlay" id="overlay"></div>
<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header" style="display:flex; justify-content:space-between; align-items:center; padding:20px; border-bottom:1px solid #eee;">
        <h2>سلة التسوق</h2>
        <span id="closeCart" style="cursor:pointer; font-size:24px;">&times;</span>
    </div>
    <div class="cart-content" id="cartContent" style="padding:20px; overflow-y:auto; max-height:calc(100vh - 150px);">
        <p>جاري التحميل...</p>
    </div>
    <div class="cart-footer" style="padding:20px; border-top:1px solid #eee; position:absolute; bottom:0; width:100%; background:#fff; box-sizing:border-box;">
        <div style="display:flex; justify-content:space-between; margin-bottom:15px; font-weight:bold;">
            <span>الإجمالي:</span>
            <span id="cartTotal">0.00 $</span>
        </div>
        <button id="checkoutBtn" style="width:100%; background:#3d2b1f; color:#fff; border:none; padding:15px; border-radius:8px; cursor:pointer; font-size:16px;">تأكيد الطلب</button>
    </div>
</div>

<script>
document.getElementById('checkoutBtn').addEventListener('click', function() {
    window.location.href = '/rawaq/pages/checkout.php';
});

document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
    document.querySelector('.nav-wrapper').classList.toggle('active');
    const icon = this.querySelector('i');
    if (document.querySelector('.nav-wrapper').classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
});

function submitSearch(e) {
    e.preventDefault();
    const val = document.getElementById('searchInput').value.trim();
    if (val) {
        window.location.href = '/rawaq/search/' + encodeURIComponent(val);
    }
}
</script>

<?php if (!$_SESSION['lang_chosen']): ?>
<div id="welcomeLangModal" class="modal-overlay" style="display:flex; z-index: 10000; background: rgba(0,0,0,0.8);">
    <div class="modal-content" style="text-align:center; padding:40px; background:#fff; border-radius:15px; max-width:400px; width:90%; position:relative; margin:auto;">
        <h2 style="color:#3d2b1f; margin-bottom: 20px;">Welcome / مرحباً</h2>
        <p style="margin-bottom: 30px; color:#666;">Choose your preferred language <br> اختر لغتك المفضلة</p>
        <div style="display:flex; gap:15px; justify-content:center;">
            <a href="?lang=ar" class="cat-btn" style="flex:1; padding:15px; background:#fdfbf9; border:2px solid #c5a059; color:#3d2b1f; text-decoration:none; border-radius:8px; font-weight:bold;">العربية</a>
            <a href="?lang=en" class="cat-btn" style="flex:1; padding:15px; background:#fdfbf9; border:2px solid #c5a059; color:#3d2b1f; text-decoration:none; border-radius:8px; font-weight:bold;">English</a>
        </div>
    </div>
</div>
<style>
body { overflow: hidden; } /* Prevent scrolling until chosen */
</style>
<?php endif; ?>

<!-- لا نغلق body هنا – سيتم الإغلاق في الفوتر -->