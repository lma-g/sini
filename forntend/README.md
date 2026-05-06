# رِواق - متجر الفضة والأحجار الكريمة
E-commerce website for jewelry and gemstones.

## 🚀 النشر على Netlify

### الطريقة الأولى: عبر واجهة الويب

1. اذهب إلى [netlify.com](https://www.netlify.com/) وسجل حساب جديد أو سجل الدخول
2. اضغط على "Add new site" ثم "Import an existing project"
3. قم بربط مستودع GitHub الخاص بالمشروع
4. في إعدادات البناء:
   - **Build command**: اتركه فارغاً
   - **Publish directory**: `forntend`
5. اضغط على "Deploy site"

### الطريقة الثانية: عبر Netlify CLI

1. قم بتثبيت Netlify CLI:
   ```bash
   npm install -g netlify-cli
   ```

2. سجل الدخول إلى Netlify:
   ```bash
   netlify login
   ```

3. من مجلد `forntend`، قم بتهيئة المشروع:
   ```bash
   cd forntend
   netlify init
   ```

4. اتبع التعليمات لربط المشروع بحساب Netlify الخاص بك

5. للنشر:
   ```bash
   netlify deploy --prod
   ```

## 📁 هيكل المشروع

```
forntend/
├── index.html          # الصفحة الرئيسية
├── css/                # ملفات التنسيق
├── js/                 # ملفات JavaScript
├── ass/                # الصور والأصول
├── pages/              # الصفحات الإضافية
├── pages_footer/       # صفحات التذييل
├── netlify.toml        # تكوين Netlify
├── vercel.json         # تكوين Vercel
└── .gitignore          # الملفات المستثناة من Git
```

## 🔒 إعدادات الأمان

تم تكوين رؤوس الأمان التالية في `netlify.toml` و `vercel.json`:
- X-Frame-Options: DENY
- X-XSS-Protection: 1; mode=block
- Content-Security-Policy: حماية محتوى شاملة

---

## 🚀 النشر على Vercel

### الطريقة الأولى: عبر واجهة الويب

1. اذهب إلى [vercel.com](https://vercel.com/) وسجل حساب جديد أو سجل الدخول
2. اضغط على "Add New" ثم "Project"
3. قم بربط مستودع GitHub الخاص بالمشروع
4. في إعدادات البناء:
   - **Framework Preset**: Other
   - **Root Directory**: `rawaq-stor-main` (أو اتركه فارغاً إذا كان المستودع يبدأ من هذا المجلد)
   - **Output Directory**: `forntend`
5. اضغط على "Deploy"

**ملاحظة مهمة**: إذا ظهر خطأ 404، تأكد من أن:
- Root Directory يشير إلى مجلد المشروع الرئيسي
- Output Directory مضبوط على `forntend`

### الطريقة الثانية: عبر Vercel CLI

1. قم بتثبيت Vercel CLI:
   ```bash
   npm install -g vercel
   ```

2. سجل الدخول إلى Vercel:
   ```bash
   vercel login
   ```

3. من مجلد `forntend`، قم بتهيئة المشروع:
   ```bash
   cd forntend
   vercel
   ```

4. اتبع التعليمات لربط المشروع بحساب Vercel الخاص بك

5. للنشر في بيئة الإنتاج:
   ```bash
   vercel --prod
   ```
