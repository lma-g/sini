<?php 
$root = __DIR__;
require_once $root . '/includes/db_connect.php';

// جلب آخر 6 منتجات مضافة من كافة الأصناف لعرضها كـ "منتجات حصرية"
try {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC LIMIT 6");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $products = []; 
}

$page_title = __('hero_title');
require_once $root . '/includes/header.php';
?>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-section" id="colle">
        <div class="hero-background">
            <img src="assets/ass/mf.jpeg" alt="<?= __('hero_title') ?>" class="hero-image">
        </div>
        <div class="hero-content">
            <h1><?= __('hero_title') ?></h1>
            <p><?= __('hero_desc') ?></p>
            <a href="#" class="btn-primary" id="openMenu"><?= __('browse_collection') ?></a>

            <!-- Category Modal -->
            <div class="modal" id="categoryModal">
                <div class="modal-content" style="max-width: 600px;">
                    <span class="close" id="closeModalMain">&times;</span>
                    <h2 style="color: #3d2b1f; margin-bottom: 20px;" id="modalTitleText"><?= __('choose_collection') ?></h2>

                    <!-- Step 1: Main Categories -->
                    <div id="step1Categories" style="display:flex; gap: 20px; justify-content: center; margin-top: 30px;">
                        <button onclick="showSubCategories('women')" class="cat-btn" style="flex:1; padding: 25px; font-size: 18px; cursor: pointer;"><?= __('womens_collection') ?></button>
                        <button onclick="showSubCategories('men')" class="cat-btn" style="flex:1; padding: 25px; font-size: 18px; cursor: pointer;"><?= __('mens_collection') ?></button>
                    </div>

                    <!-- Step 2: Women Sub Categories -->
                    <div id="step2Women" style="display:none;">
                        <div class="category-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-top: 20px;">
                            <a href="/rawaq/category/wo-rings" class="cat-btn"><?= __('cat_wo_rings') ?></a>
                            <a href="/rawaq/category/wo-necklaces" class="cat-btn"><?= __('cat_wo_necklaces') ?></a>
                            <a href="/rawaq/category/wo-bracelets" class="cat-btn"><?= __('cat_wo_bracelets') ?></a>
                            <a href="/rawaq/category/wo-earrings" class="cat-btn"><?= __('cat_wo_earrings') ?></a>
                            <a href="/rawaq/category/wo-sets" class="cat-btn"><?= __('cat_wo_sets') ?></a>
                            <a href="/rawaq/category/stones" class="cat-btn"><?= __('cat_stones') ?></a>
                        </div>
                        <button onclick="backToMain()" class="btn-primary" style="margin-top: 20px; width: 100%; border:none; padding:10px;"><?= __('back') ?></button>
                    </div>

                    <!-- Step 2: Men Sub Categories -->
                    <div id="step2Men" style="display:none;">
                        <div class="category-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-top: 20px;">
                            <a href="/rawaq/category/me-rings" class="cat-btn"><?= __('cat_me_rings') ?></a>
                            <a href="/rawaq/category/me-beads" class="cat-btn"><?= __('cat_me_beads') ?></a>
                            <a href="/rawaq/category/stones" class="cat-btn"><?= __('cat_stones') ?></a>
                        </div>
                        <button onclick="backToMain()" class="btn-primary" style="margin-top: 20px; width: 100%; border:none; padding:10px;"><?= __('back') ?></button>
                    </div>

                </div>
            </div>
            <script>
                function showSubCategories(type) {
                    document.getElementById('step1Categories').style.display = 'none';
                    if(type === 'women') {
                        document.getElementById('step2Women').style.display = 'block';
                        document.getElementById('modalTitleText').innerText = '<?= __('womens_collection') ?>';
                    } else {
                        document.getElementById('step2Men').style.display = 'block';
                        document.getElementById('modalTitleText').innerText = '<?= __('mens_collection') ?>';
                    }
                }
                function backToMain() {
                    document.getElementById('step2Women').style.display = 'none';
                    document.getElementById('step2Men').style.display = 'none';
                    document.getElementById('step1Categories').style.display = 'flex';
                    document.getElementById('modalTitleText').innerText = '<?= __('choose_collection') ?>';
                }
                
                // Add event listener to properly reset modal when closed
                document.getElementById('closeModalMain').addEventListener('click', function() {
                    setTimeout(backToMain, 300); // reset after animation
                });
            </script>
            <style>
                .cat-btn {
                    display: block;
                    padding: 15px;
                    background: #fdfbf9;
                    border: 2px solid #eedfcb;
                    color: #3d2b1f;
                    text-decoration: none;
                    border-radius: 10px;
                    font-weight: bold;
                    transition: 0.3s;
                    text-align: center;
                }
                .cat-btn:hover {
                    background: #c5a059;
                    color: #fff;
                    border-color: #c5a059;
                    transform: translateY(-2px);
                }
            </style>
        </div>
    </section>

    <!-- ==================== PRODUCTS SECTION ==================== -->
    <div class="additional-content">
        <div class="shop-header">
            <h1><?= __('exclusive_products') ?></h1>
            <p><?= __('exclusive_desc') ?></p>
        </div>

        <section class="exclusive-section container mt-5">
            <h2 class="text-center mb-4"><?= __('rawaq_collection') ?></h2>
            
            <div class="products-container" id="rings">
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product" 
                             data-id="<?php echo $product['id']; ?>"
                             data-name="<?php echo htmlspecialchars($product['name']); ?>" 
                             data-price="<?php echo $product['price']; ?>" 
                             data-desc="<?php echo htmlspecialchars($product['description']); ?>" 
                             data-img="assets/images/products/<?php echo $product['image']; ?>">
                             
                            <div class="product-img-wrapper">
                                <img src="assets/images/products/<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" loading="lazy">
                            </div>
                            
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            
                            <div class="price-info-row">
                                <span class="price"><?php echo $product['price']; ?>$</span>
                                <button class="info-btn" aria-label="معلومات المنتج">ⓘ</button>
                            </div>
                            
                            <div class="cart-action-group">
                                <div class="qty-control">
                                    <button class="qty-btn minus" type="button">-</button>
                                    <input type="number" class="qty-input" value="1" min="1" max="99" readonly>
                                    <button class="qty-btn plus" type="button">+</button>
                                </div>
                                <button class="add-cart" data-id="<?php echo $product['id']; ?>"><?= __('add_to_cart') ?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center"><?= __('no_products') ?></p>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <!-- ==================== MODALS ==================== -->
    <div id="infoModal" class="modal-overlay">
        <div class="modal-card">
            <img id="modalImg" class="modal-img" src="" alt="صورة المنتج">
            <div class="modal-content">
                <h3 id="modalTitle"></h3>
                <div id="modalDesc" class="modal-description"></div>
                <div id="modalPrice" class="modal-price"></div>
                <button class="close-modal-btn" id="closeModalBtn"><?= __('close') ?></button>
            </div>
        </div>
    </div>

    <!-- ==================== CART SIDEBAR ==================== -->
    <div class="cart-overlay" id="overlay"></div>
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h2><?= __('cart_title') ?></h2>
            <span id="closeCart">&times;</span>
        </div>
        <div class="cart-content">
            <p><?= __('empty_cart') ?></p>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const isLoggedIn = localStorage.getItem('isLoggedIn');
            if (isLoggedIn === 'true') {
                const userSpan = document.querySelector('.user span');
                if (userSpan) {
                    userSpan.textContent = 'مرحباً!';
                }
            }
        });
    </script>
<?php
require_once $root . '/includes/footer.php';
?>