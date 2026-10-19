<html>
<head>
	<title>HMS</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="stylesheet" type="text/css" href="style1.css?v=<?php echo filemtime('style1.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style >
     .form-control {
    border-radius: 0.75rem;
}
</style>

<script>
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('cpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};

function checklen()
{
    var pass1 = document.getElementById("password");  
    if(pass1.value.length<6){  
        alert("Password must be at least 6 characters long. Try again!");  
        return false;  
  }  
}

</script>

</head>

<!------ Include the above in your HEAD tag ---------->
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
    <div class="container nav-shell">
      <a class="navbar-brand js-scroll-trigger" href="#home">
        <h4><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; GLOBAL HOSPITALS</h4>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home"><h6>HOME</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about"><h6>ABOUT</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact"><h6>CONTACT</h6></a>
          </li>
          <li class="nav-item nav-login-item">
            <a class="nav-link js-scroll-trigger" href="index1.php"><h6>LOGIN</h6></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <section id="home" class="hero-section">
      <div class="hero-inner">
        <div class="hero-content">
          <span class="eyebrow">Compassionate care. Smarter systems.</span>
          <h1>Healthcare that feels personal, organized, and ready when you are.</h1>
          <p class="lead">From first consultation to follow-up care, Global Hospitals helps patients, doctors, and staff stay connected with seamless access to appointments, records, and support.</p>
          <div class="hero-actions">
            <a href="#login" class="primary-btn">Login</a>
            <a href="#about" class="secondary-btn">Learn More</a>
          </div>
          <div class="hero-stats">
            <div class="stat-box">
              <strong>24/7</strong>
              <span>Support</span>
            </div>
            <div class="stat-box">
              <strong>15k+</strong>
              <span>Patients</span>
            </div>
            <div class="stat-box">
              <strong>98%</strong>
              <span>Satisfaction</span>
            </div>
          </div>
        </div>

        <div class="hero-card">
          <div class="hero-card-header">
            <span class="status-dot"></span>
            <span>Clinic overview</span>
          </div>
          <div class="hero-card-body">
            <div class="mini-card">
              <small>Today's appointments</small>
              <strong>128</strong>
            </div>
            <div class="mini-card accent">
              <small>Available doctors</small>
              <strong>18</strong>
            </div>
            <ul class="feature-list">
              <li><i class="fa fa-check-circle"></i> Digital patient intake</li>
              <li><i class="fa fa-check-circle"></i> Secure records access</li>
              <li><i class="fa fa-check-circle"></i> Faster, more coordinated care</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about-section">
      <div class="section-header">
        <span class="eyebrow eyebrow-dark">About us</span>
        <h2>Built around patient confidence and clinical clarity.</h2>
      </div>

      <div class="about-grid">
        <article class="about-card">
          <div class="icon-wrap"><i class="fa fa-stethoscope"></i></div>
          <h3>Expert care teams</h3>
          <p>Our multidisciplinary professionals work together to deliver faster diagnosis, thoughtful treatment, and better outcomes.</p>
        </article>

        <article class="about-card">
          <div class="icon-wrap"><i class="fa fa-heartbeat"></i></div>
          <h3>Patient-first experience</h3>
          <p>We simplify appointments, updates, and follow-up care so patients feel informed, supported, and cared for at every step.</p>
        </article>

        <article class="about-card">
          <div class="icon-wrap"><i class="fa fa-shield"></i></div>
          <h3>Trusted, secure systems</h3>
          <p>Modern workflows protect health data while improving access for doctors, admin staff, and patients across the care journey.</p>
        </article>
      </div>
    </section>

    <section id="contact" class="contact-section">
      <div class="contact-wrap">
        <div class="contact-content">
          <span class="eyebrow eyebrow-dark">Contact</span>
          <h2>We're here to help you feel at ease.</h2>
          <p>Speak with our care team for appointments, support, or general assistance.</p>
        </div>

        <div class="contact-grid">
          <div class="contact-info">
            <div class="info-box"><i class="fa fa-map-marker"></i><span>45 Wellness Avenue, New City</span></div>
            <div class="info-box"><i class="fa fa-phone"></i><span>+1 (800) 555-0148</span></div>
            <div class="info-box"><i class="fa fa-envelope"></i><span>care@globalhospitals.com</span></div>
          </div>

          <form class="contact-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="4" placeholder="How can we help?"></textarea>
            </div>
            <button type="submit" class="btnRegister contact-submit">Send Message</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="footer-wrap">
      <div class="footer-brand">
        <h4><i class="fa fa-user-plus" aria-hidden="true"></i> GLOBAL HOSPITALS</h4>
        <p>Delivering thoughtful, modern care with compassion and precision.</p>
      </div>
      <div class="footer-links">
        <h5>Quick Links</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="index1.php">Login</a></li>
        </ul>
      </div>
      <div class="footer-contact">
        <h5>Contact</h5>
        <ul>
          <li>45 Wellness Avenue, New City</li>
          <li>+1 (800) 555-0148</li>
          <li>care@globalhospitals.com</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      © 2026 Global Hospitals. All rights reserved.
    </div>
  </footer>
</body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </html>

  