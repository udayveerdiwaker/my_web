<?php
include 'connection.php';
include 'functions.php';

// Fetch data from tables
$navbarLinks = getAll('navigationbar');
$professions = getAll('profession_categories');
$settings = getAll('basic_setting');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Web Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($navbarLinks as $link) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $link['body']; ?>">
                                <?php echo $link['navbar_links']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <h1>Welcome to My Dynamic Website</h1>
        <p>Data is fetched dynamically from MySQL</p>
    </header>

    <!-- Profession Categories -->
    <section class="container my-5">
        <h2 class="text-center">Profession Categories</h2>
        <div class="row">
            <?php foreach ($professions as $profession) : ?>
                <div class="col-md-4">
                    <div class="card p-3 shadow-sm">
                        <h4><?php echo $profession['profession']; ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Settings Section -->
    <section class="container my-5">
        <h2 class="text-center">Site Settings</h2>
        <?php foreach ($settings as $setting) : ?>
            <div class="text-center">
                <h3><?php echo $setting['first_name']; ?></h3>
                <p>Email: <?php echo $setting['email']; ?></p>
                <p>Phone: <?php echo $setting['number']; ?></p>
                <img src="image/<?php echo $setting['logo']; ?>" alt="Site Logo" width="100">
            </div>
        <?php endforeach; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>