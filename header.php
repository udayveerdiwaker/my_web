<?php
include 'connection.php';
// $navigation = getall('navigationbar');
// $navigation = getall('navigationbar');
// // print_r($navigation);

// $page_name = array();

// foreach ($navigation as $nav) {
//     $page_name[$nav['navbar_links']] = $nav;


//   print_r($page_name);
// }

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
$href = isset($_GET['page']) ? $_GET['page'] : ' ';
$result = $conn->query("SELECT * FROM navigationbar WHERE href='$href'");
$allPages = $conn->query("SELECT * FROM navigationbar")->fetch_all(MYSQLI_ASSOC);

$settings = getall1('basic_setting');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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


                            <!-- <?php foreach ($settings as $setting) : ?>
                            <img src="image/<?php echo $setting['logo']; ?>" alt="Site Logo" width="100">
                        <?php endforeach; ?> -->
                        </a>
                    </div>
                    <button class="navbar-toggler bg-info text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end " id="navbarTogglerDemo03">
                        <ul class="navbar-nav">
                            <!-- <?php
                                    foreach ($navigation as $links) { ?>
                            <li class="nav-item p-3 d-flex  ">
                                <a id="link" class="nav active" href=" <?php echo $links['href'] ?>"> <?php echo $links['navbar_links'] ?></a>
                            </li>
                        <?php } ?> -->

                            <?php foreach ($allPages as $page) { ?>
                                <li class="nav-item">
                                    <a id="link" class="nav active" href="<?php echo $page['href']; ?>"><?php echo $page['navbar_links']; ?></a>
                                </li>
                            <?php } ?>


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
