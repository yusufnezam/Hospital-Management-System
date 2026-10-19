<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="style2.css">


    
  </head>
  <style type="text/css">
    body {
      background: linear-gradient(135deg, #27ae60 0%, #16a085 100%);
      background-attachment: fixed;
      background-size: cover;
      font-family: 'IBM Plex Sans', sans-serif;
    }

    #inputbtn:hover{cursor:pointer;}

    .login-portal {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 90px 20px 40px;
    }

    .portal-card {
      width: 100%;
      max-width: 1100px;
      background: white;
      border: 2px solid rgba(39, 174, 96, 0.2);
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(39, 174, 96, 0.25);
    }

    .portal-left {
      background: linear-gradient(135deg, #27ae60 0%, #1abc9c 100%);
      color: #fff;
      padding: 40px 30px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100%;
    }

    .portal-left img {
      width: 110px;
      margin-bottom: 24px;
      animation: mover 1s infinite alternate;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    }

    @-webkit-keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-12px); }
    }
    @keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-12px); }
    }

    .portal-left h3 {
      margin: 0;
      font-size: 2rem;
      font-weight: 700;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .portal-right {
      background: #ffffff;
      padding: 28px 26px 22px;
    }

    .login-tabs {
      width: 100%;
      border: 2px solid #e8f5e9;
      background: #f1f8f6;
      border-radius: 999px;
      overflow: hidden;
      margin-bottom: 18px;
    }

    .login-tabs .nav-item {
      flex: 1;
    }

    .login-tabs .nav-link {
      border: none;
      border-radius: 0;
      color: #555;
      font-weight: 700;
      padding: 0.8rem;
      text-align: center;
      transition: all 0.3s ease;
    }
    
    .login-tabs .nav-link:hover {
      color: #27ae60;
    }

    .login-tabs .nav-link.active {
      background: linear-gradient(135deg, #27ae60, #1abc9c);
      color: white;
    }

    .register-heading {
      text-align: center;
      margin: 18px 0 12px;
      color: #27ae60;
      font-weight: 700;
    }

    .login-form {
      padding: 10px 8px 0;
    }

    .form-control {
      border: 2px solid #c8e6c9;
      border-radius: 14px;
      min-height: 46px;
      padding: 0.8rem 1rem;
      background: #f1f8f6;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #27ae60;
      box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
      background: white;
    }

    .btnRegister {
      display: inline-block;
      margin-top: 16px;
      border: none;
      border-radius: 999px;
      padding: 0.9rem 1.4rem;
      background: linear-gradient(135deg, #27ae60, #16a085);
      color: #fff;
      font-weight: 700;
      width: auto;
      min-width: 130px;
      cursor: pointer;
      box-shadow: 0 15px 26px rgba(39, 174, 96, 0.3);
      transition: all 0.3s ease;
    }
    
    .btnRegister:hover {
      transform: translateY(-2px);
      box-shadow: 0 18px 32px rgba(39, 174, 96, 0.4);
    }

    .login-note {
      display: block;
      margin-top: 12px;
      color: #27ae60;
      font-size: 0.92rem;
    }
    
    .login-note a {
      color: #27ae60;
      text-decoration: none;
      font-weight: 600;
    }
    
    .login-note a:hover {
      text-decoration: underline;
    }
    
    #mainNav {
      background: linear-gradient(135deg, #27ae60 0%, #16a085 100%) !important;
      box-shadow: 0 4px 12px rgba(39, 174, 96, 0.2);
    }
    
    .navbar-brand {
      font-weight: 700;
      color: white !important;
    }
    
    .navbar-brand:hover {
      color: #d4f1d4 !important;
    }
    
    .nav-link {
      color: #fff !important;
      transition: color 0.3s ease;
    }
    
    .nav-link:hover {
      color: #d4f1d4 !important;
    }

    @media (max-width: 767px) {
      .portal-card {
        border-radius: 20px;
      }
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;"><h4><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp GLOBAL HOSPITALS</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="index.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>HOME</h6></a>
          </li>
          <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="index.php#about" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>ABOUT</h6></a>
          </li>
          <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="index.php#contact" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>CONTACT</h6></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index1.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>LOGIN</h6></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="login-portal">
      <div class="portal-card">
        <div class="row no-gutters">
          <div class="col-md-3 portal-left">
            <img src="img/logo.png" alt="" />
            <h3>Welcome</h3>
          </div>

          <div class="col-md-9 portal-right">
            <ul class="nav nav-tabs login-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="patient-tab" data-toggle="tab" href="#patient" role="tab" aria-controls="patient" aria-selected="true">Patient</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab" aria-controls="doctor" aria-selected="false">Doctor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Receptionist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="ward-tab" data-toggle="tab" href="#ward" role="tab" aria-controls="ward" aria-selected="false"><i class="fa fa-hospital-o"></i> Ward Management</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="patient" role="tabpanel" aria-labelledby="patient-tab">
                <h3 class="register-heading" id="patient-register-heading">Register as Patient</h3>
                <form method="post" action="func2.php" class="login-form" id="patient-register-form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name *" name="fname" onkeydown="return alphaOnly(event);" required />
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" name="email" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" id="password" name="password" onkeyup='check();' required />
                      </div>
                      <div class="form-group">
                        <div class="maxl">
                          <label class="radio inline">
                            <input type="radio" name="gender" value="Male" checked>
                            <span> Male </span>
                          </label>
                          <label class="radio inline">
                            <input type="radio" name="gender" value="Female">
                            <span>Female </span>
                          </label>
                        </div>
                        <a href="#" class="login-note" id="show-patient-login">Already have an account? Login here</a>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name *" name="lname" onkeydown="return alphaOnly(event);" required />
                      </div>
                      <div class="form-group">
                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone *" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password *" name="cpassword" onkeyup='check();' required />
                        <span id='message' style='display:block;margin-top:8px;'></span>
                      </div>
                      <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="Register" />
                    </div>
                  </div>
                </form>

                <hr id="patient-divider" style="margin: 28px 0 20px; border-color: rgba(27,59,95,0.12);">

                <h3 class="register-heading" id="patient-login-heading" style="display:none;">Login as Patient</h3>
                <form method="post" action="func.php" class="login-form" id="patient-login-form" style="display:none;">
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email ID *" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="password" class="form-control" name="password2" placeholder="Password *" required>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <input type="submit" id="inputbtn" name="patsub" value="Login" class="btnRegister">
                      <a href="#" class="login-note" id="show-patient-register">Create an account? Register here</a>
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade show" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                <h3 class="register-heading">Login as Doctor</h3>
                <form method="post" action="func1.php" class="login-form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="User Name *" name="username3" onkeydown="return alphaOnly(event);" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" name="password3" required />
                      </div>
                      <input type="submit" class="btnRegister" name="docsub1" value="Login" />
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                <h3 class="register-heading">Login as Receptionist</h3>
                <form method="post" action="func3.php" class="login-form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="User Name *" name="username1" onkeydown="return alphaOnly(event);" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" name="password2" required />
                      </div>
                      <input type="submit" class="btnRegister" name="adsub" value="Login" />
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade show" id="ward" role="tabpanel" aria-labelledby="ward-tab">
                <h3 class="register-heading"><i class="fa fa-hospital-o"></i> Ward & Bed Management</h3>
                <form method="post" action="func3.php" class="login-form">
                  <div class="row">
                    <div class="col-md-12">
                      <p style="color: #44628d; text-align: center; margin: 15px 0;">Login with Admin/Receptionist credentials to access Ward & Bed Management</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="User Name *" name="username1" onkeydown="return alphaOnly(event);" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" name="password2" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit" class="btnRegister" name="ward_management" value="Access Ward Management" style="width: 100%; margin-top: 10px;" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      var check = function() {
        if (document.getElementById('password').value == document.getElementById('cpassword').value) {
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
      }

      function checklen() {
        var pass1 = document.getElementById('password');
        if (pass1.value.length < 6) {
          alert('Password must be at least 6 characters long. Try again!');
          return false;
        }
      }

      document.addEventListener('DOMContentLoaded', function () {
        var patientTab = document.getElementById('patient-tab');
        var patientPane = document.getElementById('patient');
        var registerHeading = document.getElementById('patient-register-heading');
        var registerForm = document.getElementById('patient-register-form');
        var divider = document.getElementById('patient-divider');
        var loginHeading = document.getElementById('patient-login-heading');
        var loginForm = document.getElementById('patient-login-form');
        var loginLink = document.getElementById('show-patient-login');
        var registerLink = document.getElementById('show-patient-register');

        function showPatientLogin() {
          if (registerHeading) registerHeading.style.display = 'none';
          if (registerForm) registerForm.style.display = 'none';
          if (divider) divider.style.display = 'none';
          if (loginHeading) loginHeading.style.display = 'block';
          if (loginForm) loginForm.style.display = 'block';
        }

        function showPatientRegister() {
          if (loginHeading) loginHeading.style.display = 'none';
          if (loginForm) loginForm.style.display = 'none';
          if (registerHeading) registerHeading.style.display = 'block';
          if (registerForm) registerForm.style.display = 'block';
          if (divider) divider.style.display = 'block';
        }

        showPatientRegister();

        if (loginLink && patientTab && patientPane) {
          loginLink.addEventListener('click', function (e) {
            e.preventDefault();
            showPatientLogin();
            patientTab.classList.add('active');
            patientPane.classList.add('active', 'show');
          });
        }

        if (registerLink && patientTab && patientPane) {
          registerLink.addEventListener('click', function (e) {
            e.preventDefault();
            showPatientRegister();
            patientTab.classList.add('active');
            patientPane.classList.add('active', 'show');
          });
        }
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>