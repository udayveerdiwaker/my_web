<?php
include "admin_panel.php";

include "connection.php";

if (isset($_POST['submit'])) {
    $navlinks = $_POST['navlinks'];
    $text = $_POST['text'];
    $href = $_POST['href'];

    $escaped_navlinks = $conn->real_escape_string($_POST['navlinks']);
    $escaped_text = $conn->real_escape_string($_POST['text']);
    $escaped_href = $conn->real_escape_string($_POST['href']);

    $insert = "INSERT INTO `navigationbar` (`navbar_links`,`body`,`href`) VALUES ('$escaped_navlinks','$escaped_text','$escaped_href') ";
    mysqli_query($conn, $insert);

    header("Location: http://localhost/admin_panel/navigation_table.php");
}


// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Check if form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get the textarea content and escape it
//     $navlinks = $conn->real_escape_string($_POST['navlinks']);
//     $text = $conn->real_escape_string($_POST['text']);
//     $href = $conn->real_escape_string($_POST['href']);

//     // Prepare the SQL statement
//     $sql = "INSERT INTO `navigationbar` (`navbar_links`,`body`,`href`) VALUES ('$navlinks','$text','$href')";

//     // Execute the query
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//     header("Location: http://localhost/admin_panel/navigation_table.php");

// }

// // Close connection
// $conn->close();

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
            <p class="display-6 text-info text-center"><b>Add Navigationbar Data</b></p>
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