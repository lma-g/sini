<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

// التأكد من تسجيل الدخول كمسؤول
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /rawaq/pages/login.php");
    exit;
}

// معالجة تحديث الطلب
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $delivery_company = $_POST['delivery_company'] ?? null;
    $tracking_number = $_POST['tracking_number'] ?? null;
    
    $stmt = $pdo->prepare("UPDATE orders SET status = ?, delivery_company = ?, tracking_number = ? WHERE id = ?");
    if ($stmt->execute([$status, $delivery_company, $tracking_number, $order_id])) {
        $message = "تم تحديث حالة الطلب #$order_id بنجاح!";
    } else {
        $message = "حدث خطأ أثناء تحديث الطلب.";
    }
}

// جلب الطلبات
$stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
$orders = $stmt->fetchAll();

$page_title = "إدارة الطلبات | رِواق";
require_once $root . '/includes/header.php';
?>

<style>
    .admin-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #eee;
        padding-bottom: 20px;
        margin-bottom: 30px;
    }
    
    .admin-header h1 {
        color: #3d2b1f;
        margin: 0;
    }
    
    .table-container {
        overflow-x: auto;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: right;
    }
    
    table th, table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
    
    table th {
        background: #fdfbf9;
        color: #c5a059;
        font-weight: bold;
    }
    
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        color: white;
    }
    
    .status-pending { background: #f39c12; }
    .status-paid { background: #3498db; }
    .status-shipped { background: #1b6b2f; }
    .status-cancelled { background: #e74c3c; }
    
    .btn-edit {
        background: #c5a059;
        color: #fff;
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }
    .btn-edit:hover { background: #3d2b1f; }
    
    .alert-success {
        background: #e9f3e6;
        color: #1b6b2f;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    /* نافذة التعديل المنبثقة */
    .edit-modal {
        display: none;
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.5);
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }
    
    .edit-modal-content {
        background: #fff;
        padding: 30px;
        border-radius: 20px;
        width: 400px;
        max-width: 90%;
    }
    
    .edit-modal-content h3 { margin-top: 0; color: #3d2b1f; }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; color: #555; }
    .form-control { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
    .btn-save { background: #1b6b2f; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
    .btn-close { background: #e74c3c; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; width: 100%; margin-top: 10px;}
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1>إدارة الطلبات <i class="fas fa-boxes"></i></h1>
        <a href="/rawaq/pages/admin_products.php" class="btn-edit" style="text-decoration:none;">العودة للمنتجات</a>
    </div>
    
    <?php if ($message): ?>
        <div class="alert-success"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>رقم الطلب</th>
                    <th>التاريخ</th>
                    <th>المبلغ</th>
                    <th>المدينة</th>
                    <th>الدفع</th>
                    <th>الحالة</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?php echo $order['id']; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($order['created_at'])); ?></td>
                        <td><?php echo number_format($order['total_amount'], 2); ?>$</td>
                        <td><?php echo htmlspecialchars($order['city'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars(explode(' | ', $order['shipping_address'])[1] ?? '-'); ?></td>
                        <td>
                            <?php
                                $status_class = 'status-pending';
                                $status_text = 'قيد المعالجة';
                                if ($order['status'] === 'paid') { $status_class = 'status-paid'; $status_text = 'تم الدفع'; }
                                elseif ($order['status'] === 'shipped') { $status_class = 'status-shipped'; $status_text = 'تم الشحن'; }
                                elseif ($order['status'] === 'cancelled') { $status_class = 'status-cancelled'; $status_text = 'ملغي'; }
                            ?>
                            <span class="status-badge <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                        </td>
                        <td>
                            <button class="btn-edit" onclick='openEditModal(<?php echo json_encode($order); ?>)'>تحديث الشحن <i class="fas fa-truck"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($orders)): ?>
                    <tr><td colspan="7" style="text-align:center;">لا توجد طلبات حتى الآن.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="editModal" class="edit-modal">
    <div class="edit-modal-content">
        <h3>تحديث حالة الطلب <span id="modalOrderId"></span></h3>
        <form method="POST" action="">
            <input type="hidden" name="update_order" value="1">
            <input type="hidden" name="order_id" id="formOrderId">
            
            <div class="form-group">
                <label>الحالة:</label>
                <select name="status" id="formStatus" class="form-control" required onchange="toggleShippingFields()">
                    <option value="pending">قيد المعالجة</option>
                    <option value="paid">تم الدفع / جاري التجهيز</option>
                    <option value="shipped">تم الشحن</option>
                    <option value="cancelled">ملغي</option>
                </select>
            </div>
            
            <div id="shippingFields" style="display:none; background:#f9f6f2; padding:15px; border-radius:10px; margin-bottom:15px;">
                <div class="form-group">
                    <label>شركة التوصيل:</label>
                    <select name="delivery_company" id="formCompany" class="form-control">
                        <option value="">اختر الشركة...</option>
                        <option value="تطبيق توصيل">تطبيق توصيل</option>
                        <option value="تطبيق ناس">تطبيق ناس</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>رقم التتبع / البوليصة:</label>
                    <input type="text" name="tracking_number" id="formTracking" class="form-control" placeholder="123456789">
                </div>
            </div>
            
            <button type="submit" class="btn-save">حفظ التعديلات</button>
            <button type="button" class="btn-close" onclick="closeEditModal()">إلغاء</button>
        </form>
    </div>
</div>

<script>
function openEditModal(order) {
    document.getElementById('editModal').style.display = 'flex';
    document.getElementById('modalOrderId').innerText = '#' + order.id;
    document.getElementById('formOrderId').value = order.id;
    document.getElementById('formStatus').value = order.status;
    document.getElementById('formCompany').value = order.delivery_company || '';
    document.getElementById('formTracking').value = order.tracking_number || '';
    
    toggleShippingFields();
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

function toggleShippingFields() {
    const status = document.getElementById('formStatus').value;
    document.getElementById('shippingFields').style.display = (status === 'shipped') ? 'block' : 'none';
}
</script>

<?php require_once $root . '/includes/footer.php'; ?>
