# Deployment Guide - PT Eliazer Nahor Pratama Website

## 📋 Ringkasan
Website ini adalah **pure HTML/CSS/JavaScript + PHP** tanpa framework Node.js, React, atau Vue. 100% kompatibel dengan shared hosting seperti Hostinger.

---

## 🚀 Cara Deploy ke Hostinger

### 1. **Upload Files**
Upload semua file ke folder `public_html` di Hostinger File Manager atau via FTP:

```
public_html/
├── index.html
├── contact.html
├── about.html
├── projects.html
├── experience.html
├── equipment.html
├── team.html
├── contact-handler.php
├── email-config.php
├── vendor/ (folder PHPMailer)
├── composer.json
├── css/
├── js/
├── images/
└── public/
```

### 2. **Konfigurasi Email**

#### **Opsi A: Menggunakan PHP mail() Function (RECOMMENDED untuk Hostinger)**
1. Buka file `email-config.php`
2. Pastikan `'use_smtp' => false`
3. Email akan otomatis bekerja tanpa konfigurasi tambahan!

```php
return [
    'use_smtp' => false, // ✅ Gunakan ini di Hostinger
    ...
];
```

#### **Opsi B: Menggunakan SMTP (Optional)**
Jika Anda ingin menggunakan SMTP (Gmail, Hostinger Email, dll):

1. Buka file `email-config.php`
2. Set `'use_smtp' => true`
3. Isi SMTP credentials:

```php
return [
    'use_smtp' => true,
    'smtp_host' => 'smtp.hostinger.com', // Atau smtp.gmail.com
    'smtp_port' => 587,
    'smtp_secure' => 'tls',
    'smtp_username' => 'your-email@nahorpratama.com',
    'smtp_password' => 'your-password',
    ...
];
```

**Untuk Gmail SMTP:**
- Aktifkan 2-Step Verification
- Buat App Password di: https://myaccount.google.com/apppasswords
- Gunakan 16-digit App Password (bukan password biasa)

### 3. **Test Contact Form**
1. Buka `https://yourdomain.com/contact.html`
2. Isi form dan klik Submit
3. Email akan dikirim ke `marketing@nahorpratama.com`

---

## 📁 Struktur File Penting

### **Contact Form Files:**
- `contact.html` - Halaman contact dengan form
- `contact-handler.php` - Backend yang memproses form dan kirim email
- `email-config.php` - Konfigurasi email (credentials)
- `public/contact-form-handler.js` - JavaScript handler untuk form
- `vendor/` - PHPMailer library

### **Dependencies:**
- **PHP 7.4+** ✅ (sudah termasuk di Hostinger)
- **PHPMailer 7.0** ✅ (sudah terinstall via Composer)

---

## ⚙️ Fitur Contact Form

### **Mandatory Fields:**
1. ✅ **Name** - Nama pengunjung
2. ✅ **IP Address** - Terdeteksi otomatis via ipify API
3. ✅ **Message** - Pesan dari pengunjung
4. ⚪ **Email** - Optional (untuk reply)

### **Email Content:**
Email yang dikirim ke `marketing@nahorpratama.com` berisi:
- Name
- Email (jika diisi)
- IP Address
- Message
- Timestamp

---

## 🔧 Troubleshooting

### **Email tidak terkirim?**

1. **Cek file `email-config.php`:**
   - Pastikan `use_smtp` sesuai dengan setup Anda
   - Cek credentials jika menggunakan SMTP

2. **Cek PHP Error Log:**
   - Di Hostinger: Tools → Error Logs
   - Cari error terkait "mail" atau "SMTP"

3. **Test PHP mail() function:**
   ```php
   <?php
   $result = mail('marketing@nahorpratama.com', 'Test', 'Test message');
   echo $result ? 'Email sent!' : 'Email failed!';
   ?>
   ```

### **Form tidak submit?**

1. **Cek browser console** (F12 → Console)
2. **Pastikan file berada di root:**
   - `contact-handler.php` harus di root folder (sama level dengan contact.html)

---

## 🎨 Customisasi

### **Mengubah Email Tujuan:**
Edit `email-config.php`:
```php
'to_email' => 'newemail@nahorpratama.com',
```

### **Mengubah From Name:**
Edit `email-config.php`:
```php
'from_name' => 'Website ENP',
```

---

## 📝 Catatan Penting

1. ✅ **Website 100% Static** - Tidak perlu Node.js atau framework khusus
2. ✅ **PHP Native** - Kompatibel dengan semua shared hosting
3. ✅ **No Database Required** - Contact form langsung kirim email
4. ✅ **Responsive Design** - Mobile-friendly dengan padding 20px
5. ✅ **Logo ENP** - Sudah terintegrasi di semua halaman
6. ✅ **Scroll-to-Top Button** - Glassmorphism design di semua halaman

---

## 📞 Support

Jika ada kendala deployment, hubungi:
- Email: marketing@nahorpratama.com
- Website: nahorpratama.com

---

**Last Updated:** November 2025  
**Version:** 2.0 (PHP Backend)
