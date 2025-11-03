const express = require('express');
const path = require('path');
const nodemailer = require('nodemailer');

const app = express();
const PORT = 5000;

// Parse JSON bodies
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Set proper MIME types for video files
app.use((req, res, next) => {
  if (req.url.endsWith('.mp4')) {
    res.setHeader('Content-Type', 'video/mp4');
    res.setHeader('Accept-Ranges', 'bytes');
  }
  res.setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
  res.setHeader('Pragma', 'no-cache');
  res.setHeader('Expires', '0');
  next();
});

// Serve static files from the root directory
app.use(express.static(path.join(__dirname), {
  setHeaders: (res, filePath) => {
    if (filePath.endsWith('.mp4')) {
      res.setHeader('Content-Type', 'video/mp4');
      res.setHeader('Accept-Ranges', 'bytes');
    }
  }
}));

// Serve index.html for root route
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

// Contact form API endpoint
app.post('/api/contact', async (req, res) => {
  try {
    const { name, email, message, ipAddress } = req.body;
    
    // Validate required fields
    if (!name || !message || !ipAddress) {
      return res.status(400).json({
        success: false,
        message: 'Name, Message, and IP Address are required fields'
      });
    }
    
    // Create email transporter
    const transporter = nodemailer.createTransport({
      host: 'smtp.gmail.com',
      port: 587,
      secure: false,
      auth: {
        user: process.env.EMAIL_USER || 'admin.nahorpratama@nahorpratama.com',
        pass: process.env.EMAIL_PASSWORD || ''
      }
    });
    
    // Email content
    const mailOptions = {
      from: process.env.EMAIL_USER || 'admin.nahorpratama@nahorpratama.com',
      to: 'marketing@nahorpratama.com',
      subject: `Contact Form Submission from ${name}`,
      html: `
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Email:</strong> ${email || 'Not provided'}</p>
        <p><strong>IP Address:</strong> ${ipAddress}</p>
        <p><strong>Message:</strong></p>
        <p>${message.replace(/\n/g, '<br>')}</p>
        <hr>
        <p><small>This email was sent from the contact form on PT Eliazer Nahor Pratama website.</small></p>
      `
    };
    
    // Send email
    await transporter.sendMail(mailOptions);
    
    res.json({
      success: true,
      message: 'Email sent successfully'
    });
    
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).json({
      success: false,
      message: 'Failed to send email. Please try again later.'
    });
  }
});

app.listen(PORT, '0.0.0.0', () => {
  console.log(`Server is running on http://0.0.0.0:${PORT}`);
});
