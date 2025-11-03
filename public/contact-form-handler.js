// Contact Form Handler
(function() {
  const form = document.getElementById('email-form');
  const successMessage = document.querySelector('.cc-success-message');
  const errorMessage = document.querySelector('.cc-error-message');
  const ipAddressInput = document.getElementById('ipAddress');
  
  // Fetch user's IP address
  async function fetchIPAddress() {
    try {
      const response = await fetch('https://api.ipify.org?format=json');
      const data = await response.json();
      ipAddressInput.value = data.ip;
    } catch (error) {
      console.error('Error fetching IP:', error);
      ipAddressInput.value = 'N/A';
    }
  }
  
  // Initialize: fetch IP address when page loads
  if (ipAddressInput) {
    fetchIPAddress();
  }
  
  // Handle form submission
  if (form) {
    form.addEventListener('submit', async function(e) {
      e.preventDefault();
      
      // Get form data
      const formData = {
        name: document.getElementById('Name').value.trim(),
        email: document.getElementById('Email').value.trim(),
        message: document.getElementById('Message').value.trim(),
        ipAddress: ipAddressInput.value
      };
      
      // Validate required fields
      if (!formData.name || !formData.message) {
        errorMessage.textContent = 'Please fill in all required fields (Name and Message).';
        errorMessage.style.display = 'block';
        successMessage.style.display = 'none';
        return;
      }
      
      // Disable submit button
      const submitBtn = form.querySelector('input[type="submit"]');
      submitBtn.disabled = true;
      submitBtn.value = 'Sending...';
      
      try {
        // Send to backend
        const response = await fetch('/api/contact', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(formData)
        });
        
        const result = await response.json();
        
        if (response.ok && result.success) {
          // Show success message
          successMessage.textContent = 'Thank you! Your message has been sent successfully!';
          successMessage.style.display = 'block';
          errorMessage.style.display = 'none';
          
          // Reset form
          form.reset();
          
          // Refresh IP address
          fetchIPAddress();
        } else {
          throw new Error(result.message || 'Failed to send message');
        }
      } catch (error) {
        console.error('Error sending message:', error);
        errorMessage.textContent = 'Oops! Something went wrong. Please try again or email us directly at marketing@nahorpratama.com';
        errorMessage.style.display = 'block';
        successMessage.style.display = 'none';
      } finally {
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.value = 'Submit';
      }
    });
  }
})();
