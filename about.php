<?php include 'header.php'; 
$about = $_GET['about'];
?>

<style>
  /* About Section Styles */
.about-section {
  padding: 100px 0;
  background-color: var(--background-color);
}

.section-header {
  text-align: center;
  margin-bottom: 60px;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--heading-color);
  margin-bottom: 15px;
  font-family: var(--heading-font);
}

.section-subtitle {
  color: var(--color);
  font-size: 1.1rem;
  max-width: 700px;
  margin: 0 auto;
}

.profile-card {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
}

.profile-img {
  width: 100%;
  height: auto;
  display: block;
  transition: var(--transition);
}

.profile-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to top, rgba(52, 191, 73, 0.8), transparent);
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding: 30px;
  opacity: 0;
  transition: var(--transition);
}

.profile-card:hover .profile-overlay {
  opacity: 1;
}

.profile-card:hover .profile-img {
  transform: scale(1.05);
}

.about-content {
  padding-left: 30px;
}

.about-title {
  font-size: 2rem;
  font-weight: 600;
  color: var(--heading-color);
  margin-bottom: 20px;
}

.about-text {
  color: var(--default-color);
  line-height: 1.8;
  margin-bottom: 30px;
}

.details-list {
  list-style: none;
  padding: 0;
}

.details-list li {
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.details-list i {
  color: var(--accent-color);
  margin-right: 10px;
  font-size: 0.8rem;
}

.details-list strong {
  color: var(--heading-color);
  font-weight: 600;
  min-width: 100px;
  display: inline-block;
}

.details-list span {
  color: var(--default-color);
}

.about-quote {
  background-color: rgba(52, 191, 73, 0.05);
  border-left: 3px solid var(--accent-color);
  padding: 20px;
  margin-top: 30px;
  border-radius: 0 8px 8px 0;
}

.about-quote i {
  color: var(--accent-color);
  font-size: 1.5rem;
  margin-bottom: 10px;
  display: block;
}

.about-quote p {
  font-style: italic;
  color: var(--default-color);
  margin: 0;
}

/* Responsive Styles */
@media (max-width: 992px) {
  .about-content {
    padding-left: 0;
    margin-top: 40px;
  }
  
  .about-section {
    padding: 80px 0;
  }
}

@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .about-title {
    font-size: 1.8rem;
  }
  
  .details-list li {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .details-list strong {
    margin-bottom: 5px;
  }
}
</style>


<section id="about" class="about-section">
  <div class="container">
    <!-- Section Title -->
    <div class="section_title">
     
       <div class="section_title">
      <h2 class="section-title"><?php echo $page_name[$about]['navbar_links'];?><span class="text-gradient"> Me</span></h2>
      <div class="section-divider"></div>
    </div>


    <div class="row align-items-center">
      <div class="col-lg-5" data-aos="fade-right">
        <div class="profile-card">
          <img src="<?php echo 'image/' . $settings['images'] ?>" alt="Shiva Diwaker" class="profile-img">
          
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-left">
        <div class="about-content">
          <h3 class="about-title">I'm <span class="text-gradient"><?php echo $settings['first_name'] ?></span></h3>
          <p class="about-text">
            A passionate web developer from Rishikesh currently learning web development. 
            I enjoy playing cricket, football, and swimming in my free time. 
            I'm working towards both short-term and long-term goals in web development.
          </p>
          
          <div class="about-details">
            <div class="row">
              <div class="col-md-6">
                <ul class="details-list">
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Name:</strong> 
                    <span><?php echo $settings['first_name'] ?></span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Birthday:</strong> 
                    <span>8 Jan 2005</span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Phone:</strong> 
                    <span>+19 <?php echo $settings['number'] ?></span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>City:</strong> 
                    <span>Rishikesh, Uttarakhand</span>
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="details-list">
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Age:</strong> 
                    <span>18</span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Education:</strong> 
                    <span>12th Pass</span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Email:</strong> 
                    <span><?php echo $settings['email'] ?></span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Freelance:</strong> 
                    <span>Available</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="about-quote">
            <i class="bi bi-quote"></i>
            <p class="fst-italic">
              I'm a 12th pass student currently learning web development to build my career in this field.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>