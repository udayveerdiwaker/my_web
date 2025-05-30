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
    <meta name="description" content="Professional portfolio website">
    <meta name="keywords" content="portfolio, web design, development">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/x-icon" href="<?php echo 'image/' . $settings['logo'] ?>" class="rounded-circle">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>My Portfolio</title>
</head>
<style>
    /* Base Styles */
</style>

<body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="home.php">
                                <img src="<?php echo 'image/' . $settings['logo'] ?>" alt="Logo" class="logo-img">
                                <span class="brand-name">Portfolio</span>
                            </a>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                                <i class="bi bi-list"></i>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <?php foreach ($navigation as $links): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $links['href'] ?>">
                                                <?php echo $links['navbar_links'] ?>
                                                <span class="nav-underline"></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link cta-button" href="#contact">Hire Me</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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