<?php
include 'connection.php';
$navigation = getall('navigationbar');

$setting = getall('basic_setting');
print_r($navigation);
print_r($setting);
echo $navigation[1]["navbar_links"];



// foreach ($navigation[1] as $key=>$value ) {
//     if ($key == "navbar_links") {
//         echo "$key: $value<br>";
//     }
// }

if (isset($_POST['subscribe'])) {
    $subscribe = $_POST['email'];
    $subscriber = "INSERT INTO `subscribers`(`subscriber`) VALUES ('$subscribe')";
    mysqli_query($conn, $subscriber);

    // header("Location: http://localhost/admin_panel/home.php");
}

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




<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid  position-relative d-flex align-items-center justify-content-between">



        <nav id="navbar" class="navbar navbar-default navbar-expand-lg ">
            <div class="container-fluid">

                <div class="logo">
                    <a class="navbar-brand text-white fs-1" href="home.php">
                        <img src="<?php echo 'image/' . $resultall['logo'] ?>" style="width: 70px; border-radius: 5px;"></a>
                </div>
                <button class="navbar-toggler bg-info text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end " id="navbarTogglerDemo03">
                    <ul class="navbar-nav">
                        <?php
                        foreach ($navigation as $links) { ?>
                            <li class="nav-item p-3 d-flex  ">
                                <a id="link" class="nav active" href=" <?php echo $links['href'] ?>"> <?php echo $links['navbar_links'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>