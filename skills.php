<?php
include 'header.php';
$skills = $_GET['skills'];

// echo $skills;
?>
<section id="skills" class="skills section">

  <div class="container section-title aos-init aos-animate" data-aos="fade-up">
    <h2 class="abo"><?php echo $page_name[$skills]['navbar_links']; ?></h2>
    <p>My Skills is HTML, Css, Bootstrap, JavaScript, PHP, and Photoshop.</p>

    <div>
      <?php echo $page_name[$skills]['body']; ?>
    </div>
</section>
<!--




<div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
  <div class="row skills-content skills-animation">
    <div class="col-lg-6">
      <div class="progress">
        <span class="skill"><span>HTML</span> <i class="val">90%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
        </div>
      </div>
      <div class="progress">
        <span class="skill"><span>CSS</span> <i class="val">70%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
        </div>
      </div>
      <div class="progress">
        <span class="skill"><span>JavaScript</span> <i class="val">60%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="progress">
        <span class="skill"><span>PHP</span> <i class="val">55%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;"></div>
        </div>
      </div>
      <div class="progress">
        <span class="skill"><span>Photoshop</span> <i class="val">40%</i></span>
        <div class="progress-bar-wrap">
          <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
        </div>
      </div>
    </div>
  </div>
</div>-->

<?php
include 'footer.php';
?>