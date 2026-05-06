 <?php
// 1. استدعاء ملف الاتصال (الذي يبدأ الجلسة ويحتوي على $pdo)
$root = dirname(__DIR__);
include $root . '/includes/db_connect.php';

// 2. حماية الصفحة: التحقق من صلاحيات المدير
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// 3. استدعاء الهيدر
$page_title = "إضافة منتج | رِواق";
require_once $root . '/includes/header.php'; 
?>
<style>
    :root {
        --primary-gold: #c5a059; 
        --dark-brown: #3d2b1f;   
        --soft-beige: #f9f6f2;   
        --white: #ffffff;
    }

    body {
        background-color: var(--soft-beige);
        
        color: var(--dark-brown);
    }

    .admin-container {
        max-width: 700px;
        margin: 120px auto 50px auto; 
        background: var(--white);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        border-top: 6px solid var(--primary-gold);
    }

    .admin-container h2 {
        color: var(--dark-brown);
        text-align: center;
        margin-bottom: 35px;
        font-weight: 800;
        font-size: 24px;
        border-bottom: 2px solid var(--soft-beige);
        padding-bottom: 15px;
    }

    .form-group { margin-bottom: 25px; }
    .form-group label { display: block; margin-bottom: 10px; font-weight: 700; }

    .form-control {
        width: 100%;
        padding: 14px;
        border: 1.5px solid #eee;
        border-radius: 10px;
        box-sizing: border-box; 
    }

    .btn-submit {
        background-color: var(--dark-brown);
        color: white;
        padding: 16px;
        border: none;
        border-radius: 10px;
        width: 100%;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .btn-submit:hover { background-color: var(--primary-gold); }

    /* تنسيق زر العودة للوحة التحكم */
    .btn-back {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #888;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-back:hover { color: var(--primary-gold); text-decoration: underline; }
</style>

<div class="admin-container">
    <h2><i class="fas fa-gem" style="color: var(--primary-gold);"></i> إضافة قطعة جديدة</h2>
    
    <form action="../php/add_product_process.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label><i class="fas fa-tag"></i> اسم المنتج</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-align-left"></i> وصف القطعة</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label><i class="fas fa-dollar-sign"></i> السعر ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
 
        <div class="form-group">
            <label><i class="fas fa-layer-group"></i> التصنيف</label>
            <select name="category" class="form-control" required>
                <option value="" disabled selected>-- اختر القسم --</option>
                <optgroup label="المجموعة الرجالية">
                    <option value="me-rings">خواتم رجالية</option>
                    <option value="me-beads">مسابح رجالية</option>
                </optgroup>
                <optgroup label="المجموعة النسائية">
                    <option value="wo-rings">خواتم نسائية</option>
                    <option value="wo-necklaces">قلائد نسائية</option>
                    <option value="wo-bracelets">أساور نسائية</option>
                    <option value="wo-earrings">أقراط نسائية</option>
                    <option value="wo-sets">أطقم نسائية</option>
                </optgroup>
                <optgroup label="أخرى">
                    <option value="stones">أحجار كريمة خام</option>
                </optgroup>
            </select>
        </div>

        <div class="form-group">
            <label><i class="fas fa-image"></i> صورة المنتج</label>
            <input type="file" name="product_image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-plus-circle"></i> نشر القطعة في المتجر
        </button>

        <!-- الزر المطلوب: العودة للوحة التحكم -->
        <a href="admin_products.php" class="btn-back">
            <i class="fas fa-arrow-right"></i> العودة إلى لوحة التحكم
        </a>
    </form>
</div>

<?php require_once $root . '/includes/footer.php'; ?>