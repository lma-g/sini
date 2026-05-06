 <!-- footer.php -->
<footer class="footer" id="contact">
    <div class="footer-container">
        <div class="footer-col">
            <h4>رِواق</h4>
            <a href="/rawaq/pages/pages_footer/blog.php"><i class="fas fa-chevron-left"></i> المدونة</a>
            <a href="/rawaq/pages/pages_footer/addr.php"><i class="fas fa-chevron-left"></i> العناوين</a>
            <a href="/rawaq/pages/pages_footer/jobs.php"><i class="fas fa-chevron-left"></i> وظائف</a>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="/rawaq/admin/admin_dashboard.php"><i class="fas fa-lock"></i> لوحة الإدارة</a>
            <?php endif; ?>
        </div>
        <div class="footer-col">
            <h4>مساعدة</h4>
            <a href="/rawaq/pages/pages_footer/faq.php"><i class="fas fa-chevron-left"></i> الأسئلة الشائعة</a>
            <a href="/rawaq/pages/pages_footer/ship.php"><i class="fas fa-chevron-left"></i> الشحن والتوصيل</a>
            <a href="/rawaq/pages/pages_footer/returns.php"><i class="fas fa-chevron-left"></i> الإرجاع والاستبدال</a>
            <a href="/rawaq/pages/pages_footer/pay.php"><i class="fas fa-chevron-left"></i> طرق الدفع</a>
        </div>
        <div class="footer-col">
            <h4>سياسات</h4>
            <a href="/rawaq/pages/pages_footer/privacy.php"><i class="fas fa-chevron-left"></i> الخصوصية</a>
            <a href="/rawaq/pages/pages_footer/terms.php"><i class="fas fa-chevron-left"></i> شروط الاستخدام</a>
            <a href="/rawaq/pages/pages_footer/cookies.php"><i class="fas fa-chevron-left"></i> ملفات تعريف الارتباط</a>
        </div>
        <div class="footer-col">
            <h4>تابعنا</h4>
            <a href="https://www.instagram.com/mii7fi" target="_blank"><i class="fab fa-instagram"></i> إنستغرام</a>
            <a href="https://www.facebook.com/share/1AtRwuMcKK/" target="_blank"><i class="fab fa-facebook"></i> فيسبوك</a>
            <a href="https://wa.me/967772885397" target="_blank"><i class="fab fa-whatsapp"></i> واتساب</a>
            <a href="https://www.snapchat.com/add/lqdry23201" target="_blank"><i class="fab fa-snapchat"></i> سناب شات</a>
        </div>
    </div>
    <div class="copyright">
        <p>© 2026 رِواق للفضة والأحجار الكريمة. جميع الحقوق محفوظة.</p>
    </div>
</footer>

<script src="/rawaq/assets/js/script.js"></script>

<!-- إغلاق body و html -->
</body>
</html>