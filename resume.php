<?php include 'header.php';
$resume = $_GET['resume'];
// $skills = isset($_GET['resume']) ? $_GET['resume'] : 'default';

?>

<style>
  /* Resume Section Styles */
  .resume-section {
    padding: 100px 0;
    background-color: var(--background-color);
  }

  .resume-intro {
    background-color: var(--surface-color);
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  }

  .resume-intro h3 {
    color: var(--heading-color);
    margin-bottom: 20px;
    font-size: 1.5rem;
  }

  .resume-intro p {
    color: var(--default-color);
    line-height: 1.8;
  }

  .resume-card {
    background-color: var(--surface-color);
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
    overflow: hidden;
  }

  .card-header {
    background-color: rgba(52, 191, 73, 0.1);
    padding: 20px 25px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  }

  .card-header i {
    font-size: 1.5rem;
    color: var(--accent-color);
    margin-right: 15px;
  }

  .card-header h3 {
    margin: 0;
    color: var(--heading-color);
    font-size: 1.3rem;
  }

  .card-body {
    padding: 25px;
  }

  .resume-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .resume-list li {
    margin-bottom: 15px;
    display: flex;
  }

  .resume-list strong {
    min-width: 100px;
    color: var(--heading-color);
    font-weight: 600;
  }

  .resume-list span {
    color: var(--default-color);
  }

  .resume-list a {
    color: var(--accent-color);
    text-decoration: none;
  }

  .timeline-item {
    position: relative;
    padding-left: 30px;
    margin-bottom: 25px;
  }

  .timeline-item:last-child {
    margin-bottom: 0;
  }

  .timeline-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 5px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: var(--accent-color);
  }

  .timeline-date {
    font-size: 0.9rem;
    color: var(--accent-color);
    font-weight: 600;
    margin-bottom: 5px;
  }

  .timeline-content h4 {
    color: var(--heading-color);
    font-size: 1.1rem;
    margin-bottom: 5px;
  }

  .timeline-content p {
    color: var(--default-color);
    margin: 0;
  }

  .experience-list {
    list-style: none;
    padding: 0;
    margin: 10px 0 0 0;
  }

  .experience-list li {
    position: relative;
    padding-left: 20px;
    margin-bottom: 8px;
    color: var(--default-color);
  }

  .experience-list li::before {
    content: '▹';
    position: absolute;
    left: 0;
    color: var(--accent-color);
  }

  /* Programming Skills Styles */
  .skills-container {
    margin-top: 15px;
  }

  .skill-item {
    margin-bottom: 25px;
  }

  .skill-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  .skill-name {
    color: var(--heading-color);
    font-weight: 500;
    font-size: 0.95rem;
  }

  .skill-percent {
    color: var(--accent-color);
    font-weight: 600;
    font-size: 0.9rem;
  }

  .skill-bar {
    height: 8px;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    overflow: hidden;
    position: relative;
  }

  .skill-level {
    height: 100%;
    border-radius: 4px;
    position: relative;
    width: 0;
    transition: width 1.5s ease;
  }

  /* Skill-specific colors */
  .skill-level.html-css {
    background: var(--accent-color);
  }

  .skill-level.bootstrap {
    background: var(--accent-color);
  }

  .skill-level.javascript {
    background: var(--accent-color);
  }

  .skill-level.php {
    background: var(--accent-color);
  }

  .skill-level.mysql {
    background: var(--accent-color);
  }

  /* Animation for skill bars */
  .skill-level::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;

  }

  @keyframes shine {
    0% {
      transform: translateX(-100%) skew(-20deg);
    }

    100% {
      transform: translateX(100%) skew(-20deg);
    }
  }

  .personal-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .personal-list li {
    margin-bottom: 10px;
    color: var(--default-color);
  }

  .personal-list strong {
    color: var(--heading-color);
    font-weight: 600;
    margin-right: 5px;
  }

  .hobbies-list {
    list-style: none;
    padding: 0;
    margin: 10px 0 0 0;
  }

  .hobbies-list li {
    position: relative;
    padding-left: 20px;
    margin-bottom: 8px;
    color: var(--default-color);
  }

  .hobbies-list li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: var(--accent-color);
    font-size: 1.2rem;
    line-height: 1;
  }

  /* Responsive Styles */
  @media (max-width: 992px) {
    .resume-section {
      padding: 80px 0;
    }
  }

  @media (max-width: 768px) {
    .resume-intro {
      padding: 20px;
    }

    .card-header {
      padding: 15px 20px;
    }

    .card-body {
      padding: 20px;
    }

    .resume-list li {
      flex-direction: column;
    }

    .resume-list strong {
      margin-bottom: 5px;
    }
  }
</style>

<section id="resume" class="resume-section">
  <div class="container">
    <!-- Section Header -->
    <div class="section-header">
      <h2 class="section-title"><?php echo $page_name[$resume]['navbar_links']; ?></h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">My professional journey and qualifications</p>
    </div>

    <div class="resume-intro">
      <h3>About Me</h3>
      <p>My name is Shiva Diwaker, originally from Raja Ka Majhola village in Shambhal district, Uttar Pradesh. Currently residing in Rishikesh, Uttarakhand. I completed my primary education (1st-5th grade) in Hindi medium, junior school (6th-8th) in Hindi medium, and completed my 10th and 12th from Punjab Singh Kshetra Inter College, Rishikesh. I'm currently preparing for BCA admission.</p>
    </div>

    <div class="resume-content">
      <div class="row">
        <!-- Left Column -->
        <div class="col-lg-6">
          <!-- Contact Info -->
          <div class="resume-card">
            <div class="card-header">
              <i class="bi bi-person-badge"></i>
              <h3>Personal Info</h3>
            </div>
            <div class="card-body">
              <ul class="resume-list">
                <li>
                  <strong>Full Name:</strong>
                  <!-- <span>Shiva Diwaker</span> -->
                  <span><?php echo $settings['first_name'] ?></span>

                </li>
                <li>
                  <strong>Email:</strong>
                  <span><a href="mailto:<?php echo $settings['email'] ?>"><?php echo $settings['email'] ?></a></span>
                </li>
                <li>
                  <strong>Phone:</strong>
                  <span>+19 <?php echo $settings['number'] ?></span>
                </li>
                <li>
                  <strong>Address:</strong>
                  <span>House No. 507 Awas Vikas Colony, Rishikesh, Uttarakhand</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Education -->
          <div class="resume-card">
            <div class="card-header">
              <i class="bi bi-book"></i>
              <h3>Education</h3>
            </div>
            <div class="card-body">
              <div class="timeline-item">
                <div class="timeline-date">2024-2025</div>
                <div class="timeline-content">
                  <h4>12th Standard</h4>
                  <p>Punjab Singh Kshetra Inter College, Rishikesh</p>
                </div>
              </div>
              <div class="timeline-item">
                <div class="timeline-date">2021-2022</div>
                <div class="timeline-content">
                  <h4>10th Standard</h4>
                  <p>Modern School, Rishikesh</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Programming Skills -->
          <div class="resume-card">
            <div class="card-header">
              <i class="bi bi-code-slash"></i>
              <h3>Programming Skills</h3>
            </div>
            <div class="card-body">
              <div class="skills-container">
                <div class="skill-item">
                  <div class="skill-info">
                    <span class="skill-name">HTML/CSS</span>
                    <span class="skill-percent">85%</span>
                  </div>
                  <div class="skill-bar">
                    <div class="skill-level html-css" data-level="85"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-info">
                    <span class="skill-name">Bootstrap</span>
                    <span class="skill-percent">80%</span>
                  </div>
                  <div class="skill-bar">
                    <div class="skill-level bootstrap" data-level="80"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-info">
                    <span class="skill-name">PHP</span>
                    <span class="skill-percent">65%</span>
                  </div>
                  <div class="skill-bar">
                    <div class="skill-level php" data-level="65"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-info">
                    <span class="skill-name">JavaScript</span>
                    <span class="skill-percent">40%</span>
                  </div>
                  <div class="skill-bar">
                    <div class="skill-level javascript" data-level="40"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="skill-info">
                    <span class="skill-name">MySQL</span>
                    <span class="skill-percent">50%</span>
                  </div>
                  <div class="skill-bar">
                    <div class="skill-level mysql" data-level="50"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-6">
          <!-- Experience -->
          <div class="resume-card">
            <div class="card-header">
              <i class="bi bi-briefcase"></i>
              <h3>Experience</h3>
            </div>
            <div class="card-body">
              <div class="timeline-item">
                <div class="timeline-content">
                  <h4>Data Entry Operator</h4>
                  <ul class="experience-list">
                    <li>Accurate data input and management</li>
                    <li>Data maintenance</li>
                  </ul>
                </div>
              </div>
              <div class="timeline-item">
                <div class="timeline-content">
                  <h4>Computer Technician</h4>
                  <ul class="experience-list">
                    <li>Windows installation and configuration</li>
                    <li>Software installation and troubleshooting</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Personal Details -->
          <div class="resume-card">
            <div class="card-header">
              <i class="bi bi-person-lines-fill"></i>
              <h3>Personal Details</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <ul class="personal-list">
                    <li><strong>Father:</strong> Mr. Omveer</li>
                    <li><strong>Mother:</strong> Mrs. Rani</li>
                    <li><strong>DOB:</strong> 08-01-2005</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="personal-list">
                    <li><strong>Gender:</strong> Male</li>
                    <li><strong>Nationality:</strong> Indian</li>
                    <li><strong>Status:</strong> Unmarried</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Languages & Hobbies -->
          <div class="resume-card">
            <div class="card-header">
              <i class="bi bi-translate"></i>
              <h3>Speaking Languages & Hobbies</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4>Speaking Languages</h4>
                  <ul class="hobbies-list">
                    <li>Hindi (Fluent)</li>
                    <li>English (Basic)</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4>Hobbies</h4>
                  <ul class="hobbies-list">
                    <li>Cricket</li>
                    <li>Football</li>
                    <li>Swimming</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Animate skill bars when they come into view
  document.addEventListener('DOMContentLoaded', function() {
    const skillBars = document.querySelectorAll('.skill-level');

    const animateSkillBars = () => {
      skillBars.forEach(bar => {
        const level = bar.getAttribute('data-level');
        if (isElementInViewport(bar)) {
          bar.style.width = level + '%';
        }
      });
    };

    const isElementInViewport = (el) => {
      const rect = el.getBoundingClientRect();
      return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0
      );
    };

    // Run once on load
    animateSkillBars();

    // Run on scroll
    window.addEventListener('scroll', animateSkillBars);
  });
</script>

<?php include 'footer.php'; ?>