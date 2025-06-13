<!-- Done -->
<?php
session_start();
?>

<html>

  <head>
    <title> About | The Green Chilli </title>
  </head>
  <link rel="shortcut icon" href="images/logos/3.png" type="image/x-icon">
  <link rel="stylesheet" type = "text/css" href ="css/aboutus1.css">
  <link rel="stylesheet" type = "text/css" href ="./css/footer.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .aboutinfo{
      padding: 30px;
    }
  </style>

  <body>

  
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
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
          <a class="navbar-brand" href="index.php">The Green Chilli</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="./admin/myrestaurants.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="./admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="./public/foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="./public/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
            (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
            </a></li>
            <li><a href="./public/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="./public/userSingup.php"> User Sign-up</a></li>
              <li> <a href="./admin/managerlogin.php"> Manager Sign-up</a></li>
          
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="./public/userLogin.php"> User Login</a></li>
              <li> <a href="./admin/managerSingup.php"> Manager Login</a></li>

            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>

    <div class="wide">
    <div class="tagline">Life is <font color="red"><strong>Short </strong></font>, Make It <font color="green"><strong><em>Sweet</em></strong></font></div>
    <h2 style="color: green; text-align:center;">About The Green Chilli</h2>
    <p class="aboutinfo">Welcome to The Green Chilli, where we serve vibrant and flavorful dishes inspired by the rich culinary traditions of our region. Our restaurant is committed to delivering an exceptional dining experience with a focus on fresh, high-quality ingredients and innovative recipes.</p>

    <h2 style="color: green; text-align:center;">Our Story</h2>
    <p class="aboutinfo">Founded in 2010, The Green Chilli began as a small, family-run eatery with a vision to bring a unique twist to traditional dishes. Over the years, we have grown and evolved, but our commitment to quality and customer satisfaction remains unchanged. Our team is passionate about food and dedicated to providing a memorable dining experience for every guest.</p>

    <h2 style="color: green; text-align:center;">Our Mission</h2>
    <p class="aboutinfo">At The Green Chilli, our mission is to deliver exceptional culinary experiences with an emphasis on sustainability, quality, and community. We strive to make every meal a celebration of flavors and traditions while contributing positively to our community.</p>

    <h2 style="color: green; text-align:center;">Food Delivery Technology</h2>
    <p class="aboutinfo">To make your dining experience as convenient as possible, we have integrated state-of-the-art food delivery software. Our system ensures seamless online ordering. With our user-friendly interface, you can easily browse our menu, place your order, and track its progress from the comfort of your home. Our technology also helps us maintain high standards of food safety and quality, ensuring that your meals arrive fresh and delicious.</p>

    <h2 style="color: green; text-align:center;">Visit Us or Order Online</h2>
    <p class="aboutinfo">We invite you to visit us at our location in Ahmedabad, Gujarat, or explore our menu and order online through our website. Whether you're planning a special evening or simply craving a delicious meal, The Green Chilli is here to serve you with the best.</p>
</div>


    

<!-- Footer -->
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