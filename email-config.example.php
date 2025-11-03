<?php
/**
 * Email Configuration Template
 * 
 * CARA SETUP:
 * 1. Copy file ini menjadi `email-config.php`
 * 2. Ganti credential sesuai kebutuhan Anda
 * 
 * UNTUK HOSTINGER (Shared Hosting):
 * - Set 'use_smtp' => false, dan PHP mail() akan otomatis bekerja
 * - ATAU gunakan SMTP credentials dari Hostinger Email
 * 
 * UNTUK GMAIL SMTP:
 * - Aktifkan 2-Step Verification di Google Account
 * - Buat App Password di: https://myaccount.google.com/apppasswords
 * - Gunakan 16-digit App Password (bukan password biasa)
 */

return [
    // Set true untuk SMTP, false untuk PHP mail() function (recommended di shared hosting)
    'use_smtp' => false,
    
    // SMTP Settings (hanya jika use_smtp = true)
    'smtp_host' => 'smtp.gmail.com', // Atau smtp.hostinger.com jika pakai Hostinger Email
    'smtp_port' => 587, // 587 untuk TLS, 465 untuk SSL
    'smtp_secure' => 'tls', // 'tls' atau 'ssl'
    'smtp_username' => 'your-email@gmail.com', // Email Anda
    'smtp_password' => 'your-app-password-here', // Gmail App Password atau SMTP password
    
    // Email Settings
    'from_email' => 'noreply@nahorpratama.com',
    'from_name' => 'PT Eliazer Nahor Pratama',
    'to_email' => 'marketing@nahorpratama.com',
    'reply_to_email' => 'marketing@nahorpratama.com'
];
?>
