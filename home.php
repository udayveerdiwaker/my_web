<?php include 'header.php';
$result = $conn->query("SELECT * FROM categories ORDER BY id DESC");

?>

<section id="home" class="home-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-1 order-2">
        <div class="hero-content">
          <span class="welcome-text">Hi there, I'm</span>
          <h1 class="hero-title">
            <span class="text-gradient"><?php echo $settings['first_name'] ?></span>
            <span class="animated-cursor">|</span>
          </h1>

          <!-- <div class="profession-container">
            <span class="static-text">I'm a</span>
            <div class="dynamic-text">
              <?php while ($category = mysqli_fetch_assoc($categories)) { ?>
                <span class="profession-item"><?php echo $category['profession'] ?></span>
              <?php } ?> 

              <?php while ($row = $result->fetch_assoc()) { ?>
                <span class="profession-item"><?php echo $row['name'] ?></span>
              <?php }
              ?>
            </div>
          </div> -->

          <div class="profession-container">
            <span class="static-text">I'm a</span>
            <div class="dynamic-text">
              <div class="profession-list">

                <?php

                // $categories = [
                //   ['profession' => 'Web Developer'],
                //   ['profession' => 'UI/UX Designer'],
                //   ['profession' => 'Mobile Programmer'],
                //   ['profession' => 'Freelancer']
                // ];
                foreach ($result as $category) {
                ?>
                  <span class="profession-item"><?php echo $category['name'] ?></span>
                <?php
                }
                ?>
              </div>
            </div>
          </div>

          <div class="hero-buttons">
            <a href="http://localhost/my_web/contact.php?contact=Contact" class="btn btn-primary">Hire Me</a>
            <a href="http://localhost/my_web/resume.php?resume=Resume" class="btn btn-outline">View Work</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6 order-lg-2 order-1">
        <div class="hero-image">
          <img src="<?php echo 'image/' . $settings['images'] ?>" alt="<?php echo $settings['first_name'] ?>" class="img-fluid profile-image">
          <!-- <img src="demo.jpg" alt="udayveer" class="img-fluid profile-image"> -->
          <div class="shape shape-1"></div>
          <div class="shape shape-2"></div>
        </div>
      </div>
    </div>
  </div>



</section>

<?php include 'footer.php'; ?>