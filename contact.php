<?php
include 'header.php';
$contact = $_GET['contact'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $Contact = $_POST['contact'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $insert = "INSERT INTO `contact_data` (`name`, `email`, `contact`, `subject`, `message`) VALUES ('$name','$email','$Contact','$subject','$message')";
  mysqli_query($conn, $insert);

  // Instead of redirecting, we'll set a session variable
  $_SESSION['form_submitted'] = true;
  // In your form submission handler:
  header('location: http://localhost/my_web/contact.php?contact=Contact&submitted=true');
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

  /* .social-link:hover {
 background: linear-gradient(135deg, #2d2d2d, #000000);

  color: white;
  transform: translateY(-3px);
} */


  .social-icon:hover {
    transform: translateY(-3px);
  }

  .telegram:hover {
    /* background-color: var(--accent-color); */
    background-color: #0088cc;
    color: white;
  }

  .facebook:hover {
    background-color: #1877F2;
    color: white;
  }

  .instagram:hover {
    background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af, #515bd4);
    color: white;
  }

  .teams:hover {
    background: linear-gradient(135deg, #6b69d6, #464775);

    color: white;
  }

  .linkedin:hover {
    background: linear-gradient(135deg, #0A66C2, #004182);

    color: white;
  }

  .github:hover {
    background: linear-gradient(135deg, #2d2d2d, #000000);

    color: white;
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

  .contact-form input:focus~.underline,
  .contact-form textarea:focus~.underline {
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

  /* Popup Styles */
  .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
  }

  .popup-overlay.active {
    opacity: 1;
    visibility: visible;
  }

  .popup-content {
    background: var(--surface-color);
    padding: 40px;
    border-radius: 15px;
    text-align: center;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transform: translateY(20px);
    transition: all 0.3s ease;
  }

  .popup-overlay.active .popup-content {
    transform: translateY(0);
  }

  .popup-icon {
    font-size: 4rem;
    color: var(--accent-color);
    margin-bottom: 20px;
  }

  .popup-content h3 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: var(--heading-color);
  }

  .popup-content p {
    color: var(--default-color);
    margin-bottom: 25px;
    font-size: 1.1rem;
    line-height: 1.6;
  }

  .popup-close-btn {
    background: var(--accent-color);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
  }

  .popup-close-btn:hover {
    background: var(--nav-hover-color);
    transform: translateY(-3px);
  }
</style>
<section id="contact" class="contact-section">
  <div class="container">
    <!-- Section Header -->
    <div class="section-header">
      <!-- <h2 class="section-title">Get In <span class="text-gradient">Touch</span></h2> -->
      <h2 class="section-title"><?php echo $page_name[$contact]['navbar_links']; ?><span class="text-gradient"> Me</span></h2>

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
          <a href="https://web.telegram.org/k/" class="social-link telegram " target="_blank">
            <i class="bi bi-telegram"></i>
          </a>
          <a href="#" class="social-icon facebook" target="_blank">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="https://www.instagram.com/shiva__diwaker/" class="social-link instagram" target="_blank">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://teams.live.com/v2" class="social-link teams" target="_blank">
            <i class="bi bi-microsoft-teams"></i>
          </a>
          <a href="https://www.linkedin.com/in/udayveer-diwaker-b96892356/" class="social-icon linkedin" target="_blank">
            <i class="bi bi-linkedin"></i>
          </a>
          <a href="https://github.com/udayveerdiwaker" class="social-icon github" target="_blank">
            <i class="bi bi-github"></i>
          </a>

        </div>
      </div>

      <!-- Contact Form -->
      <div class="contact-form-card">
        <form action="" method="post" class="contact-form">
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
    <!-- Thank You Popup -->
    <div id="thankYouPopup" class="popup-overlay" style="display: none;">
      <div class="popup-content">
        <div class="popup-icon">
          <i class="bi bi-check-circle-fill"></i>
        </div>
        <h3>Thank You!</h3>
        <p>Your message has been sent successfully. I'll get back to you soon.</p>
        <button class="popup-close-btn">Close</button>
      </div>
    </div>

    <script>
      // Show popup if form was submitted
      <?php if (isset($_SESSION['form_submitted'])) { ?>
        document.addEventListener('DOMContentLoaded', function() {
          const popup = document.getElementById('thankYouPopup');
          popup.style.display = 'flex';
          setTimeout(() => {
            popup.classList.add('active');
          }, 100);

          // Remove the session variable
          <?php unset($_SESSION['form_submitted']); ?>
        });
      <?php } ?>

      // Close popup functionality
      document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('thankYouPopup');
        const closeBtn = document.querySelector('.popup-close-btn');

        if (closeBtn) {
          closeBtn.addEventListener('click', function() {
            popup.classList.remove('active');
            setTimeout(() => {
              popup.style.display = 'none';
            }, 300);
          });
        }

        // Close when clicking outside content
        popup.addEventListener('click', function(e) {
          if (e.target === popup) {
            popup.classList.remove('active');
            setTimeout(() => {
              popup.style.display = 'none';
            }, 300);
          }
        });
      });
      // Check for submitted parameter in URL
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('submitted')) {
        const popup = document.getElementById('thankYouPopup');
        popup.style.display = 'flex';
        setTimeout(() => {
          popup.classList.add('active');
        }, 100);

        // Remove the parameter from URL without reloading
        history.replaceState(null, null, window.location.pathname);
      }
    </script>
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