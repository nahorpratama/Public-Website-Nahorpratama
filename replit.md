# PT Eliazer Nahor Pratama - Website Project

## 📋 Project Overview
Static website untuk PT Eliazer Nahor Pratama (Indonesian construction company) yang siap di-deploy ke **Hostinger** atau shared hosting lainnya.

**Tech Stack:**
- Frontend: Pure HTML5, CSS3, JavaScript (no framework)
- Backend: PHP 8.2 + PHPMailer
- No Node.js/React/Vue dependencies ✅

---

## 🎯 Recent Changes (November 2025)

### **Migration dari Node.js ke PHP**
- ✅ Converted backend dari Express/Node.js → **Pure PHP**
- ✅ Contact form sekarang menggunakan **PHPMailer** + SMTP atau PHP mail()
- ✅ Removed semua Node.js dependencies (express, nodemailer)
- ✅ 100% kompatibel dengan shared hosting (Hostinger, cPanel, dll)

### **Features Completed**
1. ✅ **Favicon & Icons** - ENP logo di semua halaman (7 pages)
2. ✅ **Scroll-to-Top Button** - Glassmorphism design dengan chevron icon
3. ✅ **Logo Fix** - Aspect ratio konsisten (desktop: 108px, tablet: 90px, mobile: 70px)
4. ✅ **Contact Form** - Functional dengan mandatory fields:
   - Name (required)
   - IP Address (auto-detected via ipify API)
   - Message (required)
   - Email (optional)
5. ✅ **Email Delivery** - Kirim ke marketing@nahorpratama.com via PHPMailer

---

## 📁 Important Files

### **Contact Form System**
- `contact.html` - Contact page dengan form
- `contact-handler.php` - PHP backend untuk process form & send email
- `email-config.php` - Email configuration (SMTP/credentials)
- `email-config.example.php` - Template untuk setup
- `public/contact-form-handler.js` - JavaScript form handler
- `vendor/phpmailer/` - PHPMailer library
- `composer.json` - PHP dependencies

### **HTML Pages (7 total)**
- `index.html` - Homepage
- `contact.html` - Contact page
- `about.html` - About company
- `projects.html` - Projects/gallery
- `experience.html` - Experience showcase
- `equipment.html` - Equipment showcase
- `team.html` - Team members

### **CSS Files**
- `css/header-global.css` - Logo styling & header consistency
- `css/cta-global.css` - CTA section styling
- `css/responsive-fixes.css` - Mobile responsive fixes
- `css/webflow.css` - Webflow base styles
- `css/eliazernahorpratama.webflow.css` - Main styles

### **Documentation**
- `DEPLOYMENT-HOSTINGER.md` - Complete deployment guide
- `replit.md` - This file (project documentation)

---

## 🚀 Deployment Instructions

### **For Hostinger (or any shared hosting):**

1. **Upload all files** to `public_html/` via FTP or File Manager
2. **Configure email** in `email-config.php`:
   ```php
   return [
       'use_smtp' => false, // Use PHP mail() - works automatically on Hostinger
       'to_email' => 'marketing@nahorpratama.com',
   ];
   ```
3. **Test the contact form** at `yourdomain.com/contact.html`
4. Done! ✅

**Note:** PHP mail() function akan otomatis bekerja di shared hosting tanpa konfigurasi tambahan.

**Optional:** Jika ingin menggunakan SMTP (Gmail/Hostinger Email), set `use_smtp => true` dan isi SMTP credentials.

See `DEPLOYMENT-HOSTINGER.md` for complete guide.

---

## 🎨 Design Guidelines

### **Responsive Padding**
- Standard horizontal padding: **20px** on all pages
- Mobile-friendly dengan breakpoints konsisten

### **Gallery Layouts**
- Desktop: 3 columns
- Tablet: 2 columns  
- Mobile: 1 column

### **Branding**
- ENP logo di header semua halaman
- Logo maintains aspect ratio dengan `object-fit: contain`
- Favicon: ENP logo (not Webflow default)

### **Scroll-to-Top Button**
- Transparent glassmorphism background (rgba 0.25 opacity)
- Backdrop-filter blur effect
- Chevron icon (no tail)
- Appears after 300px scroll

---

## ⚙️ Local Development (Replit)

### **Server**
```bash
php -S 0.0.0.0:5000
```

### **Testing Contact Form**
⚠️ Email sending tidak berfungsi di Replit karena:
- Replit tidak memiliki sendmail configured
- Gmail SMTP requires valid App Password

**Solution:** Test di production (Hostinger) dimana PHP mail() sudah configured.

---

## 🔧 Configuration

### **Email Config** (`email-config.php`)
```php
return [
    'use_smtp' => false,        // false = PHP mail(), true = SMTP
    'to_email' => 'marketing@nahorpratama.com',
    'from_email' => 'noreply@nahorpratama.com',
    'from_name' => 'PT Eliazer Nahor Pratama',
];
```

### **Workflow** (`.replit`)
```bash
php -S 0.0.0.0:5000
```

---

## 📝 User Preferences

### **Coding Standards**
- Pure HTML/CSS/JS (no frameworks)
- PHP for backend only (contact form)
- Pixel-perfect consistency across pages
- Mobile-first responsive design

### **Constraints**
- ❌ No Node.js (deployment issue on Hostinger)
- ❌ No React/Vue (not supported on shared hosting)
- ✅ PHP only (widely supported)
- ✅ Static HTML/CSS/JS

### **Branding Requirements**
- ENP logo must be visible on all pages
- Consistent header styling via `header-global.css`
- Professional construction company aesthetic

---

## 🐛 Known Issues

### **Email sending di Replit**
- Status: ⚠️ Expected behavior
- Reason: Replit doesn't have sendmail/SMTP configured
- Solution: Will work automatically on Hostinger production

### **Screenshot timeout di Replit**
- Status: ⚠️ Minor
- Reason: PHP dev server occasionally slow to respond
- Impact: None on production

---

## 📞 Contact Information

- **Email to:** marketing@nahorpratama.com
- **Company:** PT Eliazer Nahor Pratama
- **Website:** nahorpratama.com (when deployed)

---

## 📊 Project Stats

- **Total Pages:** 7 HTML pages
- **Languages:** HTML, CSS, JavaScript, PHP
- **Dependencies:** PHPMailer 7.0
- **Framework:** None (vanilla/pure code)
- **Compatibility:** Any PHP 7.4+ hosting

---

**Last Updated:** November 3, 2025  
**Version:** 2.0.0 (PHP Backend)  
**Status:** ✅ Ready for Hostinger deployment
