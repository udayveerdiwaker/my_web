<?php
include 'header.php';
$about=strtolower($_GET['about'])
?>



  <section id="about" class="about section ">
    <div class="container section-title">
    <h2 class="abo"><?php echo $navigation[$about]['navbar_links'];?></h2>
    <p>My name is Shiva Diwaker, I am leaving from Rishikesh, and I am Learning Web development Course,
        My hobbies is play Cricket Football and Swimming, and I am enjoy doing in my free time songs and, and My short-term or long-term goals My working towards in Web development.</p>
    </div>
    <div><?php echo $navigation[$about]['body'];?>
  
  </div>
  </section>

    <!-- <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4"><a href="home.php">
      <img src="<?php echo 'image/' . $resultall['images'] ?>" class="img-fluid" width="100%">
      </a>
        </div>
        <div class="col-lg-8 content">
          <h2 class="Text"> 12 th pass out &amp; Web Developer Learning.</h2>
          <p class="fst-italic py-3">
            I am 12th pass Student and i learn web development.
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Name : </strong> <span> <?php echo  $resultall['first_name'] ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Birthday : </strong> <span> 8 jan 2005</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone : </strong> <span> +19 <?php echo  $resultall['number'] ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City : </strong> <span> Rishikesh Uttarakhand BHARAT</span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Age : </strong> <span> 18</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Study : </strong> <span> 12th Pass</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Email : </strong> <span><a href="" data-cfemail="640109050d0824011c05091408014a070b09"> <?php echo  $resultall['email'] ?></a></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div> 
    </div> -->
  <?php
include 'footer.php';

?>



