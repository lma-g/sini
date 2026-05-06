 <?php
// pages/products_view.php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

$category_slug = isset($_GET['category']) ? trim($_GET['category']) : '';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$min_price = isset($_GET['min_price']) && is_numeric($_GET['min_price']) ? floatval($_GET['min_price']) : null;
$max_price = isset($_GET['max_price']) && is_numeric($_GET['max_price']) ? floatval($_GET['max_price']) : null;
$min_rating = isset($_GET['min_rating']) && is_numeric($_GET['min_rating']) ? floatval($_GET['min_rating']) : null;

$titles = [
    'wo-rings' => __('cat_wo_rings'), 'wo-necklaces' => __('cat_wo_necklaces'),
    'wo-bracelets' => __('cat_wo_bracelets'), 'wo-earrings' => __('cat_wo_earrings'),
    'wo-sets' => __('cat_wo_sets'), 'me-rings' => __('cat_me_rings'),
    'me-beads' => __('cat_me_beads'), 'stones' => __('cat_stones')
];
$page_title = isset($titles[$category_slug]) ? $titles[$category_slug] : (!empty($search) ? __('search_results') . " $search" : __('hero_title'));

// جلب المنتجات
$products = [];
try {
    $query = "SELECT * FROM products WHERE 1=1";
    $params = [];

    if (!empty($search)) {
        $query .= " AND (name LIKE :search OR description LIKE :search)";
        $params['search'] = "%$search%";
    }
    if (!empty($category_slug)) {
        $query .= " AND category = :cat";
        $params['cat'] = $category_slug;
    }
    if ($min_price !== null && $min_price >= 0) {
        $query .= " AND price >= :min_price";
        $params['min_price'] = $min_price;
    }
    if ($max_price !== null && $max_price > 0) {
        $query .= " AND price <= :max_price";
        $params['max_price'] = $max_price;
    }
    if ($min_rating !== null && $min_rating > 0) {
        $query .= " AND rating >= :min_rating";
        $params['min_rating'] = $min_rating;
    }

    $query .= " ORDER BY id DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $products = $stmt->fetchAll();
} catch(PDOException $e) {
    error_log($e->getMessage());
}

include $root . '/includes/header.php';
?>

<main style="padding-top: 120px; background: #fdfbf9;">
    <div class="container" style="max-width:1280px; margin:auto;">
        <div class="category-header" style="text-align:center; margin-bottom:40px;">
            <h1><?php echo htmlspecialchars($page_title); ?></h1>
            <div class="gold-line" style="width:80px; height:3px; background:#c5a059; margin:10px auto;"></div>
        </div>

        <div class="shop-layout">
            <aside class="shop-sidebar">
                <form action="/rawaq/pages/products_view.php" method="GET" class="filter-form">
                    <?php if (!empty($category_slug)): ?>
                        <input type="hidden" name="category" value="<?php echo htmlspecialchars($category_slug); ?>">
                    <?php endif; ?>
                    
                    <h3><?= __('fast_search') ?></h3>
                    <div class="filter-group">
                        <input type="text" name="search" placeholder="<?= __('search_placeholder') ?>" value="<?php echo htmlspecialchars($search); ?>" class="form-control" style="width:100%;">
                    </div>

                    <h3><?= __('price_range') ?></h3>
                    <div class="filter-group price-filter">
                        <input type="number" name="min_price" placeholder="<?= __('from') ?>" value="<?php echo $min_price; ?>" class="form-control" style="width:100%;">
                        <span>-</span>
                        <input type="number" name="max_price" placeholder="<?= __('to') ?>" value="<?php echo $max_price; ?>" class="form-control" style="width:100%;">
                    </div>

                    <h3><?= __('rating') ?></h3>
                    <div class="filter-group">
                        <select name="min_rating" class="form-control" style="width:100%;">
                            <option value=""><?= __('all') ?></option>
                            <option value="4" <?php if($min_rating == 4) echo 'selected'; ?>><?= __('stars_4') ?></option>
                            <option value="3" <?php if($min_rating == 3) echo 'selected'; ?>><?= __('stars_3') ?></option>
                        </select>
                    </div>

                    <button type="submit" class="btn-filter"><?= __('apply_filter') ?> <i class="fas fa-filter"></i></button>
                    <?php if(!empty($search) || $min_price !== null || $max_price !== null || $min_rating !== null): ?>
                        <a href="/rawaq/category/<?php echo htmlspecialchars($category_slug); ?>" class="btn-clear"><?= __('clear_filter') ?></a>
                    <?php endif; ?>
                </form>
            </aside>

            <div class="products-main">
                <?php if (count($products) > 0): ?>
                    <div class="products-container" id="rings">
                <?php foreach ($products as $product): ?>
                    <div class="product" 
                         data-id="<?php echo $product['id']; ?>"
                         data-name="<?php echo htmlspecialchars($product['name']); ?>" 
                         data-price="<?php echo $product['price']; ?>" 
                         data-desc="<?php echo htmlspecialchars($product['description']); ?>" 
                         data-img="/rawaq/assets/images/products/<?php echo $product['image']; ?>">
                         
                        <div class="product-img-wrapper">
                            <img src="/rawaq/assets/images/products/<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" loading="lazy">
                        </div>
                        
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        
                        <div class="price-info-row">
                            <span class="price"><?php echo number_format($product['price'], 2); ?>$</span>
                            <span class="rating" style="color: #f39c12; font-size: 14px;">
                                <?php echo number_format($product['rating'], 1); ?> <i class="fas fa-star"></i>
                            </span>
                            <button class="info-btn" aria-label="معلومات المنتج">ⓘ</button>
                        </div>
                        
                        <div class="cart-action-group">
                            <div class="qty-control">
                                <button class="qty-btn minus" type="button">-</button>
                                <input type="number" class="qty-input" value="1" min="1" max="99" readonly>
                                <button class="qty-btn plus" type="button">+</button>
                            </div>
                            <button class="add-cart" data-id="<?php echo $product['id']; ?>">➕ السلة</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state" style="text-align:center; padding:80px;">
                <i class="fas fa-gem fa-3x" style="color:#ddd;"></i>
                <h3>لا توجد منتجات</h3>
                <p>سيتم إضافة قطع جديدة قريباً.</p>
            </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include $root . '/includes/footer.php'; ?>