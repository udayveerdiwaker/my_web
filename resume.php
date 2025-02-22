<?php
include 'header.php';
$resume = strtolower($_GET['resume']);
?>
  <section id="resume" class="resume section ">
    <div class="container section-title">
      <h2 class="abo"><?php echo $page_name[$resume]['navbar_links'];?></h2>
      <h3>Introduction</h3>
      <p>My name is Shiva Diwaker and I am Leaving from Rishikesh Uttarakhand and My birth is uttar pardesh 38 the district is shambhal My village is Raja ka majhola and My Education is 1 to 5 class primary school hindi medium and 6 to 8 class junior school hindi medium and 10th and 12th school punjab shing kshetra inter college rishikesh Dehradun and my school srtudy is complete in 2024-2025 and I am preparastion for BCA.</p>
      <div><?php echo $page_name[$resume]['body'];?>
  
  </div>
    
    </div>
    </section>
    <!-- <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="resume-item pb-0">
            <h4><b>Shiva Diwaker</b></h4>
            <ul>
              <li><b>Email id: </b><a href=""><?php echo $settings['email']?></a></li>
              <li><b>Mobile no. :</b>+19 <?php echo $settings['number']?></li>
              <li><b>Address: </b>House No. 507 Awas Vikas Colony Rishikesh (Dehradun) Uttarakhand</li>
            </ul>
          </div>
          <div class="resume-item">
            <h4><b>Acedemic Qualification</b></h4>
            <h5>2021 - 2022</h5>
            <p>10th from Morden school Rishikesh Dehradun.</p>
            <h5>2024 - 2025</h5>
            <p>12th from Punjab shing kshetra inter college Rishikesh Dehradun.</p>
          </div>
          <div class="resume-item">
            <h4><b>My Skills</b></h4>
            <ul>
              <li>Basic knowledge of computer.</li>
              <li>Advance computer.</li>
              <li>Web Development in HTML, CSS, Bootstrap, Javascript, PHP.</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="resume item">
            <h4><b>Work Exprience</b></h4>
            <ul>
              <li>Data Entry</li>
              <li>Windows and Softwares install</li>
            </ul>
          </div>
          <div class="resume item">
            <h4><b>Personal Details</b></h4>
            <ul>
              <li><b>Father name: </b>Mr. Omveer</li>
              <li><b>Mother name: </b>Mrs. Rani</li>
              <li><b>Date of birth: </b>08-01-2005</li>
              <li><b>Gender: </b>Male</li>
              <li><b>Nationality: </b>Bhartiye</li>
              <li><b>Marital Status: </b>Unnarried</li>
              <li><b>Languages knowledge : </b>Hindi</li>
              <li><b>Hobbies : </b>Playing Cricket Football and Swimming</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  -->

  <?php
include 'footer.php';

?>