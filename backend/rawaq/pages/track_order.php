<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

$page_title = "تتبع الطلب | رِواق";
require_once $root . '/includes/header.php';

$order_id = $_GET['order_id'] ?? '';
$order_data = null;
$error = '';

if ($order_id) {
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->execute([$order_id]);
    $order_data = $stmt->fetch();
    
    if (!$order_data) {
        $error = "لم يتم العثور على طلب بهذا الرقم. يرجى التأكد من رقم الطلب.";
    }
}
?>

<style>
    .tracking-wrapper {
        max-width: 800px;
        margin: 80px auto 50px;
        padding: 40px 20px;
        text-align: center;
    }
    
    .tracking-form {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        border-top: 5px solid #c5a059;
    }
    
    .tracking-form h2 {
        color: #3d2b1f;
        margin-bottom: 20px;
    }
    
    .tracking-input {
        width: 100%;
        max-width: 400px;
        padding: 15px;
        border: 2px solid #eee;
        border-radius: 10px;
        font-size: 16px;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .btn-track {
        background: #3d2b1f;
        color: #fff;
        padding: 15px 40px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .btn-track:hover { background: #c5a059; }
    
    .tracking-result {
        background: #fdfbf9;
        padding: 30px;
        border-radius: 15px;
        border: 1px solid #eedfcb;
        text-align: right;
    }
    
    .status-badge {
        display: inline-block;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: bold;
        color: #fff;
        font-size: 14px;
        margin-bottom: 20px;
    }
    
    .status-pending { background: #f39c12; }
    .status-paid { background: #3498db; }
    .status-shipped { background: #1b6b2f; }
    .status-cancelled { background: #e74c3c; }
    
    .tracking-details p {
        font-size: 16px;
        color: #555;
        margin-bottom: 10px;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 10px;
    }
    
    .tracking-details p strong {
        color: #3d2b1f;
        display: inline-block;
        width: 150px;
    }
    
    .alert-error {
        color: #e74c3c;
        background: #fdf0ed;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>

<div class="tracking-wrapper">
    <div class="tracking-form">
        <h2><i class="fas fa-search-location"></i> تتبع طلبك</h2>
        <p style="color: #777; margin-bottom: 30px;">أدخل رقم الطلب الذي استلمته بعد إتمام عملية الشراء لمعرفة حالة شحنتك.</p>
        
        <form action="track_order.php" method="GET">
            <input type="number" name="order_id" class="tracking-input" placeholder="رقم الطلب (مثال: 1024)" value="<?php echo htmlspecialchars($order_id); ?>" required>
            <br>
            <button type="submit" class="btn-track">تتبع الآن</button>
        </form>
    </div>
    
    <?php if ($error): ?>
        <div class="alert-error">
            <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($order_data): ?>
        <div class="tracking-result">
            <h3 style="color:#3d2b1f; margin-bottom: 20px; text-align:center;">تفاصيل الطلب #<?php echo $order_data['id']; ?></h3>
            
            <div style="text-align:center;">
                <?php
                    $status_class = 'status-pending';
                    $status_text = 'قيد المعالجة';
                    
                    if ($order_data['status'] === 'paid') {
                        $status_class = 'status-paid';
                        $status_text = 'تم الدفع - جاري التجهيز';
                    } elseif ($order_data['status'] === 'shipped') {
                        $status_class = 'status-shipped';
                        $status_text = 'تم الشحن';
                    } elseif ($order_data['status'] === 'cancelled') {
                        $status_class = 'status-cancelled';
                        $status_text = 'ملغي';
                    }
                ?>
                <span class="status-badge <?php echo $status_class; ?>">
                    الحالة: <?php echo $status_text; ?>
                </span>
            </div>
            
            <div class="tracking-details">
                <p><strong>تاريخ الطلب:</strong> <?php echo date('Y-m-d H:i', strtotime($order_data['created_at'])); ?></p>
                <p><strong>المدينة:</strong> <?php echo htmlspecialchars($order_data['city'] ?? 'غير محدد'); ?></p>
                <p><strong>الإجمالي (شامل الشحن):</strong> <span style="color:#1b6b2f; font-weight:bold;"><?php echo number_format($order_data['total_amount'], 2); ?>$</span></p>
                
                <?php if ($order_data['status'] === 'shipped'): ?>
                    <div style="background: #e9f3e6; padding: 15px; border-radius: 10px; margin-top: 20px; border: 1px solid #c3e6cb;">
                        <h4 style="color: #1b6b2f; margin-top:0; margin-bottom:15px;"><i class="fas fa-truck"></i> معلومات شركة التوصيل</h4>
                        <p style="border:none; padding:0;"><strong>الشركة الناقلة:</strong> <?php echo htmlspecialchars($order_data['delivery_company']); ?></p>
                        <p style="border:none; padding:0;"><strong>رقم التتبع / البوليصة:</strong> <span style="font-size:18px; font-weight:bold; letter-spacing:1px; color:#3d2b1f;"><?php echo htmlspecialchars($order_data['tracking_number']); ?></span></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once $root . '/includes/footer.php'; ?>
