<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'] ?? null;
$session_id = session_id();

// جلب السلة
if ($user_id) {
    $stmt = $pdo->prepare("SELECT id FROM carts WHERE user_id = ? LIMIT 1");
    $stmt->execute([$user_id]);
} else {
    $stmt = $pdo->prepare("SELECT id FROM carts WHERE session_id = ? AND user_id IS NULL LIMIT 1");
    $stmt->execute([$session_id]);
}

$cart = $stmt->fetch();
$items = [];
$total_amount = 0;

if ($cart) {
    $stmt = $pdo->prepare("
        SELECT ci.quantity, p.name, p.price, p.image 
        FROM cart_items ci 
        JOIN products p ON ci.product_id = p.id 
        WHERE ci.cart_id = ?
    ");
    $stmt->execute([$cart['id']]);
    $items = $stmt->fetchAll();
    
    foreach ($items as $item) {
        $total_amount += $item['price'] * $item['quantity'];
    }
}

// إذا كانت السلة فارغة يتم إرجاع المستخدم للرئيسية
if (empty($items)) {
    header("Location: /rawaq/index.php");
    exit;
}

$page_title = __('checkout_title');
require_once $root . '/includes/header.php';
?>

<style>
    .checkout-wrapper {
        max-width: 1100px;
        margin: 120px auto 50px;
        padding: 0 20px;
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }
    
    .checkout-form, .order-summary {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border-top: 5px solid #c5a059;
    }
    
    .checkout-form {
        flex: 2;
        min-width: 300px;
    }
    
    .order-summary {
        flex: 1;
        min-width: 300px;
        height: fit-content;
    }

    h2 { color: #3d2b1f; margin-bottom: 25px; font-size: 22px; }
    
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #fdfbf9;
    }
    
    .payment-options { display: flex; flex-direction: column; gap: 15px; margin-top: 20px; }
    .payment-option {
        background: #f9f6f2;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #eee;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }
    
    .extra-fields {
        display: none;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #ddd;
    }
    
    .btn-submit {
        background: #3d2b1f;
        color: #fff;
        padding: 15px;
        width: 100%;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 20px;
        transition: 0.3s;
    }
    .btn-submit:hover { background: #c5a059; }
    
    .summary-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    .summary-item img { width: 60px; height: 60px; border-radius: 10px; object-fit: cover; }
    
    .total-row {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        font-weight: bold;
        color: #c5a059;
        margin-top: 20px;
    }
</style>

<div class="checkout-wrapper">
    <!-- Form Section -->
    <div class="checkout-form">
        <h2><i class="fas fa-truck"></i> <?= __('shipping_details') ?></h2>
        <form action="/rawaq/php/checkout_process.php" method="POST">
            
            <div class="form-group">
                <label><?= __('full_name') ?></label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label><?= __('phone') ?></label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label><?= __('city') ?></label>
                <select name="city" id="citySelect" class="form-control" required onchange="updateShipping()">
                    <option value="" disabled selected><?= __('choose_city') ?></option>
                    <option value="صنعاء" data-cost="0"><?= __('sanaa') ?></option>
                    <option value="تعز" data-cost="3000"><?= __('taiz') ?></option>
                    <option value="إب" data-cost="3000"><?= __('ibb') ?></option>
                    <option value="أخرى" data-cost="4000"><?= __('other_cities') ?></option>
                </select>
            </div>
            
            <div class="form-group">
                <label><?= __('street') ?></label>
                <input type="text" name="street_address" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label><?= __('landmark') ?></label>
                <input type="text" name="nearest_landmark" class="form-control">
            </div>

            <h3 style="margin-top: 30px; color:#3d2b1f; font-size:18px;"><?= __('payment_method') ?></h3>
            
            <div class="payment-options">
                <!-- 1. الدفع عند الاستلام -->
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="cod" checked onchange="togglePaymentFields()">
                    <span><i class="fas fa-money-bill-wave"></i> <?= __('cod') ?></span>
                </label>
                
                <!-- 2. المحافظ الإلكترونية -->
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="wallet" onchange="togglePaymentFields()">
                    <span><i class="fas fa-wallet"></i> <?= __('wallets') ?></span>
                </label>
                <div id="wallet_field" class="extra-fields form-group">
                    <label><?= __('choose_wallet') ?></label>
                    <select name="wallet_type" class="form-control" style="margin-bottom: 10px;">
                        <option value="جيب">جيب</option>
                        <option value="جوالي">جوالي</option>
                        <option value="ون كاش">ون كاش</option>
                        <option value="فلوسك">فلوسك</option>
                    </select>
                    <label><?= __('transfer_number') ?></label>
                    <input type="text" name="wallet_transfer_number" class="form-control">
                </div>
                
                <!-- 3. شركات الصرافة -->
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="exchange" onchange="togglePaymentFields()">
                    <span><i class="fas fa-exchange-alt"></i> <?= __('exchange') ?></span>
                </label>
                <div id="exchange_field" class="extra-fields form-group">
                    <label><?= __('choose_exchange') ?></label>
                    <select name="exchange_type" class="form-control" style="margin-bottom: 10px;">
                        <option value="النجم للصرافة">النجم للصرافة</option>
                        <option value="العامري للصرافة">العامري للصرافة</option>
                        <option value="الحزمي للصرافة">الحزمي للصرافة</option>
                    </select>
                    <label><?= __('transfer_code') ?></label>
                    <input type="text" name="exchange_transfer_number" class="form-control">
                </div>

                <!-- 4. تحويل بنكي -->
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="bank" onchange="togglePaymentFields()">
                    <span><i class="fas fa-university"></i> <?= __('bank') ?></span>
                </label>
                <div id="bank_field" class="extra-fields form-group">
                    <label><?= __('choose_bank') ?></label>
                    <select name="bank_type" class="form-control" style="margin-bottom: 10px;">
                        <option value="بنك الكريمي">بنك الكريمي</option>
                        <option value="بنك التضامن">بنك التضامن</option>
                    </select>
                    <label><?= __('transfer_number') ?></label>
                    <input type="text" name="bank_transfer_number" class="form-control">
                </div>
                
                <!-- 5. دفع دولية -->
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="paypal" onchange="togglePaymentFields()">
                    <span><i class="fab fa-paypal"></i> <?= __('paypal') ?></span>
                </label>
                <div id="paypal_field" class="extra-fields form-group">
                    <label><?= __('paypal_info') ?></label>
                    <input type="text" name="paypal_info" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn-submit"><?= __('confirm_purchase') ?> <i class="fas fa-check-circle"></i></button>
        </form>
    </div>
    
    <!-- Summary Section -->
    <div class="order-summary">
        <h2><?= __('order_summary') ?></h2>
        <?php foreach ($items as $item): ?>
            <div class="summary-item">
                <img src="/rawaq/assets/images/products/<?php echo htmlspecialchars($item['image']); ?>" alt="product">
                <div style="flex:1;">
                    <h4 style="margin:0; font-size:15px; color:#3d2b1f;"><?php echo htmlspecialchars($item['name']); ?></h4>
                    <span style="color:#888; font-size:13px;"><?= __('qty') ?> <?php echo $item['quantity']; ?></span>
                </div>
                <div style="font-weight:bold; color:#c5a059;">
                    <?php echo number_format($item['price'] * $item['quantity'], 2); ?>$
                </div>
            </div>
        <?php endforeach; ?>
        
        <div class="total-row" style="font-size: 16px; margin-top:10px; color:#555; border-top: 1px solid #eee; padding-top: 10px;">
            <span><?= __('total') ?></span>
            <span><?php echo number_format($total_amount, 2); ?>$</span>
        </div>
        
        <div class="total-row" style="font-size: 16px; margin-top:10px; color:#555;">
            <span><?= __('shipping_cost') ?></span>
            <span id="shippingCostDisplay">0.00$</span>
        </div>

        <div class="total-row">
            <span><?= __('final_total') ?></span>
            <span id="finalTotalDisplay"><?php echo number_format($total_amount, 2); ?>$</span>
        </div>
    </div>
</div>

<script>
const cartTotal = <?php echo $total_amount; ?>;

function updateShipping() {
    const citySelect = document.getElementById('citySelect');
    if (!citySelect.value) return;
    
    const selectedOption = citySelect.options[citySelect.selectedIndex];
    const shippingCost = parseFloat(selectedOption.getAttribute('data-cost'));
    
    document.getElementById('shippingCostDisplay').innerText = shippingCost.toFixed(2) + '$';
    document.getElementById('finalTotalDisplay').innerText = (cartTotal + shippingCost).toFixed(2) + '$';
}

function togglePaymentFields() {
    const method = document.querySelector('input[name="payment_method"]:checked').value;
    document.getElementById('wallet_field').style.display = (method === 'wallet') ? 'block' : 'none';
    document.getElementById('exchange_field').style.display = (method === 'exchange') ? 'block' : 'none';
    document.getElementById('bank_field').style.display = (method === 'bank') ? 'block' : 'none';
    document.getElementById('paypal_field').style.display = (method === 'paypal') ? 'block' : 'none';
}
</script>

<?php require_once $root . '/includes/footer.php'; ?>
