<footer id="footer" class="footer">
  <!-- Google Maps Section -->
  <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.280109696426!2d78.28416936955642!3d30.090079658806705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093e06f6a6281d%3A0x76564b96e2aa96f1!2sAvas%20Vikas%20Colony%2C%20Rishikesh%2C%20Uttarakhand%20249201!5e1!3m2!1sen!2sin!4v1724390545146!5m2!1sen!2sin" 
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
            <a href="#about" class="footer-link">Learn more
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
              <a href="#" class="social-icon facebook" target="_blank">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="https://www.instagram.com/shiva__diwaker" class="social-icon instagram" target="_blank">
                <i class="bi bi-instagram"></i>
              </a>
              <a href="https://web.skype.com/" class="social-icon skype" target="_blank">
                <i class="bi bi-skype"></i>
              </a>
              <a href="#" class="social-icon linkedin" target="_blank">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="#" class="social-icon github" target="_blank">
                <i class="bi bi-github"></i>
              </a>
            </div>
            <div class="contact-info mt-3">
              <p class="footer-text mb-1">
                <i class="bi bi-envelope me-2"></i> shivadiwaker@example.com
              </p>
              <p class="footer-text">
                <i class="bi bi-phone me-2"></i> +91 1234567890
              </p>
            </div>
          </div>
        </div>

        <!-- Newsletter -->
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <h3 class="footer-title">Newsletter</h3>
            <p class="footer-text">Subscribe to get updates on my latest projects and articles.</p>
            <form class="newsletter-form">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="Your Email" required>
                <button class="btn-subscribe" type="submit">
                  <i class="bi bi-send"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
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