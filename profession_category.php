<?php
include "admin_panel.php";


if (isset($_POST['submit'])) {
    $profession = $_POST['profession'];
    $sql1 = "INSERT INTO `profession_categories` (`profession`) VALUE ('$profession')";
    mysqli_query($conn, $sql1);
    header("location:http://localhost/my_web/profession_category_table.php");
}

?>
    <style>
        .container {
            width: 80%;
            border-radius: 10px;
        }
    </style>

    <div class="container bg- border border-warning">
        <div class="row align-items-center">
            <p class="display-6 text-center text-warning"><b>Add Professional category</b></p>

            <!--profession-->
            <form action="profession_category.php" method="post" enctype="multipart/form-data" class="row g-3">

                <div class="col-md-6">
                    <label for="Inputprofession" class="form-label">Profession category</label>
                    <input type="text" class="form-control" id="Inputprofession" name="profession">
                </div>
                <div class="col-12 submit">
                    <button type="submit" class="btn btn-outline-info" name="submit">Submit</button>
                </div>
            </form>
            <!-- row end -->
        </div>
        <!--container end -->
    </div>
