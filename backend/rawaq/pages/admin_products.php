<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

// 1. استدعاء ملف الاتصال (الذي يبدأ الجلسة ويحتوي على $pdo)
// 2. حماية الصفحة: التأكد من تسجيل دخول المدير
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
// 3. جلب جميع المنتجات باستخدام المتغير المصحح $pdo
try {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("خطأ في جلب المنتجات: " . $e->getMessage());
}
// 4. استدعاء الهيدر

$page_title = 'لوحة التحكم - المنتجات | رِواق';
require_once $root . '/includes/header.php';
?>

<style>
:root {
            --primary-gold: #c5a059;
            --dark-brown: #3d2b1f;
            --bg-body: #f8f6f2;
            --white: #ffffff;
            --tag-bg: #f4f1ee;
        }

        body { 
            background: var(--bg-body); 
             
            padding: 40px 20px;
            margin: 0;
        }

        .admin-container { 
            max-width: 1200px; 
            margin: auto; 
            background: var(--white); 
            padding: 30px; 
            border-radius: 20px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.05); 
        }

        .header-flex { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 30px; 
            border-bottom: 2px solid #f4f1ee; 
            padding-bottom: 20px; 
        }

        h1 { 
            font-size: 24px; 
            color: var(--dark-brown); 
            margin: 0;
        }

        .btn-add { 
            background: var(--primary-gold); 
            color: white; 
            padding: 12px 28px; 
            border-radius: 50px; 
            text-decoration: none; 
            font-weight: bold; 
            display: flex; 
            align-items: center; 
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(197, 160, 89, 0.3);
        }

        .btn-add:hover { 
            background: var(--dark-brown); 
            transform: translateY(-3px); 
        }

        table { 
            width: 100%; 
            border-collapse: separate; 
            border-spacing: 0 10px; 
        }

        th { 
            color: #888; 
            padding: 15px; 
            text-align: right; 
            font-size: 14px;
        }

        tr.product-row {
            background: #fff;
            transition: 0.3s;
        }

        td { 
            padding: 15px; 
            border-top: 1px solid #f9f9f9;
            border-bottom: 1px solid #f9f9f9;
            vertical-align: middle; 
        }

        .img-thumb { 
            width: 60px; 
            height: 60px; 
            border-radius: 12px; 
            object-fit: cover; 
            border: 2px solid #f4f1ee;
        }

        .product-name {
            color: var(--dark-brown);
            font-weight: 700;
        }

        .category-badge {
            background: var(--tag-bg);
            color: var(--dark-brown);
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
            border: 1px solid #e0dcd8;
        }

        .price-tag {
            color: var(--primary-gold);
            font-weight: 800;
            font-size: 16px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .actions a { 
            padding: 8px 14px; 
            border-radius: 8px; 
            text-decoration: none; 
            font-size: 12px; 
            font-weight: 600;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .edit { background: #f0f7f0; color: #2e7d32; }
        .edit:hover { background: #2e7d32; color: white; }

        .delete { background: #fff1f1; color: #c62828; }
        .delete:hover { background: #c62828; color: white; }
</style>

<div class="admin-container">
        <div class="header-flex">
            <h1>لوحة إدارة المقتنيات <span style="color:var(--primary-gold)">| رِواق</span></h1>
            <a href="add_product.php" class="btn-add">
                <i class="fas fa-plus"></i> إضافة قطعة جديدة
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">الصورة</th>
                    <th>اسم المنتج</th>
                    <th style="width: 150px;">التصنيف</th>
                    <th style="width: 120px;">السعر</th>
                    <th style="width: 200px;">التحكم</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)): foreach ($products as $p): ?>
                <tr class="product-row">
                    <td>
                        <img src="../assets/images/products/<?php echo htmlspecialchars($p['image']); ?>" class="img-thumb">
                    </td>
                    <td>
                        <span class="product-name"><?php echo htmlspecialchars($p['name']); ?></span>
                    </td>
                    <td>
                        <span class="category-badge">
                            <i class="fas fa-tag" style="font-size: 10px; margin-left: 5px;"></i>
                            <?php echo htmlspecialchars($p['category']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="price-tag"><?php echo number_format($p['price'], 2); ?> $</span>
                    </td>
                    <td class="actions">
                        <a href="edit_product.php?id=<?php echo $p['id']; ?>" class="edit">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        <a href="delete_product.php?id=<?php echo $p['id']; ?>" class="delete" onclick="return confirm('هل أنت متأكد من حذف هذه القطعة من مجموعة رِواق؟')">
                            <i class="fas fa-trash-alt"></i> حذف
                        </a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: #aaa; padding: 40px;">لا توجد منتجات معروضة حالياً.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<?php
require_once $root . '/includes/footer.php';
?>