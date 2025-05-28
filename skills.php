<?php
include 'header.php';
$skills = $_GET['skills'];
?>

<section id="skills" class="skills-section">
  <div class="container">
    <!-- Section Header -->
    <div class="skills-header" data-aos="fade-up">
      <h2 class="section-title"><?php echo $page_name[$skills]['navbar_links']; ?></h2>
      <div class="section-divider"></div>
      <p class="section-description">Here's a visual representation of my technical skills and proficiency levels</p>
    </div>

    <!-- Skills Grid -->
    <div class="skills-grid" data-aos="fade-up" data-aos-delay="100">
      <!-- HTML -->
      <div class="skill-card">
        <div class="skill-meta">
          <div class="skill-icon">
            <i class="fab fa-html5"></i>
          </div>
          <div class="skill-info">
            <h3 class="skill-title">HTML5</h3>
            <span class="skill-level">Advanced</span>
          </div>
        </div>
        <div class="progress-container">
          <div class="progress-track">
            <div class="progress-fill html" data-level="90">
              <div class="progress-wave"></div>
            </div>
          </div>
          <span class="skill-percent">90%</span>
        </div>
      </div>
      
      <!-- CSS -->
      <div class="skill-card">
        <div class="skill-meta">
          <div class="skill-icon">
            <i class="fab fa-css3-alt"></i>
          </div>
          <div class="skill-info">
            <h3 class="skill-title">CSS3</h3>
            <span class="skill-level">Intermediate</span>
          </div>
        </div>
        <div class="progress-container">
          <div class="progress-track">
            <div class="progress-fill css" data-level="70">
              <div class="progress-wave"></div>
            </div>
          </div>
          <span class="skill-percent">70%</span>
        </div>
      </div>
      
      <!-- JavaScript -->
      <div class="skill-card">
        <div class="skill-meta">
          <div class="skill-icon">
            <i class="fab fa-js-square"></i>
          </div>
          <div class="skill-info">
            <h3 class="skill-title">JavaScript</h3>
            <span class="skill-level">Intermediate</span>
          </div>
        </div>
        <div class="progress-container">
          <div class="progress-track">
            <div class="progress-fill javascript" data-level="60">
              <div class="progress-wave"></div>
            </div>
          </div>
          <span class="skill-percent">60%</span>
        </div>
      </div>
      
      <!-- PHP -->
      <div class="skill-card">
        <div class="skill-meta">
          <div class="skill-icon">
            <i class="fab fa-php"></i>
          </div>
          <div class="skill-info">
            <h3 class="skill-title">PHP</h3>
            <span class="skill-level">Intermediate</span>
          </div>
        </div>
        <div class="progress-container">
          <div class="progress-track">
            <div class="progress-fill php" data-level="55">
              <div class="progress-wave"></div>
            </div>
          </div>
          <span class="skill-percent">55%</span>
        </div>
      </div>
      
      <!-- Bootstrap -->
      <div class="skill-card">
        <div class="skill-meta">
          <div class="skill-icon">
            <i class="fab fa-bootstrap"></i>
          </div>
          <div class="skill-info">
            <h3 class="skill-title">Bootstrap</h3>
            <span class="skill-level">Advanced</span>
          </div>
        </div>
        <div class="progress-container">
          <div class="progress-track">
            <div class="progress-fill bootstrap" data-level="75">
              <div class="progress-wave"></div>
            </div>
          </div>
          <span class="skill-percent">75%</span>
        </div>
      </div>
      
      <!-- Photoshop -->
      <div class="skill-card">
        <div class="skill-meta">
          <div class="skill-icon">
            <i class="fab fa-adobe"></i>
          </div>
          <div class="skill-info">
            <h3 class="skill-title">Photoshop</h3>
            <span class="skill-level">Beginner</span>
          </div>
        </div>
        <div class="progress-container">
          <div class="progress-track">
            <div class="progress-fill photoshop" data-level="40">
              <div class="progress-wave"></div>
            </div>
          </div>
          <span class="skill-percent">40%</span>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Skills Section - Modern UI */
.skills-section {
  padding: 100px 0;
  background-color: var(--background-color);
}


.section-description {
  color: var(--default-color);
  font-size: 1.1rem;
  max-width: 700px;
  margin: 25px auto 0;
  line-height: 1.6;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.skill-card {
  background: var(--surface-color);
  border-radius: 12px;
  padding: 25px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.skill-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.skill-meta {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.skill-icon {
  width: 50px;
  height: 50px;
  background: rgba(52, 191, 73, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 15px;
  color: var(--accent-color);
  font-size: 1.5rem;
}

.skill-info {
  flex: 1;
}

.skill-title {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--heading-color);
  margin: 0 0 5px 0;
}

.skill-level {
  font-size: 0.85rem;
  color: var(--accent-color);
  font-weight: 500;
}

.progress-container {
  display: flex;
  align-items: center;
  gap: 15px;
}

.progress-track {
  flex: 1;
  height: 10px;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 5px;
  overflow: hidden;
  position: relative;
}
.progress-fill {
  height: 100%;
  border-radius: 5px;
  width: 0;
  transition: width 1.5s ease-in-out;
  position: relative;
  opacity: 0;
  animation: fadeIn 1s forwards;
  overflow: hidden;
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

.progress-wave {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.3), rgba(255,255,255,0));
  animation: wave 2s infinite linear;
}

@keyframes wave {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}



  /* Skill-specific colors */
  .progress-fill.html {
    background: var(--accent-color);
  }
  .progress-fill.css {
    background: var(--accent-color);}
  .progress-fill.javascript {
    background: var(--accent-color);}
  .progress-fill.php {
    background: var(--accent-color);}
  .progress-fill.bootstrap {
    background: var(--accent-color);}
  .progress-fill.photoshop {
    background: var(--accent-color);}

.skill-percent {
  font-weight: 700;
  color: var(--accent-color);
  font-size: 1rem;
  min-width: 40px;
  text-align: right;
}

/* Responsive Design */
@media (max-width: 992px) {
  .skills-section {
    padding: 80px 0;
  }
  
  .skills-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  }
}

@media (max-width: 768px) {
  .section-title {
    font-size: 2.2rem;
  }
  
  .skill-card {
    padding: 20px;
  }
  
  .progress-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
  }
  
  .skill-percent {
    align-self: flex-end;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const progressBars = document.querySelectorAll('.progress-fill');

  function animateProgress() {
    progressBars.forEach(bar => {
      const rect = bar.getBoundingClientRect();
      const isVisible = (rect.top <= window.innerHeight * 0.85) && 
                        (rect.bottom >= 0);

      if (isVisible && !bar.dataset.filled) {
        const level = parseInt(bar.getAttribute('data-level'));
        bar.style.width = level + '%';
        bar.dataset.filled = "true";

        // Animate percent count
        const percentElem = bar.closest('.progress-container').querySelector('.skill-percent');
        let count = 0;
        const interval = setInterval(() => {
          if (count >= level) {
            clearInterval(interval);
          } else {
            count++;
            percentElem.textContent = count + '%';
          }
        }, 15); // Speed for animation
      }
    });
  }

  // Reset width and percentages initially
  progressBars.forEach(bar => {
    bar.style.width = '0%';
    const percentElem = bar.closest('.progress-container').querySelector('.skill-percent');
    percentElem.textContent = '0%';
  });

  animateProgress();
  window.addEventListener('scroll', animateProgress);
});
</script>

<?php include 'footer.php'; ?>