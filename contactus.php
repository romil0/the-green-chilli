<?php
session_start();
?>

<html>

<head>
  <title> The Green Chilli </title>
</head>
<link rel="shortcut icon" href="images/logos/3.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="./css/contact.css">
<link rel="stylesheet" type = "text/css" href ="./css/footer.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </button>
  <script type="text/javascript">
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./index.php">The Green Chilli</a>
      </div>

      <div class="collapse navbar-collapse " id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="./index.php">Home</a></li>
          <li><a href="./aboutus.php">About</a></li>
          <li class="active"><a href="./contactus.php">Contact Us</a></li>
        </ul>

        <?php


        if (isset($_SESSION['login_user1'])) {

        ?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="./admin/myrestaurants.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="./admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        <?php
        } else if (isset($_SESSION['login_user2'])) {
        ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="./public/foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="./public/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                (<?php
                  if (isset($_SESSION["cart"])) {
                    $count = count($_SESSION["cart"]);
                    echo "$count";
                  } else
                    echo "0";
                  ?>)
              </a></li>
            <li><a href="./public/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        <?php
        } else {

        ?>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
              <ul class="dropdown-menu">
                <li> <a href="./public/userSingup.php"> User Sign-up</a></li>
                <li> <a href="./admin/managerSingup.php"> Manager Sign-up</a></li>

              </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li> <a href="./public/userLogin.php"> User Login</a></li>
                <li> <a href="./admin/managerlogin.php"> Manager Login</a></li>

              </ul>
            </li>
          </ul>

        <?php
        }
        ?>
      </div>

    </div>
  </nav>
  <br>

  <div class="heading">
    <strong>Want to contact <span class="edit"> The Green Chilli </span>?</strong>
    <br>
    Here are a few ways to get in touch with us.
  </div>

  <div class="col-xs-12 line">
    <hr>
  </div>

  <div class="container">
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="row " data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6 ">
          <div class="info-box mb-4 abc">
            <i class="bx bx-map"></i>
            <h3 class="text-center fw-bold">Our Address</h3>
            <p class="text-center">Ahemdabad,Gujrat</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 ">
          <div class="info-box  mb-4 abc">
            <i class="bx bx-envelope"></i>
            <h3  class="text-center fw-bold">Email Us</h3>
            <p class="text-center">thegreenchilli@info.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 ">
          <div class="info-box  mb-4 abc">
            <DIV CLASS=".info-box">
            <i class="bx bx-phone-call"></i>
            <h3 class="text-center fw-bold">Call Us</h3>
            <p class="text-center">+91 9510928916</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0 mep" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d68765.14645653682!2d72.5798421041991!3d23.04555044940271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e87201613bd5b%3A0x5363e2267dc3f62b!2sGreen%20Chili%20Restaurant%20%26%20Banquet!5e0!3m2!1sen!2sin!4v1724130234855!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 55%;" allowfullscreen></iframe>
      
        </div>

        <div class="col-lg-6 mt-5">
        <form method="post" action="">
          <br style="clear: both">
          <!-- <h2 class="title"> Contact Form</h2> -->

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus="">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>

          <div class="form-group">
            <input type="Number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>

          <div class="form-group">
            <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
          </div>
          <div class="text-center">
            <input type="submit" name="submit" type="button" id="submit" name="submit" class="btn btn-primary" />
          </div>
        </form>
        </div>

      </div>

    </div>
  </section>






 
    

  </div>

  <?php
  if (isset($_POST['submit'])) {
    require './admin/connection.php';
    $conn = Connect();
    $Name = $conn->real_escape_string($_POST['name']);
    $Email_Id = $conn->real_escape_string($_POST['email']);
    $Mobile_No = $conn->real_escape_string($_POST['mobile']);
    $Subject = $conn->real_escape_string($_POST['subject']);
    $Message = $conn->real_escape_string($_POST['message']);

    $query = "INSERT into contact(Name,Email,Mobile,Subject,Message) VALUES('$Name','$Email_Id','$Mobile_No','$Subject','$Message')";
    $success = $conn->query($query);

    if (!$success) {
      die("Couldnt enter data: " . $conn->error);
    }

    $conn->close();
  }
  ?>

  <!-- Footer Section Begin -->
  <footer class="footer-section">
    <div class="container">
        <!-- Call to Action Section -->
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <!-- Find Us -->
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>Find Us</h4>
                            <span>Ahemdabad, Gujarat</span>
                        </div>
                    </div>
                </div>
                <!-- Call Us -->
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Call Us</h4>
                            <span>+91 9510928916</span>
                        </div>
                    </div>
                </div>
                <!-- Mail Us -->
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Mail Us</h4>
                            <span>thegreenchilli@info.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Content -->
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <!-- Footer Logo -->
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="./index.php">
                                <img src="./images/logos/8.png" class="img-fluid" alt="logo" style="padding-top: 70px;">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Useful Links -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./aboutus.php">About Us</a></li>
                            <li><a href="./contactus.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Subscribe -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Don't miss to subscribe to our new feeds. Kindly fill out the form below.</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="email" placeholder="Email Address" required>
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Social Media Links -->
            <div class="footer-social-icon" style="text-align: center;">
                <span>Follow Us</span>
                <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                </a>
                <a href="https://instagram.com" target="_blank" aria-label="Instagram">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="./index.php" target="_blank" aria-label="Google">
                    <i class="fa fa-google" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Copyright Area -->
    <div class="copyright-area" style="text-align: center;">
        <div class="container">
            <div class="copyright-text">
                <p>&copy; 2023, All Rights Reserved <a href="#">RCS</a></p>
            </div>
        </div>
    </div>
</footer>
    

</body>


</html>