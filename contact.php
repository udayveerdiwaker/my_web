<?php
include 'header.php';
$contact = strtolower($_GET['contact']);

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $_POST['subject'];
  $message = $_POST['message'];
  $insert = "INSERT INTO `contact_data` (`name`, `email`, `contact`, `subject`, `message`) VALUES ('$name','$email','$contact','$subject','$message')";
  mysqli_query($conn, $insert);
  header('location: http://localhost/my_web/contact.php');
}

?>

<body>


  <section id="contact" class="contact section ">
    <div class="container section-title" data-aos="fade-up">
      <h2 class="abo"><?php echo $navigation[$contact]['navbar_links']; ?></h2>

      <p>Contact me and I help you.</p>
    </div>

    <div><?php echo $navigation[$contact]['body']; ?>

    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-5">

          <div class="info-wrap">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>House no.507 Awas Vikas Colony rishikesh Dehradun Uttarakhand </p>
              </div>
            </div>

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+19 <?php echo  $settings['number'] ?></p>
              </div>
            </div>

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p><a href="#"><?php echo  $settings['email'] ?></a></p>
              </div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.280109696426!2d78.28416936955642!3d30.090079658806705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093e06f6a6281d%3A0x76564b96e2aa96f1!2sAvas%20Vikas%20Colony%2C%20Rishikesh%2C%20Uttarakhand%20249201!5e1!3m2!1sen!2sin!4v1724390545146!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 280px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>


        <div class="col-lg-7">
          <form action="contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-6">
                <label for="name-field" class="pb-2">Your Name</label>
                <input type="text" name="name" id="name-field" class="form-control" required="">
              </div>

              <div class="col-md-6">
                <label for="email-field" class="pb-2">Your Email</label>
                <input type="email" class="form-control" name="email" id="email-field" required="">
              </div>

              <div class="col-md-12">
                <label for="number-field" class="pb-2">Contact</label>
                <input type="text" minlength="0" maxlength="10" class="form-control" name="contact" id="number-field" required="">
              </div>

              <div class="col-md-12">
                <label for="subject-field" class="pb-2">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject-field" required="">
              </div>

              <div class="col-md-12">
                <label for="message-field" class="pb-2">Message</label>
                <textarea class="form-control" name="message" rows="9" id="message-field" required=""></textarea>
              </div>

              <div class="col-md-12 text-center">

                <button type="submit" class="btn " name="submit">Send message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> 

  </section>

  <?php
  include 'footer.php';

  ?>
</body>
