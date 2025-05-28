<?php include 'header.php'; 
$contact = $_GET['contact'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $insert = "INSERT INTO `contact_data` (`name`, `email`, `contact`, `subject`, `message`) VALUES ('$name','$email','$contact','$subject','$message')";
  mysqli_query($conn, $insert);
  header('location: http://localhost/my_web/contact.php');
}
?>
<style>
  /* Contact Section Styles */
.contact-section {
  padding: 100px 0;
  background-color: var(--background-color);
}


.section-subtitle {
  color: var(--color);
  font-size: 1.5rem;
  max-width: 1000px;
  margin: 15px auto 20px;
}

.contact-container {
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 30px;
  margin-bottom: 50px;
}

.contact-info-card {
  background: var(--surface-color);
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.09);
  height: 100%;
}

.contact-info-header {
  margin-bottom: 30px;
}

.contact-info-header h3 {
  font-size: 1.5rem;
  color: var(--heading-color);
  margin-bottom: 10px;
}

.contact-info-header p {
  color: var(--color);
}

.contact-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 25px;
}

.contact-icon {
  width: 50px;
  height: 50px;
  background: rgba(52, 191, 73, 0.1);
  color: var(--accent-color);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  margin-right: 15px;
  flex-shrink: 0;
  font-size: 1.2rem;
  transition: var(--transition);
}
.contact-icon:hover {
 background: var(--accent-color);
  color: white;
  transform: translateY(-3px);

}

.contact-details h4 {
  font-size: 1.1rem;
  color: var(--heading-color);
  margin-bottom: 5px;
}

.contact-details p {
  color: var(--default-color);
  margin: 0;
  line-height: 1.6;
}

.social-links {
  display: flex;
  gap: 15px;
  margin-top: 30px;
}

.social-link {
  width: 40px;
  height: 40px;
  background: rgba(52, 191, 73, 0.1);
  color: var(--accent-color);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  transition: var(--transition);
}

.social-link:hover {
  background: var(--accent-color);
  color: white;
  transform: translateY(-3px);
}

.contact-form-card {
  background: var(--surface-color);
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.09);
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-group {
  position: relative;
}

.form-group.full-width {
  grid-column: span 2;
}

.contact-form label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  color: var(--heading-color);
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 12px 0;
  border: none;
  background: transparent;
  border-bottom: 1px solid rgba(0, 0, 0, 0.6);
  color: var(--default-color);
  font-size: 1rem;
  transition: var(--transition);
}

.contact-form textarea {
  resize: vertical;
  min-height: 100px;
}

.underline {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--accent-color);
  transition: var(--transition);
}

.contact-form input:focus,
.contact-form textarea:focus {
  outline: none;
}

.contact-form input:focus ~ .underline,
.contact-form textarea:focus ~ .underline {
  width: 100%;
}

.submit-btn {
  background: var(--accent-color);
  color: white;
  border: none;
  padding: 15px 30px;
  border-radius: 30px;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  cursor: pointer;
  transition: var(--transition);
  margin-top: 10px;
  align-self: flex-end;
  position: relative;
}

.submit-btn:hover {
  background: var(--nav-hover-color);
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(52, 191, 73, 0.3);
}

.map-container {
  position: relative;
  height: 400px;
  border-radius: 15px;
  overflow: hidden;
  margin-top: 50px;
}

.map-container iframe {
  width: 100%;
  height: 100%;
  filter: grayscale(30%) contrast(90%);
}

.map-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(33, 37, 41, 0.2), rgba(33, 37, 41, 0.1));
  pointer-events: none;
}

/* Responsive Styles */
@media (max-width: 992px) {
  .contact-container {
    grid-template-columns: 1fr;
  }
  
  .map-container {
    height: 350px;
  }
}

@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .form-row {
    grid-template-columns: 1fr;
  }
  
  .form-group.full-width {
    grid-column: span 1;
  }
  
  .submit-btn {
    width: 100%;
  }
  
  .map-container {
    height: 300px;
    margin-top: 30px;
  }
}
</style>
<section id="contact" class="contact-section">
  <div class="container">
    <!-- Section Header -->
    <div class="section-header">
      <!-- <h2 class="section-title">Get In <span class="text-gradient">Touch</span></h2> -->
      <h2 class="section-title"><?php echo $page_name[$contact]['navbar_links'];?><span class="text-gradient"> Me</span></h2>

      <div class="section-divider"></div>
      <p class="section-subtitle">Have a project in mind or want to collaborate? Drop me a message!</p>
    </div>

    <div class="contact-container">
      <!-- Contact Info Card -->
      <div class="contact-info-card">
        <div class="contact-info-header">
          <h3>Contact Information</h3>
          <p>Feel free to reach out through any of these channels</p>
        </div>
        
        <div class="contact-info-items">
          <div class="contact-item">
            <div class="contact-icon">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div class="contact-details">
              <h4>Location</h4>
              <p>House no.507 Awas Vikas Colony<br>Rishikesh, Uttarakhand</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="bi bi-telephone-fill"></i>
            </div>
            <div class="contact-details">
              <h4>Phone</h4>
              <p>+19 <?php echo $settings['number'] ?></p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="contact-details">
              <h4>Email</h4>
              <p><?php echo $settings['email'] ?></p>
            </div>
          </div>
        </div>
        
        <div class="social-links">
          <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/shiva__diwaker" class="social-link"><i class="bi bi-instagram"></i></a>
          <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
          <a href="https://web.telegram.org/k/" class="social-link"><i class="bi bi-telegram"></i></a>
        </div>
      </div>
      
      <!-- Contact Form -->
      <div class="contact-form-card">
        <form action="contact.php" method="post" class="contact-form">
          <div class="form-row">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" required>
              <div class="underline"></div>
            </div>
            
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" id="email" name="email" required>
              <div class="underline"></div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="contact">Phone Number</label>
              <input type="tel" id="contact" name="contact" minlength="10" maxlength="10" required>
              <div class="underline"></div>
            </div>
            
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" required>
              <div class="underline"></div>
            </div>
          </div>
          
          <div class="form-group full-width">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <div class="underline"></div>
          </div>
          
          <button type="submit" name="submit" class="submit-btn">
            <span>Send Message</span>
            <i class="bi bi-send-fill"></i>
          </button>
        </form>
      </div>
    </div>
    
    <!-- Map Section -->
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.280109696426!2d78.28416936955642!3d30.090079658806705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093e06f6a6281d%3A0x76564b96e2aa96f1!2sAvas%20Vikas%20Colony%2C%20Rishikesh%2C%20Uttarakhand%20249201!5e1!3m2!1sen!2sin!4v1724390545146!5m2!1sen!2sin" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
      </iframe>
      <div class="map-overlay"></div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>