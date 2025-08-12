<?php
include 'connection.php';
// $navigation = getall('navigationbar');
$navigation = getall('navigationbar');
// print_r($navigation);

$page_name = array();

foreach ($navigation as $nav) {
  $page_name[$nav['navbar_links']] = $nav;


  //   print_r($page_name);
}
$settings = getall1('basic_setting');

// exit;
// echo $navigation['navbar_links'];
// $categories = getall('profession_categories');

// $setting = getall('basic_setting');
// print_r($navigation);
// echo $navigation['navbar_links'];
// print_r($settings['first_name']);
// // echo $navigation[1]["navbar_links"];



// foreach ($navigation[1] as $key => $value) {
//     if ($key == "navbar_links") {
//         echo " $key: $value<br>";
//     }
// }


if (isset($_POST['subscribe'])) {
  $subscribe = $_POST['email'];
  $subscriber = "INSERT INTO `subscribers`(`subscriber`) VALUES ('$subscribe')";
  mysqli_query($conn, $subscriber);

  header("Location: http://localhost/my_web/home.php");
}
// $href = isset($_GET['page']) ? $_GET['page'] : ' ';
// $result = $conn->query("SELECT * FROM navigationbar WHERE href='$href'");
// $allPages = $conn->query("SELECT * FROM navigationbar")->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="robots" content="noindex, nofollow">
  <link rel="icon" type="image/x-icon" href="icon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="admin.css">

  <title>Document</title>
</head>

<body>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid  position-relative d-flex align-items-center justify-content-between">
      <nav id="navbar" class="navbar navbar-default navbar-expand-lg ">
        <div class="container-fluid">
          <div class="logo">
            <a class="navbar-brand text-white fs-1" href="home.php">
              <img src="<?php echo 'image/' . $settings['logo'] ?>" style="width: 70px; border-radius: 5px;">


              <!-- <?php foreach ($settings as $setting): ?>
                            <img src="image/<?php echo $setting['logo']; ?>" alt="Site Logo" width="100">
                        <?php endforeach; ?> -->
            </a>
          </div>
          <button class="navbar-toggler bg-info text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end " id="navbarTogglerDemo03">
            <ul class="navbar-nav">
              <?php
              foreach ($navigation as $links) { ?>
                <li class="nav-item p-3 d-flex  ">
                  <a id="link" class="nav active" href=" <?php echo $links['href'] ?>">
                    <?php echo $links['navbar_links'] ?></a>
                </li>
              <?php } ?>

              <!-- <?php foreach ($allPages as $page) { ?>
                                <li class="nav-item">
                                    <a id="link" class="nav active" href="<?php echo $page['href']; ?>"><?php echo $page['navbar_links']; ?></a>
                                </li>
                            <?php } ?> -->


              <!-- <?php
              //  while ($page = $allPages->fetch_assoc()) {
              ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=<?php
                                // echo $allPages['href'];
                                ?>">
                                    <?php
                                    // echo $allPages['navbar_links']; 
                                    ?>
                            </a>
                            </li>
                        <?php
                        //  }
                        ?> -->

            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- <section class="section">
    <div class="container section-title aos-init aos-animate " data-aos="fade-up">

     
        <?php
        // if ($result->num_rows > 0) {
        //     $row = $result->fetch_assoc();
        //     echo "<h1>{$row['title']}</h1><p>{$row['content']}</p>";
        // } else {
        //     echo "<h1>Page Not Found</h1>";
        // }
        ?>
    </div>
</section>-->






  <section id="home" class="home section dark-background">
    <div class="container section_home">
      <a href="home.php">
        <h1>Hi,it's<p class="Text"><?php echo $settings['first_name'] ?></p>
        </h1>
      </a>

      <!-- <div class="wrapper">
        <div class="static-txt"><p>I'am</p></div>
          <ul class="dynamic-txts">
          <?php while ($category = mysqli_fetch_assoc($categories)) { ?>
            <?php echo $category['profession'] ?>
          </ul>
          </div>  
      <?php } ?> -->

    </div>
    <div class="profile-img">
      <img src="<?php echo 'image/' . $settings['images'] ?>" class="img-fluid ">
    </div>


  </section>








  <?php
  include 'header.php';
  $contact = $_GET['contact'];

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
        <h2 class="abo"><?php echo $page_name[$contact]['navbar_links']; ?></h2>

        <p>Contact me and I help you.</p>
      </div>

      <div><?php echo $page_name[$contact]['body']; ?>

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
                  <p>+19 <?php echo $settings['number'] ?></p>
                </div>
              </div>

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p><a href="#"><?php echo $settings['email'] ?></a></p>
                </div>
              </div>

              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.280109696426!2d78.28416936955642!3d30.090079658806705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093e06f6a6281d%3A0x76564b96e2aa96f1!2sAvas%20Vikas%20Colony%2C%20Rishikesh%2C%20Uttarakhand%20249201!5e1!3m2!1sen!2sin!4v1724390545146!5m2!1sen!2sin"
                frameborder="0" style="border:0; width: 100%; height: 280px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                  <input type="text" minlength="0" maxlength="10" class="form-control" name="contact" id="number-field"
                    required="">
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



  <?php
  include 'header.php';
  // $resume = strtolower($_GET['resume']);
  $resume = $_GET['resume'];


  ?>
  <section id="resume" class="resume section ">
    <div class="container section-title">
      <h2 class="abo"><?php echo $page_name[$resume]['navbar_links']; ?></h2>
      <h3>Introduction</h3>
      <p>My name is Shiva Diwaker and I am Leaving from Rishikesh Uttarakhand and My birth is uttar pardesh 38 the
        district is shambhal My village is Raja ka majhola and My Education is 1 to 5 class primary school hindi medium
        and 6 to 8 class junior school hindi medium and 10th and 12th school punjab shing kshetra inter college
        rishikesh Dehradun and my school srtudy is complete in 2024-2025 and I am preparastion for BCA.</p>
      <div><?php echo $page_name[$resume]['body']; ?>

      </div>

    </div>
  </section>
  <!-- <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="resume-item pb-0">
            <h4><b>Shiva Diwaker</b></h4>
            <ul>
              <li><b>Email id: </b><a href=""><?php echo $settings['email'] ?></a></li>
              <li><b>Mobile no. :</b>+19 <?php echo $settings['number'] ?></li>
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



  <script>
    // Animate progress bars when scrolled into view
    document.addEventListener('DOMContentLoaded', function () {
      const progressBars = document.querySelectorAll('.progress-bar');

      function animateBars() {
        progressBars.forEach(bar => {
          const barPosition = bar.getBoundingClientRect().top;
          const screenPosition = window.innerHeight * 0.8;

          if (barPosition < screenPosition) {
            const level = bar.getAttribute('data-level');
            bar.style.width = level + '%';
          }
        });
      }

      // Run on load
      animateBars();

      // Run on scroll
      window.addEventListener('scroll', animateBars);
    });
  </script>


  .progress-container {
  height: 10px;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 5px;
  overflow: hidden;
  }

  .progress-bar {
  height: 100%;
  border-radius: 5px;
  width: 0;
  transition: width 1.5s ease-in-out;
  position: relative;
  }

  /* Skill-specific colors */
  .progress-bar.html {
  background: var(--accent-color);
  }
  .progress-bar.css {
  background: var(--accent-color);}
  .progress-bar.javascript {
  background: var(--accent-color);}
  .progress-bar.php {
  background: var(--accent-color);}
  .progress-bar.photoshop {
  background: var(--accent-color);}
  .progress-bar.bootstrap {
  background: var(--accent-color);}

  /* Shimmer animation */
  .progress-bar::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;

  border-radius: 5px;
  animation: shine 2s inherit;
  }

  @keyframes shine {
  0% { transform: translateX(-100%) skew(-20deg); }
  100% { transform: translateX(100%) skew(-20deg); }
  }


  <?php
  include 'connection.php';

  $sql = "SELECT `id`, `navbar_links`, `body` FROM `navigationbar` ";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_assoc($result);
  // print_r($rows);
// exit();
  

  // $id = $_GET['id'];
// if(isset($id));
// echo ($id);
// exit;
  if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Prevent SQL injection
  } else {
    $id = 0;
  }

  $navbar_link = "SELECT * FROM `navigationbar`  WHERE `id` = '$id' ";
  $navigation = mysqli_query($conn, $navbar_link);
  $nav_all = mysqli_fetch_assoc($navigation);
  // print_r($rows);
// exit();
  

  if (isset($_POST['update'])) {
    $navbar_links = $_POST['navbar_links'];
    $text = $_POST['text'];
    $update = "UPDATE `navigationbar` SET `navbar_links` = '$navbar_links', `body`= '$text' WHERE `id` = '$id' ";
    $result = mysqli_query($conn, $update);
    // print_r($result);
    // header("location:http://localhost/admin_panel/navigation_table.php");
  }

  // category
  $profession_table = "SELECT `id`, `profession` FROM `profession_categories` ";
  $tableresult = mysqli_query($conn, $profession_table);
  // $profession = mysqli_fetch_assoc($tableresult);
// print_r($profession);
// exit();
  if ("") {
    // header("location:profession_category_table.php");
  }

  if (isset($_POST['submit'])) {
    $profession = $_POST['profession'];
    $sql1 = "INSERT INTO `profession_categories` (`profession`) VALUE ('$profession')";
    mysqli_query($conn, $sql1);
    // header("location:http://localhost/admin_panel/profession_category_table.php");
  }

  // $id = $_GET['id'];
// echo($id);
  

  $sql = "SELECT * FROM `profession_categories`  WHERE `id` = '$id' ";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_assoc($result);
  // print_r($rows);  
// exit();
  
  if (isset($_POST['update'])) {
    $profssion_category = $_POST['profssion_category'];
    $update = "UPDATE `profession_categories` SET `profession`='$profssion_category' WHERE `id`= '$id' ";
    $category_result = mysqli_query($conn, $update);
    // print_r($category_result);
    // header("location:http://localhost/admin_panel/profession_category_table.php");
  }

  //setting 
  $Setting = "SELECT `id`, `first_name`, `email`, `number`, `images`,`logo` FROM `basic_setting` ";
  $settingresult = mysqli_query($conn, $Setting);
  $setting = mysqli_fetch_assoc($settingresult);
  // print_r($setting);
// exit();
  if ("") {
    header("location:setting_table.php");
  }

  $Setting = "SELECT * FROM `basic_setting`  WHERE `id` = '$id' ";
  $settingresult = mysqli_query($conn, $Setting);
  $settings = mysqli_fetch_assoc($settingresult);
  // print_r($rows);
// exit();
  
  #Get Navbar Name From DB
  if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $uploadimage = $_FILES["images"]["name"];
    $uploadlogo = $_FILES['logo']['name'];

    $update = "UPDATE `basic_setting` SET `first_name`='$first_name',`email`='$email',`number`='$number',`images`='$uploadimage',`logo`='$uploadlogo' WHERE `id` = '$id' ";
    mysqli_query($conn, $update);


    $tempname = $_FILES["images"]["tmp_name"];
    $folder = 'image/' . $uploadimage;
    move_uploaded_file($tempname, $folder);

    $tempname = $_FILES["logo"]["tmp_name"];
    $folder = 'image/' . $uploadlogo;
    move_uploaded_file($tempname, $folder);
    // header("Location: http://localhost/my_web/setting_table.php");
  }


  // include 'config.php'; // Ensure you have a database connection
  
  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

    <link rel="stylesheet" href="admin_panel.css">
    <title>Document</title>
  </head>

  <body>
    <nav class="menu bg-secondary " tabindex="0">
      <div class="smartphone-menu-trigger"></div>
      <header class="avatar">
        <img src="s.jpeg" height="100px" />
        <h2 class="text-info">Shiva Diwaker</h2>
      </header>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="navigation_table.php">Header</a></li>
        <li><a href="profession_category_table.php">profession Category</a></li>
        <li><a href="setting_table.php">website basic settings</a></li>
      </ul>
    </nav>









    <?php
    include 'admin_panel.php';


    if (isset($_POST['submit'])) {
      $navlinks = $_POST['navlinks'];
      $text = $_POST['text'];
      $href = $_POST['href'];

      $escaped_navlinks = $conn->real_escape_string($_POST['navlinks']);
      $escaped_text = $conn->real_escape_string($_POST['text']);
      $escaped_href = $conn->real_escape_string($_POST['href']);

      $insert = "INSERT INTO `navigationbar` (`navbar_links`,`body`,`href`) VALUES ('$escaped_navlinks','$escaped_text','$escaped_href') ";
      mysqli_query($conn, $insert);

      header("Location: http://localhost/my_web/navigation_table.php");
    }

    // if (isset($_POST['add'])) {
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $href = strtolower(str_replace(' ', '-', $title));
    
    //     $insert = "INSERT INTO `navigationbar` (`navbar_links`,`body`,`href`) VALUES ('$title','$content','$href') ";
//     mysqli_query($conn, $insert);
    

    //     // $conn->query("INSERT INTO `navigationbar` (`navbar_links`,`body`,`href`) VALUES ('$title','$content','$href')");
//     header("Location: http://localhost/my_web/navigation_table.php");
// }
    ?>



    <style>
      .container {
        width: 80%;
        border-radius: 10px;
        color: black;

      }
    </style>






    <div class="container-fluid">
      <div class="row">
        <div class="container border border-4 border-warning">
          <p class="display-6 text-info text-center"><b>Create a New Page</b></p>
          <form action="navigation_form.php" method="POST" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-4">
              <label class="form-label ">Add navigation Links</label>
              <input type="text" class="form-control" name="navlinks">
            </div>

            <div class="col-md-4">
              <label class="form-label ">Add Href Links</label>
              <input type="text" class="form-control" name="href">
            </div>

            <div class="col-md-12">
              <label for="text-field" class="pb-2">Add text</label>
              <textarea class="form-control" name="text" id="text-field"></textarea>
            </div>

            <div class="col-12 submit ">
              <button type="submit" class="btn btn-outline-info" name="submit">Submit</button>
            </div>
          </form>

          <!-- <h2 class="mt-3">Create a New Page</h2> -->
          <!-- <form action="navigation_form.php" method="POST" enctype="multipart/form-data" class="row g-3">
                <div class="col-md-4">
                    <input type='text' name='title' placeholder='Page Title' class="form-control" required>
                </div>

                <div class="col-md-4">
                    <input type="text" class="form-control" name="href" placeholder="Href" required>
                </div>


                <div class="col-md-12">
                    <textarea class="form-control" name="content" id="text-field" placeholder='Page Content' required></textarea>
                </div>

                <div class="col-12 submit ">
                    <button type="submit" class="btn btn-success mt-2" name="add">Create Page</button>
                </div>
            </form>
 -->





          <!-- links form -->

        </div>
        <!-- row end -->
      </div>
      <!--container end -->
    </div>

    <!-- <form action="navigation_form.php" method="POST" enctype="multipart/form-data" class="row g-3">
                <div class="col-md-4">
            <label class="form-label ">Add navigation Links</label>
            <input type="text" class="form-control" name="navlinks">
        </div>

        <div class="col-md-4">
            <label class="form-label ">Add Href Links</label>
            <input type="text" class="form-control" name="href">
        </div>

        <div class="col-md-12">
            <label for="text-field" class="pb-2">Add text</label>
            <textarea class="form-control" name="text" id="text-field"></textarea>
        </div>
        
        <input type="submit" value="Submit">
                </form> -->



    <?php
    include 'admin_panel.php';
    $id = $_GET['id'];
    // echo ($id);
    


    $navbar_link = "SELECT * FROM `navigationbar`  WHERE `id` = '$id' ";
    $navigation = mysqli_query($conn, $navbar_link);
    $nav_all = mysqli_fetch_assoc($navigation);
    // // print_r($rows);
// // exit();
    
    if (isset($_POST['update'])) {
      $escaped_navbar_links = $conn->real_escape_string($_POST['navbar_links']);
      $escaped_href = $conn->real_escape_string(strtolower($_POST['href']));
      $escaped_text = $conn->real_escape_string($_POST['text']);

      $update = "UPDATE `navigationbar` SET `navbar_links` = '$escaped_navbar_links', `href` = '$escaped_href', `body`='$escaped_text' WHERE `id` = '$id'";

      mysqli_query($conn, $update);


      header("location:http://localhost/my_web/navigation_table.php");
    }


    // Close the connection
    $conn->close();
    // 
    ?>

    <div class="container border border-warning">
      <p class="text"><b>Update Form <?php echo $id ?></b></p>
      <form action="navbar_update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="row g-5">

        <div class="col-md-6">
          <label for="inputlinks" class="form-label">Links Name</label>
          <input type="text" class="form-control " id="inputlinks" value="<?php echo $nav_all['navbar_links'] ?>"
            name="navbar_links">
        </div>

        <div class="col-md-6">
          <label for="inputlhref" class="form-label">Href Name</label>
          <input type="text" class="form-control " id="inputhref" value="<?php echo $nav_all['href'] ?>" name="href">
        </div>

        <div class="col-md-12">
          <label for="text-field" class="pb-2">Add text</label>
          <textarea class="form-control" name="text" id="text-field"><?php echo $nav_all['body'] ?></textarea>
        </div>
        <div class="col-12 submit">
          <button type="submit" class="btn btn-warning" name="update">Update</button>
        </div>
      </form>
    </div>




    <?php
    include 'admin_panel.php';
    $Setting = "SELECT `id`, `first_name`, `email`, `number`, `images`,`logo` FROM `basic_setting` ";
    $settingresult = mysqli_query($conn, $Setting);
    $setting = mysqli_fetch_assoc($settingresult);
    echo "<pre>";
    print_r($setting);
    echo "</pre>";


    // exit();
// if ("") {
//   header("location:http://localhost/my_web/setting_table.php");
// }
    ?>
    <style>
      .but {
        border: none;
      }

      .but {
        border: none;
        border-radius: 10px;
      }

      .bt {
        text-align: center;
        margin-left: 45%;
      }
    </style>

    <p class="display-6 text-info text-center"><b>Website Basic Settings</b></p>


    <table class="table  table-bordered border-black table-hover" class="row g-12" style="text-align: center;">
      <thead class="table-dark">
        <tr>
          <th class="col-1" scope="gcol">Id</th>
          <th class="col-1" scope="col">First Name</th>
          <th class="col-1" scope="col">Email</th>
          <th class="col-1" scope="col">Mobile_no</th>
          <th class="col-1" scope="col">Image</th>
          <th class="col-1" scope="col">Logo</th>
          <th class="col-1" scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <th class="col-1"><?php echo $setting['id'] ?></th>

          <td class="col-1"><?php echo $setting['first_name'] ?></td>

          <td class="col-1"><?php echo $setting['email'] ?></td>

          <td class="col-1"><?php echo $setting['number'] ?></td>

          <td class="col-1"><img src="image/<?php echo $setting['images'] ?>" width="80px" height="50px"></td>

          <td class="col-1"><img src="image/<?php echo $setting['logo'] ?>" width="80px" height="50px"></td>

          <td class="col-1"><button
              class="but"><?php echo "<a class='btn btn-outline-info' href='setting_update.php?id=$setting[id]''role='button'>Update</a>"; ?></button>

          </td>

          </td>
        </tr>
      </tbody>
    </table>

    <!-- <a class='btn btn-outline-info'  href="setting.php">+Add</a> -->





    <?php
    include 'admin_panel.php';
    $id = $_GET['id'];
    // echo $id;
// exit;
    

    $Setting = "SELECT * FROM `basic_setting`  WHERE `id` = '$id' ";
    $settingresult = mysqli_query($conn, $Setting);
    $settings = mysqli_fetch_assoc($settingresult);
    // print_r($rows);
// exit();
    

    #Get Navbar Name From DB
    if (isset($_POST['submit'])) {
      $first_name = $_POST['first_name'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      $uploadimage = $_FILES["images"]["name"];
      $uploadlogo = $_FILES['logo']['name'];

      $update = "UPDATE `basic_setting` SET `first_name`='$first_name',`email`='$email',`number`='$number',`images`='$uploadimage',`logo`='$uploadlogo' WHERE `id` = '$id' ";
      mysqli_query($conn, $update);


      $tempname = $_FILES["images"]["tmp_name"];
      $folder = 'image/' . $uploadimage;
      move_uploaded_file($tempname, $folder);

      $tempname = $_FILES["logo"]["tmp_name"];
      $folder = 'image/' . $uploadlogo;
      move_uploaded_file($tempname, $folder);
      header("Location: http://localhost/my_web/setting_table.php");
    }

    ?>
    <style>
      .container {
        width: 80%;
        border-radius: 10px;
        color: black;

      }
    </style>

    <div class="container-fluid">
      <div class="row">
        <div class="container border border-4 border-warning">
          <p class="display-6 text-info text-center"><b>Website Basic Settings <?php echo $id ?></b></p>
          <div class="col-12">

            <form action="setting_update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data"
              class="row g-3">

              <div class="col-md-6">
                <label for="first-name" class="form-label">Enter First Name</label>
                <input type="text" class="form-control" id="first-name" value="<?php echo $settings['first_name'] ?>"
                  name="first_name">
              </div>

              <div class="col-md-6">
                <label for="inputemail" class="form-label">Enter Email</label>
                <input type="email" class="form-control" value="<?php echo $settings['email'] ?>" id="inputemail"
                  name="email">
              </div>

              <div class="col-md-6">
                <label for="inputnumber" class="pb-2">Contact</label>
                <input type="mobile" minlength="0" maxlength="10" value="<?php echo $settings['number'] ?>"
                  class="form-control" placeholder="+19" name="number" id="inputnumber-field">
              </div>

              <div class="col-md-6">
                <label for="inputimage" class="pb-2">Add Photos</label>
                <input type="file" class="form-control" name="images" value="<?php echo $settings['images'] ?>"
                  id="inputimage">
              </div>


              <div class="col-md-6">
                <label for="inputlogo" class="pb-2">Add logo</label>
                <input type="file" class="form-control" name="logo" value="<?php echo $resultall['logo'] ?>"
                  id="inputlogo">
              </div>

              <div class="col-12 submit text-center">
                <button type="submit" class="btn btn-outline-info" value="image" name="submit">Submit</button>
              </div>

            </form>
          </div>
        </div>


        <!-- row end -->
      </div>
      <!--container end -->
    </div>


  </body>


  <?php
  session_start();
  ?>

  <link rel="stylesheet" href="popup.css">
  <!-- Registration Modal -->
  <div class="modal active" id="registerModal">
    <div class="modal-content">
      <button class="close" onclick="closeModal()">&times;</button>

      <?php if ($show_form): ?>
        <!-- Registration Form -->
        <h2>Register Now</h2>

        <?php if (!empty($error)): ?>
          <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <!-- <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required
                        value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter your username">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"
                        placeholder="your@email.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required
                        value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter your password">
                </div>

                <button type="submit" name="register" class="pop_btn">Continue</button>
                <div class="form-footer">
                    By registering, you agree to our Terms of Service
                </div>

            </form> -->

        <form method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars($username); ?>"
              placeholder="Enter your username">
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"
              placeholder="your@email.com">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>

          </div>

          <button type="submit" name="register" class="pop_btn">
            <i class="bi bi-person-plus"></i> Register
          </button>
          <div class="form-footer">
            <p>I have already registered? <a href="login.php" class="text-primary">Login</a></p>
          </div>

        </form>

      <?php elseif ($thank_you): ?>
        <!-- Thank You Message -->
        <div class="thank-you">
          <div class="thank-you-icon">✓</div>
          <h2>Registration Successful!</h2>
          <p>Thank you for joining us.</p>
          <p>A confirmation has been sent to <span class="submitted-email"><?php echo htmlspecialchars($email); ?></span>
          </p>
          <button onclick="closeModal()" class="pop_btn">Continue to Site</button>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // Show modal on page load
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('registerModal');
      modal.classList.add('active');
    });

    // Close modal function
    function closeModal() {
      const modal = document.getElementById('registerModal');
      modal.classList.remove('active');
      setTimeout(() => {
        modal.style.display = 'none';
      }, 300); // Match the transition duration
    }

    // Close when clicking outside
    window.addEventListener('click', function (event) {
      const modal = document.getElementById('registerModal');
      if (event.target === modal) {
        closeModal();
      }
    });
  </script>

  <!-- 
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h3><i class="bi bi-person-plus"></i> Create Account</h3>
        </div>

        <div class="auth-body">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>

                <div class="form-group password-container">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Create password" required>
                    <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                </div>

                <button type="submit" class="btn btn-primary mt-3" name="signup">
                    <i class="bi bi-person-plus"></i> Sign Up
                </button>
            </form>
        </div>

        <div class="auth-footer">
            <p>Already have an account? <a href="signin.php" class="text-primary">Sign In</a></p>
        </div>
    </div>
</div> -->

  <script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



  <?php
  include 'connection.php';
  session_start();
  $show_form = true;
  $thank_you = false;
  $error = '';
  $username = '';
  $email = '';

  if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Note: In production, use password_verify() with hashed passwords
  
    $query = mysqli_query($conn, "SELECT * FROM `users_register` WHERE `email`='$email' AND `password`='$password'");
    if (mysqli_num_rows($query) == 1) {
      $show_form = false;
      $thank_you = true;
      $user = mysqli_fetch_assoc($query);
      $_SESSION['user'] = $user['username'];
      $_SESSION['user_id'] = $user['id']; // Store user ID in session
      header("Location: home.php?home=home");
      exit();
    } else {
      $error = "Invalid email or password.";
    }
  }
  ?>
  <link rel="stylesheet" href="popup.css">

  <!-- Login Modal -->
  <div class="modal active" id="loginModal">
    <div class="modal-content">
      <button class="close" onclick="closeModal()">&times;</button>

      <?php if ($show_form): ?>
        <!-- Login Form -->
        <h2>Login Now</h2>

        <?php if (!empty($error)): ?>
          <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>



        <form method="post">


          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"
              placeholder="your@email.com">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>

          </div>

          <button type="submit" name="login" class="pop_btn">
            <i class="bi bi-person-plus"></i> Login
          </button>
          <div class="form-footer">
            <p>I have already registered? <a href="popup.php" class="text-primary">register</a></p>
          </div>

        </form>

      <?php elseif ($thank_you): ?>
        <!-- Thank You Message -->
        <div class="thank-you">
          <div class="thank-you-icon">✓</div>
          <h2>Registration Successful!</h2>
          <p>Thank you for joining us.</p>
          <p>A confirmation has been sent to <span class="submitted-email"><?php echo htmlspecialchars($email); ?></span>
          </p>
          <button onclick="closeModal()" class="pop_btn">Continue to Site</button>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // Show modal on page load
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('loginModal');
      modal.classList.add('active');
    });

    // Close modal function
    function closeModal() {
      const modal = document.getElementById('loginModal');
      modal.classList.remove('active');
      setTimeout(() => {
        modal.style.display = 'none';
      }, 300); // Match the transition duration
    }

    // Close when clicking outside
    window.addEventListener('click', function (event) {
      const modal = document.getElementById('loginModal');
      if (event.target === modal) {
        closeModal();
      }
    });

    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  </script>



  <?php
  // session_start();
// if (!isset($_SESSION['user'])) {
//   header("Location: index.php");
//   exit();
// }
  
  // include 'header.php';
// include 'index_1.php';
// include 'index.php';
  
  // $result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
  

  ?>

  <!-- 
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    /* Custom Animations */
    .home-section {
      overflow: hidden;
    }

    .hero-content {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.8s ease-out forwards;
    }

    .hero-image {
      opacity: 0;
      transform: scale(0.9);
      animation: fadeInScale 1s 0.3s ease-out forwards;
    }

    .profile-image {
      transition: transform 0.5s ease;
    }

    .profile-image:hover {
      transform: scale(1.03);
    }

    .btn {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .shape {
      transition: all 1s ease;
    }

    .shape-1 {
      animation: float 6s ease-in-out infinite;
    }

    .shape-2 {
      animation: float 8s ease-in-out infinite;
      animation-delay: 1s;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInScale {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    /* @keyframes float {

      0%,
      100% {
        transform: translateY(0) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(10deg);
      }
    } */

    /* Typing Animation */
    /* .dynamic-text {
      display: inline-block;
      overflow: hidden;
      border-right: 2px solid #7843E9;
      white-space: nowrap;
      margin: 0;
      letter-spacing: 1px;
      animation:
        typing 3.5s steps(30, end) infinite alternate,
        blink-caret .75s step-end infinite;
    } */

    @keyframes typing {

      0%,
      100% {
        width: 0
      }

      30%,
      70% {
        width: 100%
      }

      80%,
      90% {
        width: 100%
      }
    }
  </style>
</head>

<body>
  <section id="home" class="home-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1 order-2">
          <div class="hero-content animate__animated animate__fadeInLeft">
            <span class="welcome-text text-gradient">Hi there, I'm</span>
            <h1 class="hero-title mt-3">
              <span
                class="text-gradient animate__animated animate__fadeIn animate__delay-1s"><?php echo $settings['first_name'] ?></span>
            </h1>

            <div class="profession-container mt-4">
              <span class="static-text text-gradient animate__animated animate__fadeIn animate__delay-2s">I'm a</span>
              <div class="profession-list animate__animated animate__fadeIn animate__delay-2s">
                <?php
                // Query to select categories
                // $sql = "SELECT * FROM categories ORDER BY id DESC";
                
                // // Execute query
                // $result = mysqli_query($conn, $sql);
                

                // if ($result) {
                //   while ($category = mysqli_fetch_assoc($result)) {
                //     ?>
                //     <span class="profession-item"><?php echo htmlspecialchars($category['name']); ?></span>
                //     <?php
                //   }
                // } else {
                //   echo "Error in query: " . mysqli_error($conn);
                // }
                ?>
              </div>
            </div>

            <div class="hero-buttons mt-5 animate__animated animate__fadeInUp animate__delay-3s">
              <a href="contact.php?contact=Contact" class="btn btn-primary me-3">Hire Me</a>
              <a href="resume.php?resume=Resume" class="btn btn-outline">View Work</a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 order-lg-2 order-1">
          <div class="hero-image animate__animated animate__fadeInRight animate__delay-1s">
            <img src="<?php
            // echo 'image/' . $settings['images'] ?>" alt="<?php echo $settings['first_name'] ?>"
              class="img-fluid profile-image">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Typing animation with profession cycling
    document.addEventListener('DOMContentLoaded', function () {
      const professions = <?php echo json_encode($professions); ?>;
      if (professions.length > 0) {
        let index = 0;
        const textElement = document.querySelector('.dynamic-text');
        const container = document.querySelector('.dynamic-text-container');

        function updateProfession() {
          container.style.width = textElement.offsetWidth + 'px';
          textElement.textContent = professions[index];

          // Trigger reflow for animation restart
          void textElement.offsetWidth;

          index = (index + 1) % professions.length;
        }

        // Initial setup
        updateProfession();

        // Change profession every 4 seconds
        setInterval(updateProfession, 4000);
      }
    });
  </script> -->