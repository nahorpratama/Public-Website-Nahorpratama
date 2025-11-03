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
    // Set true untuk SMTP, false untuk PHP mail() function
    'use_smtp' => true,
    
    // SMTP Settings - Hostinger Email (RECOMMENDED)
    'smtp_host' => 'smtp.hostinger.com',
    'smtp_port' => 587,
    'smtp_secure' => 'tls',
    'smtp_username' => 'admin@nahorpratama.com', // Email Hostinger Anda
    'smtp_password' => 'your-hostinger-email-password', // Password email Hostinger
    
    // Email Settings
    'from_email' => 'admin@nahorpratama.com', // Harus sama dengan smtp_username
    'from_name' => 'PT Eliazer Nahor Pratama',
    'to_email' => 'marketing@nahorpratama.com',
    'reply_to_email' => 'marketing@nahorpratama.com'
];
?>
