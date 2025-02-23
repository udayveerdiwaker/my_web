<?php
include "admin_panel.php";


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