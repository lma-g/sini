<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

$order_id = $_GET['order_id'] ?? null;

if (!$order_id) {
    header("Location: /rawaq/index.php");
    exit;
}

$page_title = "تم الطلب بنجاح | رِواق";
require_once $root . '/includes/header.php';
?>

<style>
    .success-container {
        max-width: 600px;
        margin: 150px auto;
        padding: 40px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        text-align: center;
        border-top: 6px solid #1b6b2f;
    }
    
    .success-icon {
        font-size: 80px;
        color: #1b6b2f;
        margin-bottom: 20px;
        animation: scaleIn 0.5s ease;
    }
    
    @keyframes scaleIn {
        0% { transform: scale(0); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    .success-container h1 {
        color: #3d2b1f;
        font-size: 28px;
        margin-bottom: 10px;
    }
    
    .success-container p {
        color: #666;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    
    .order-number {
        background: #f9f6f2;
        padding: 15px;
        border-radius: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #c5a059;
        margin-bottom: 30px;
        display: inline-block;
        border: 1px dashed #d4a373;
    }
    
    .btn-home {
        display: inline-block;
        background: #3d2b1f;
        color: #fff;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }
    
    .btn-home:hover {
        background: #c5a059;
        transform: translateY(-2px);
    }
</style>

<div class="success-container">
    <div class="success-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <h1>شكراً لك! تم استلام طلبك بنجاح</h1>
    <p>لقد تلقينا طلبك بنجاح، فريقنا الآن يعمل على تجهيز القطع الفاخرة التي اخترتها وسنقوم بالتواصل معك قريباً لتأكيد التوصيل.</p>
    
    <div class="order-number">
        رقم الطلب: #<?php echo htmlspecialchars($order_id); ?>
    </div>
    
    <br>
    
    <a href="/rawaq/index.php" class="btn-home">
        العودة للصفحة الرئيسية <i class="fas fa-arrow-left"></i>
    </a>
    <a href="/rawaq/pages/track_order.php?order_id=<?php echo htmlspecialchars($order_id); ?>" class="btn-home" style="background:#1b6b2f; margin-right:10px;">
        تتبع حالة الطلب <i class="fas fa-map-marker-alt"></i>
    </a>
</div>

<?php require_once $root . '/includes/footer.php'; ?>
