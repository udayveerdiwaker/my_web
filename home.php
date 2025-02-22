<?php
include 'header.php';
?>
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
include 'footer.php';

?>
</body>

</html>