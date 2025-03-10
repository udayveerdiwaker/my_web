
<footer id="footer" class="footer position-relative">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.280109696426!2d78.28416936955642!3d30.090079658806705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093e06f6a6281d%3A0x76564b96e2aa96f1!2sAvas%20Vikas%20Colony%2C%20Rishikesh%2C%20Uttarakhand%20249201!5e1!3m2!1sen!2sin!4v1724390545146!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 280px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
        <div class="widget">
          <h3 class="widget-heading">About Us</h3>
          <p class="mb-4">
            Hi how are you, my name is Shiva Diwaker contact me and I help you.
          </p>
          <p class="mb-0">
            <a href="#" class="btn-learn-more">Learn more</a>
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ps-lg-5 mb-3 mb-md-0">
        <div class="widget">
          <h3 class="widget-heading">Navigation</h3>


          <ul class="list-unstyled float-start me-5">

            <!-- <?php
                  foreach ($navigation as $links) { ?>
              <a id="link" class="nav active" href=" <?php echo $links['href'] ?>"> <?php echo $links['navbar_links'] ?></a>
              </li>
            <?php } ?> -->

            <?php foreach ($allPages as $page) { ?>
              <a id="link" class="nav active" href="<?php echo $page['href']; ?>"><?php echo $page['navbar_links']; ?></a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 pl-lg-5">

        <div class="widget">
          <h3 class="widget-heading">Connect</h3>
          <ul class="list-unstyled social-icons light mb-3">
            <li>
              <a href="https://web.telegram.org/k/"><span class="telegram active bi bi-telegram"></span></a>
            </li>
            <li>
              <a href="#"><span class="bi bi-facebook"></span></a>
            </li>
            <li>
              <a href="https://www.instagram.com/shiva__diwaker"><span class="instagram active bi bi-instagram"></span></a>
            </li>
            <li>
              <a href="https://web.skype.com/"><span class="google-plus active bi bi-skype"></span></a>
            </li>

          </ul>
        </div>
      </div>


      <div class="col-md-6 col-lg-3 ps-lg-5 mb-3 mb-md-0">
        <div class="widget">
          <h3 class="widget-heading">Subscribe</h3>
          <form action="home.php" method="post" class="php-email-form">
            <div class="mb-2">
              <input type="email" class="form-control" name="email" placeholder="Enter your email">
              <button type="submit" class="btn btn-link" name='subscribe'>
                <span class="bi bi-arrow-right"></span>
              </button>
            </div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">
              Your subscription request has been sent. Thank you!
            </div>
          </form>
        </div>
      </div>

    </div>
    <p>&copy; <?php echo date('Y'); ?> Gym Website. All rights reserved.</p>

  </div>
</footer>
</body>

</html>