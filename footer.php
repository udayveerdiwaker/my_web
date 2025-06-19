<footer id="footer" class="footer">
  <style>
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
  <!-- Google Maps Section -->
  <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2777.800182148053!2d78.27636500244151!3d30.092406650524584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093f3354762571%3A0x529be26f1d6d1438!2sWebsite%20Banaye%20%26%20Computer%20Sikhe!5e1!3m2!1sen!2sin!4v1750317961268!5m2!1sen!2sin"
      frameborder="0"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <div class="map-overlay"></div>
  </div>

  <!-- Footer Content -->
  <div class="footer-content">
    <div class="container">
      <div class="row g-4">
        <!-- About Section -->
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <h3 class="footer-title">About Me</h3>
            <p class="footer-text">
              Hi, I'm Shiva Diwaker. I'm a passionate developer ready to bring your ideas to life.
              Let's connect and create something amazing together.
            </p>
            <a href="http://localhost/my_web/about.php?about=About" class="footer-link">Learn more
              <!-- <i class="bi bi-arrow-right"></i> -->
            </a>
          </div>
        </div>

        <!-- Navigation Links -->
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <h3 class="footer-title">Quick Links</h3>
            <ul class="footer-links">
              <?php foreach ($navigation as $links): ?>
                <li>
                  <a href="<?php echo $links['href'] ?>" class="footer-link">
                    <i class="bi bi-chevron-right"></i> <?php echo $links['navbar_links'] ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- Social Media -->
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <h3 class="footer-title">Let's Connect</h3>
            <div class="social-links">
              <a href="https://web.telegram.org/k/" class="social-icon telegram" target="_blank">
                <i class="bi bi-telegram"></i>
              </a>
              <a href="https://www.facebook.com/profile.php?id=100073101880912" class="social-icon facebook" target="_blank">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="https://www.instagram.com/shiva__diwaker/" class="social-icon instagram" target="_blank">
                <i class="bi bi-instagram"></i>
              </a>
              <a href="https://teams.live.com/v2" class="social-icon teams" target="_blank">
                <i class="bi bi-microsoft-teams"></i>
              </a>
              <a href="https://www.linkedin.com/in/udayveer-diwaker-b96892356/" class="social-icon linkedin" target="_blank">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="https://github.com/udayveerdiwaker" class="social-icon github" target="_blank">
                <i class="bi bi-github"></i>
              </a>
            </div>
            <div class="contact-info mt-3">
              <p class="footer-text mb-1">
                <i class="bi bi-envelope me-2"></i> <?php echo $settings['email'] ?>
              </p>
              <p class="footer-text">
                <i class="bi bi-phone me-2"></i> +91 <?php echo $settings['number'] ?>
              </p>
            </div>
          </div>
        </div>
        <?php
        // Newsletter subscription handling
        if (isset($_POST['newsletter_submit'])) {
          $email = $_POST['newsletter_email'];

          // Validate email
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // Escape email to avoid SQL injection
            $email = mysqli_real_escape_string($conn, $email);

            // Check if email already exists
            $check = "SELECT * FROM newsletter_subscribers WHERE email = '$email'";
            $result = mysqli_query($conn, $check);

            if (mysqli_num_rows($result) == 0) {
              // Insert new subscriber
              $insert = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";
              if (mysqli_query($conn, $insert)) {
                $_SESSION['newsletter_subscribed'] = true;
              } else {
                $_SESSION['newsletter_error'] = "Subscription failed. Please try again.";
              }
            } else {
              $_SESSION['newsletter_error'] = "This email is already subscribed.";
            }
          } else {
            $_SESSION['newsletter_error'] = "Please enter a valid email address.";
          }
        }
        ?>
        <!-- Newsletter -->
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <h3 class="footer-title">Newsletter</h3>
            <p class="footer-text">Subscribe to get updates on my latest projects and articles.</p>
            <form class="newsletter-form" method="post" action="">
              <div class="input-group">
                <input type="email" name="newsletter_email" class="form-control" placeholder="Your Email" required>
                <button class="btn-subscribe" type="submit" name="newsletter_submit">
                  <i class="bi bi-send"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Newsletter popup handling
    document.addEventListener('DOMContentLoaded', function() {
      <?php if (isset($_SESSION['newsletter_subscribed'])) { ?>
        const newsletterPopup = document.getElementById('newsletterPopup');
        newsletterPopup.style.display = 'flex';
        setTimeout(() => {
          newsletterPopup.classList.add('active');
        }, 100);

        // Remove session variable
        <?php unset($_SESSION['newsletter_subscribed']); ?>
      <?php } ?>

      <?php if (isset($_SESSION['newsletter_error'])) { ?>
        const errorPopup = document.getElementById('newsletterErrorPopup');
        const errorMessage = document.getElementById('errorMessage');
        errorMessage.textContent = '<?php echo $_SESSION["newsletter_error"]; ?>';
        errorPopup.style.display = 'flex';
        setTimeout(() => {
          errorPopup.classList.add('active');
        }, 100);

        // Remove session variable
        <?php unset($_SESSION['newsletter_error']); ?>
      <?php } ?>

      // Close buttons for both popups
      document.querySelectorAll('.popup-close-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const popup = this.closest('.popup-overlay');
          popup.classList.remove('active');
          setTimeout(() => {
            popup.style.display = 'none';
          }, 300);
        });
      });

      // Close when clicking outside content
      document.querySelectorAll('.popup-overlay').forEach(popup => {
        popup.addEventListener('click', function(e) {
          if (e.target === popup) {
            popup.classList.remove('active');
            setTimeout(() => {
              popup.style.display = 'none';
            }, 300);
          }
        });
      });
    });
  </script>
  <!-- Newsletter Thank You Popup -->
  <div id="newsletterPopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
      <div class="popup-icon">
        <i class="bi bi-envelope-check-fill"></i>
      </div>
      <h3>Thank You for Subscribing!</h3>
      <p>You've been successfully added to our newsletter list.</p>
      <button class="popup-close-btn">Close</button>
    </div>
  </div>

  <!-- Newsletter Error Popup -->
  <div id="newsletterErrorPopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
      <div class="popup-icon" style="color: #ff6b6b;">
        <i class="bi bi-exclamation-triangle-fill"></i>
      </div>
      <h3>Subscription Error</h3>
      <p id="errorMessage"></p>
      <button class="popup-close-btn">Close</button>
    </div>
  </div>
  <!-- Copyright -->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          &copy; <?php echo date('Y'); ?> <strong>Shiva Diwaker</strong>. All Rights Reserved
        </div>
        <div class="col-md-6 text-center text-md-end">
          Designed with <i class="bi bi-heart-fill text-danger"></i> by Shiva Diwaker
        </div>
      </div>
    </div>
  </div>


</footer>
</body>

</html>