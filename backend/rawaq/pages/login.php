<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

// login.php
// صفحة تسجيل الدخول - محسنة مع رسائل خطأ من الجلسة ومسارات مطلقة
// تحديد الجذر المطلق للمشروع
$root = dirname(__DIR__); // الصعود من مجلد pages إلى مجلد rawaq
// تضمين ملف الاتصال بقاعدة البيانات (يبدأ الجلسة أيضاً)
// إذا كان المستخدم مسجلاً بالفعل، نوجهه إلى الصفحة المناسبة
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        header('Location: admin_products.php');
    } else {
        header('Location: ../index.php');
    }
    exit();
}
// تضمين الهيدر (اختياري، حسب هيكلة مشروعك)

$page_title = 'تسجيل الدخول | رِواق';
require_once $root . '/includes/header.php';
?>

<style>
/* تنسيقاتك الأصلية كما هي، مع إضافة تحسينات بسيطة */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background: linear-gradient(135deg, #faf3e8 0%, #f0e8df 100%);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      
    }
    .main-content { flex: 1; display: flex; align-items: center; justify-content: center; padding: 3rem 2rem; }
    .login-card { display: flex; flex-wrap: wrap; max-width: 1100px; width: 100%; background: #ffffff; border-radius: 2rem; box-shadow: 0 30px 60px rgba(98, 60, 30, 0.12); overflow: hidden; border: 1px solid rgba(180, 140, 100, 0.2); }
    .login-hero { flex: 1 1 45%; background: linear-gradient(145deg, #6b4f3a, #5e4430); padding: 3rem 2rem; display: flex; flex-direction: column; justify-content: space-between; color: #fef7e9; position: relative; }
    .login-hero::before { content: ''; position: absolute; inset: 0; background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.08"><path fill="white" d="M50,15 L65,35 L50,55 L35,35 L50,15 Z M50,45 L65,65 L50,85 L35,65 L50,45 Z"/></svg>'); background-size: 40px; pointer-events: none; }
    .brand-tag { display: flex; align-items: center; gap: 0.6rem; background: rgba(0,0,0,0.2); width: fit-content; padding: 0.5rem 1.2rem; border-radius: 40px; backdrop-filter: blur(4px); border: 1px solid rgba(200,170,120,0.5); }
    .login-hero-text h1 { font-size: 2.8rem; font-weight: 800; line-height: 1.2; }
    .login-hero-text h1 span { font-size: 1.9rem; font-weight: 400; color: #fbead2; }
    .gallery-mini { display: flex; gap: 0.8rem; flex-wrap: wrap; margin: 2rem 0 1rem; }
    .gem-item { background: rgba(250,240,225,0.12); border: 1px solid rgba(200,180,140,0.6); border-radius: 50px; padding: 0.4rem 1.2rem; font-size: 0.9rem; }
    .jewelry-quote { border-right: 3px solid #e4c9a7; padding-right: 1rem; font-style: italic; margin-top: 1.5rem; }
    .form-section { flex: 1 1 45%; background: #fffefb; padding: 3rem 2.8rem; }
    .form-section h2 { font-size: 2rem; font-weight: 700; color: #4d3a28; display: flex; gap: 0.6rem; }
    .welcome-back { color: #7d6650; margin-bottom: 2rem; border-right: 2px solid #e4d5c0; padding-right: 0.8rem; }
    .input-group { margin-bottom: 1.5rem; }
    .input-group label { display: block; font-weight: 600; color: #5d4a34; margin-bottom: 0.5rem; }
    .input-group input { width: 100%; padding: 0.9rem 1.2rem; background: #fefcf9; border: 1.5px solid #e8dfd3; border-radius: 50px;  transition: 0.2s; }
    .input-group input:focus { outline: none; border-color: #b48b5a; box-shadow: 0 0 0 3px rgba(180,140,90,0.1); }
    .error-msg { background: #fce4e4; color: #cc0000; padding: 0.8rem; border-radius: 10px; margin-bottom: 1rem; font-size: 0.9rem; text-align: center; border: 1px solid #f5c2c2; }
    .login-btn { background: linear-gradient(135deg, #7a5d42, #5e4430); border: none; padding: 1rem; width: 100%; border-radius: 60px; font-weight: 700; color: #fef2e0; display: flex; align-items: center; justify-content: center; gap: 0.6rem; cursor: pointer;  transition: 0.2s; }
    .login-btn:hover { transform: translateY(-2px); background: linear-gradient(135deg, #8f6f4e, #6f4f38); }
    .extra-options { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; font-size: 0.9rem; }
    .forgot-link { color: #7a5d42; text-decoration: none; }
    .separator { display: flex; align-items: center; gap: 1rem; margin: 1.8rem 0 1.2rem; }
    .separator-line { height: 1px; background: #e2d5c4; flex: 1; }
    .guest-link a { display: inline-flex; align-items: center; gap: 0.6rem; border: 1px solid #e2d5c8; padding: 0.6rem 1.8rem; border-radius: 40px; text-decoration: none; color: #856f55; width: 100%; justify-content: center; }
    .register-prompt { text-align: center; margin-top: 2rem; }
    .register-prompt a { color: #7a5d42; font-weight: 700; text-decoration: none; margin-right: 0.4rem; }
    @media (max-width: 768px) { .form-section { padding: 2rem 1.5rem; } .login-hero-text h1 { font-size: 2rem; } .login-hero { display: none; } }
</style>

<div class="main-content">
  <div class="login-card">
    <div class="login-hero">
      <div class="brand-tag"><i class="fas fa-crown"></i><span>منذ 1998</span></div>
      <div class="login-hero-text"><h1>فضة نقية<br /><span>أحجار كريمة فاخرة</span></h1></div>
      <div class="gallery-mini">
        <span class="gem-item"><i class="fas fa-star-of-life"></i> زمرد كولومبي</span>
        <span class="gem-item"><i class="fas fa-moon"></i> فيروزة نيسابور</span>
        <span class="gem-item"><i class="fas fa-gem"></i> ياقوت بورمي</span>
      </div>
      <div class="jewelry-quote"><i class="fas fa-quote-right"></i> مجوهرات تحمل أسرار الأرض ولمسة الأناقة الخالدة</div>
    </div>
    <div class="form-section">
      <h2><i class="fas fa-key"></i> تسجيل الدخول</h2>
      <p class="welcome-back"><i class="fas fa-feather-alt"></i> أهلاً بكَ في عالم الأناقة الفضي</p>
      
      <?php
      // عرض رسائل الخطأ المخزنة في الجلسة (من login_process.php)
      if (isset($_SESSION['login_error'])) {
          $error_code = $_SESSION['login_error'];
          $error_msg = '';
          switch ($error_code) {
              case 'empty_fields':   $error_msg = 'يرجى إدخال البريد الإلكتروني وكلمة المرور.'; break;
              case 'invalid_email':  $error_msg = 'صيغة البريد الإلكتروني غير صحيحة.'; break;
              case 'wrong_credentials': $error_msg = 'البريد الإلكتروني أو كلمة المرور غير صحيحة.'; break;
              case 'db_error':       $error_msg = 'حدث خطأ تقني، يرجى المحاولة لاحقاً.'; break;
              default:               $error_msg = 'حدث خطأ غير متوقع.';
          }
          echo '<div class="error-msg"><i class="fas fa-exclamation-triangle"></i> ' . htmlspecialchars($error_msg) . '</div>';
          unset($_SESSION['login_error']); // مسح الخطأ بعد عرضه
      }
      ?>

      <form action="../php/login_process.php" method="POST">
        <div class="input-group">
          <label><i class="far fa-envelope"></i> البريد الإلكتروني</label>
          <input type="email" name="email" placeholder="example@riwaq.com" required>
        </div>
        <div class="input-group">
          <label><i class="fas fa-lock"></i> كلمة المرور</label>
          <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <div class="extra-options">
          <label class="remember-me"><input type="checkbox" name="remember"> تذكرني</label>
          <a href="#" class="forgot-link">نسيت كلمة المرور؟</a>
        </div>
        <button type="submit" class="login-btn">دخول إلى المتجر <i class="fas fa-gem"></i></button>
      </form>
      
      <div class="separator"><span class="separator-line"></span><span>أو تابع كزائر</span><span class="separator-line"></span></div>
      <div class="guest-link"><a href="../index.php"><i class="fas fa-eye"></i> تصفح المتجر بدون تسجيل</a></div>
      <p class="register-prompt"><i class="far fa-user-circle"></i> ليس لديك حساب؟ <a href="register.php">انضم إلى نخبة العملاء <i class="fas fa-arrow-left"></i></a></p>
    </div>
  </div>
</div>

<?php
// تضمين الفوتر
include $root . '/includes/footer.php';
?>
