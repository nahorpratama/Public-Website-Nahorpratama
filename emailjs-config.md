# EmailJS Configuration Guide

## Setup Instructions

### 1. Create EmailJS Account
1. Go to https://www.emailjs.com/
2. Sign up for a free account
3. Verify your email address

### 2. Create Email Service
1. Go to Email Services in your dashboard
2. Click "Add New Service"
3. Choose your email provider (Gmail, Outlook, etc.)
4. Follow the setup instructions
5. Copy the Service ID

### 3. Create Email Template
1. Go to Email Templates in your dashboard
2. Click "Create New Template"
3. Use this template:

**Subject:** New Contact Form Submission from {{from_name}}

**Content:**
```
Hello,

You have received a new contact form submission:

Name: {{from_name}}
Email: {{from_email}}
Message: {{message}}

Best regards,
Contact Form System
```

4. Save the template and copy the Template ID

### 4. Get Public Key
1. Go to Account settings
2. Copy your Public Key

### 5. Update contact.html
Replace these placeholders in contact.html:

- `YOUR_PUBLIC_KEY` → Your EmailJS Public Key
- `YOUR_SERVICE_ID` → Your Email Service ID  
- `YOUR_TEMPLATE_ID` → Your Email Template ID

### 6. Test the Form
1. Open contact.html in browser
2. Fill out the form
3. Submit and check if email is received

## Example Configuration
```javascript
// Initialize EmailJS
emailjs.init("user_abc123def456"); // Your Public Key

// Send email
emailjs.send("service_xyz789", "template_abc123", formData)
```

## Troubleshooting
- Make sure all IDs are correct
- Check browser console for errors
- Verify email service is properly configured
- Test with a simple email first