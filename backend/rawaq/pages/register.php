<?php
$root = dirname(__DIR__);
require_once $root . '/includes/db_connect.php';

// register.php - صفحة إنشاء حساب جديد
// بدء الجلسة لعرض الأخطاء المخزنة
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// إذا كان المستخدم مسجلاً دخوله بالفعل، نعيده إلى الصفحة الرئيسية
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

$page_title = 'إنشاء حساب | رِواق';
require_once $root . '/includes/header.php';
?>

<style>
:root {
            --primary-gold: #c5a059;
            --dark-brown: #3d2b1f;
            --soft-beige: #f9f6f2;
            --white: #ffffff;
            --error-red: #c62828;
            --error-bg: #fff1f1;
        }
        body {
            background-color: var(--soft-beige);
            
            margin: 0;
            padding: 0;
        }
        .register-card {
            max-width: 520px;
            margin: 80px auto 50px auto;
            background: var(--white);
            padding: 45px;
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            border-top: 8px solid var(--primary-gold);
            position: relative;
            overflow: hidden;
        }
        .register-card::before {
            content: "\f3a5";
            
            font-weight: 900;
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 100px;
            color: rgba(197, 160, 89, 0.05);
        }
        .register-card h2 {
            color: var(--dark-brown);
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .register-card p.subtitle {
            text-align: center;
            color: #888;
            margin-bottom: 35px;
            font-size: 15px;
        }
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--dark-brown);
            font-weight: 700;
            font-size: 14px;
        }
        .form-group i {
            position: absolute;
            right: 15px;
            top: 42px;
            color: var(--primary-gold);
            z-index: 5;
        }
        .form-control {
            width: 100%;
            padding: 14px 45px 14px 15px;
            border: 1.5px solid #eee;
            border-radius: 12px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            background: #fafafa;
            font-size: 15px;
        }
        .form-control:focus {
            border-color: var(--primary-gold);
            background: var(--white);
            box-shadow: 0 0 15px rgba(197, 160, 89, 0.1);
            outline: none;
        }
        .btn-register {
            width: 100%;
            padding: 16px;
            background: var(--dark-brown);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            margin-top: 10px;
        }
        .btn-register:hover {
            background: var(--primary-gold);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(197, 160, 89, 0.3);
        }
        .error-msg, .success-msg {
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 14px;
        }
        .error-msg {
            background: var(--error-bg);
            color: var(--error-red);
            border: 1px solid #ffcfcf;
        }
        .success-msg {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }
        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #777;
            font-size: 14px;
        }
        .login-link a {
            color: var(--primary-gold);
            text-decoration: none;
            font-weight: 700;
        }
        .password-hint {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
</style>

<div class="register-card">
    <h2>إنشاء حساب جديد</h2>
    <p class="subtitle">ابدأ رحلتك في عالم الأصالة والأحجار النادرة</p>

    <?php
    // عرض رسائل الخطأ من الجلسة (بعد التعديل في register_process.php)
    if (isset($_SESSION['register_error'])) {
        $error = $_SESSION['register_error'];
        $errorMsg = '';
        switch ($error) {
            case 'empty_fields': $errorMsg = 'يرجى إكمال كافة الخانات للمتابعة.'; break;
            case 'invalid_email': $errorMsg = 'البريد الإلكتروني غير صالح، يرجى إدخال بريد حقيقي.'; break;
            case 'username_length': $errorMsg = 'اسم المستخدم يجب أن يكون بين 3 و 50 حرفاً.'; break;
            case 'weak_password': $errorMsg = 'كلمة المرور يجب أن تحتوي على 6 أحرف على الأقل.'; break;
            case 'email_exists': $errorMsg = 'عذراً، هذا البريد مسجل مسبقاً لدينا.'; break;
            case 'db_error': $errorMsg = 'حدث خطأ تقني، يرجى المحاولة لاحقاً.'; break;
            default: $errorMsg = 'حدث خطأ غير متوقع.';
        }
        echo '<div class="error-msg"><i class="fas fa-exclamation-circle"></i> ' . htmlspecialchars($errorMsg) . '</div>';
        unset($_SESSION['register_error']); // مسح الخطأ بعد عرضه
    }

    // عرض رسالة النجاح إن وجدت (مثلاً بعد تسجيل الخروج)
    if (isset($_SESSION['success'])) {
        echo '<div class="success-msg"><i class="fas fa-check-circle"></i> تم التسجيل بنجاح! مرحباً بك في رِواق.</div>';
        unset($_SESSION['success']);
    }
    ?>

    <form action="../php/register_process.php" method="POST">
        <div class="form-group">
            <label>اسم المستخدم</label>
            <i class="fas fa-user-circle"></i>
            <input type="text" name="username" class="form-control" placeholder="اكتب اسمك الكامل" minlength="3" maxlength="50" required>
        </div>

        <div class="form-group">
            <label>البريد الإلكتروني</label>
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
        </div>

        <div class="form-group">
            <label>كلمة المرور</label>
            <i class="fas fa-key"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="********" minlength="6" required>
            <div class="password-hint">كلمة المرور يجب أن لا تقل عن 6 أحرف.</div>
        </div>

        <div class="form-group">
            <label>تأكيد كلمة المرور</label>
            <i class="fas fa-check-circle"></i>
            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="أعد كتابة كلمة المرور" required>
        </div>

        <button type="submit" class="btn-register">
            <i class="fas fa-user-plus"></i> انضمام الآن
        </button>

        <div class="login-link">
            لديك حساب مسبق في رِواق؟ <a href="login.php">تسجيل الدخول من هنا</a>
        </div>
    </form>
</div>

<script>
    // تحقق بسيط من تطابق كلمة المرور قبل الإرسال (من جانب العميل)
    document.querySelector('form').addEventListener('submit', function(e) {
        const pass = document.getElementById('password').value;
        const confirm = document.getElementById('password_confirm').value;
        if (pass !== confirm) {
            e.preventDefault();
            alert('كلمة المرور وتأكيدها غير متطابقتين. يرجى التحقق.');
        }
    });
</script>

<?php
require_once $root . '/includes/footer.php';
?>
