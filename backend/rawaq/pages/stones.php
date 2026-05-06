<?php
// 1. الاتصال بقاعدة البيانات
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php'; 

// 3. جلب المنتجات المصنفة كأحجار كريمة
$products = [];
try {
    $sql = "SELECT * FROM products WHERE category = 'stones' ORDER BY id DESC";
    $stmt = $pdo->prepare($sql); // Changed $conn to $pdo to match db_connect.php
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // تسجيل الخطأ بدون عرض للمستخدم
    error_log("Database error in stones.php: " . $e->getMessage());
}

$page_title = 'الأحجار الكريمة | رِواق للفضة والأحجار الكريمة';
require_once $root . '/includes/header.php'; 
?>
<style>
/* تنسيقات خاصة بنظام التصفية */
        .stones-hero {
            background: linear-gradient(105deg, #2c211a 0%, #4a3524 100%);
            padding: 5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .stones-hero::before {
            content: '✦';
            font-size: 220px;
            opacity: 0.05;
            position: absolute;
            bottom: -30px;
            left: -30px;
            pointer-events: none;
            transform: rotate(-15deg);
        }

        .stones-hero::after {
            content: '⚜️';
            font-size: 180px;
            opacity: 0.05;
            position: absolute;
            top: -20px;
            right: -20px;
            pointer-events: none;
        }

        .stones-hero h1 {
            font-size: clamp(2.5rem, 7vw, 3.5rem);
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffe6c7, #f3cd9b);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .stones-hero p {
            font-size: 1.25rem;
            max-width: 680px;
            margin: 0 auto;
            color: #f0e2d4;
            font-weight: 400;
        }

        .search-wrapper {
            max-width: 600px;
            margin: 2rem auto 1.5rem;
            position: relative;
        }

        #stoneSearch {
            width: 100%;
            padding: 15px 25px;
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            outline: none;
            
        }

        .quick-tags {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .tag-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #f3cd9b;
            padding: 8px 20px;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            
            font-size: 0.9rem;
        }

        .tag-btn:hover, .tag-btn.active {
            background: #c49a6c;
            color: #fff;
            border-color: #c49a6c;
            transform: translateY(-2px);
        }

        /* شبكة المنتجات الموحدة */
        .stones-grid-container {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .stone-card {
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid rgba(180, 140, 100, 0.15);
            display: flex;
            flex-direction: column;
        }

        .stone-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.12);
            border-color: rgba(196, 126, 58, 0.3);
        }

        .img-box {
            background: linear-gradient(145deg, #faf3ea, #f2e3d4);
            padding: 1.5rem;
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .stone-card:hover .img-box img {
            transform: scale(1.02);
        }

        .info-box {
            padding: 1.5rem;
            text-align: center;
            flex-grow: 1;
        }

        .info-box h3 {
            color: #4a2c1a;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .stone-price {
            display: block;
            color: #1b6b2f;
            font-weight: 800;
            font-size: 1.2rem;
            background: #e9f3e6;
            display: inline-block;
            padding: 4px 16px;
            border-radius: 40px;
            margin-bottom: 15px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .action-btn {
            padding: 10px 16px;
            border-radius: 40px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            
            font-size: 0.85rem;
        }

        .add-btn { 
            background: #6b4f3a; 
            color: #fff; 
            flex: 2;
        }
        
        .details-btn { 
            background: #e7dac8; 
            color: #3b2a1e; 
            flex: 1;
        }

        .add-btn:hover { 
            background: #8b6f50; 
            transform: scale(0.98);
        }
        
        .details-btn:hover {
            background: #cdb694;
            transform: scale(0.98);
        }
        
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem;
            color: #888;
        }

        .no-results i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.3;
            color: #6b4f3a;
        }

        @media (max-width: 768px) {
            .stones-hero {
                padding: 3rem 1rem;
            }
            .stones-grid-container {
                padding: 0 1rem;
                gap: 1.5rem;
            }
            .img-box {
                height: 220px;
            }
        }

        @media (max-width: 480px) {
            .stones-grid-container {
                grid-template-columns: 1fr;
            }
            .btn-group {
                flex-direction: column;
            }
            .action-btn {
                width: 100%;
            }
        }
</style>

<!-- Hero Section خاص بالصفحة -->
    <section class="stones-hero">
        <h1>💎 جواهر الطبيعة الخالدة</h1>
        <p>مجموعة استثنائية من الأحجار الكريمة الطبيعية · أصالة نقية · إشراقة روحية لا تضاهى</p>
        
        <div class="search-wrapper">
            <input type="text" id="stoneSearch" placeholder="ابحث عن حجر (ياقوت، عقيق، تورمالين...)" onkeyup="runFilter()">
        </div>

        <div class="quick-tags">
            <button class="tag-btn active" onclick="setSearch('')">الكل</button>
            <button class="tag-btn" onclick="setSearch('عقيق')">عقيق</button>
            <button class="tag-btn" onclick="setSearch('ياقوت')">ياقوت</button>
            <button class="tag-btn" onclick="setSearch('تورمالين')">تورمالين</button>
            <button class="tag-btn" onclick="setSearch('جارنيت')">جارنيت</button>
            <button class="tag-btn" onclick="setSearch('فيروز')">فيروز</button>
            <button class="tag-btn" onclick="setSearch('لازورد')">لازورد</button>
        </div>
    </section>

    <div class="stones-grid-container" id="stonesGrid">
<?php 
require_once $root . '/includes/footer.php'; 
?>