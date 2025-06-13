<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}

?>


<html>

  <head>
    <title> Explore | Food The Green Chilli </title>
  </head>
  <link rel="shortcut icon" href="../images/logos/3.png" type="image/x-icon">
  <link rel="stylesheet" type = "text/css" href ="../css/foodlist.css">
  <link rel="stylesheet" type = "text/css" href ="../css/footer.css">
  <link rel="stylesheet" type = "text/css" href ="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400&family=Sofia+Sans:ital,wght@0,300;1,300&family=Tangerine:wght@400;700&display=swap');

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
          <a class="navbar-brand" href="../index.php">The Green Chilli</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../aboutus.php">About</a></li>
            <li><a href="../contactus.php">Contact Us</a></li>

          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="../admin/myrestaurants.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li class="active" ><a href="./foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="./cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="./userSingup.php"> User Sign-up</a></li>
              <li> <a href="../admin/managerSingup.php"> Manager Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="./userLogin.php"> User Login</a></li>
              <li> <a href="../admin/managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ol>
    <div class="carousel-inner">

      <div class="item active">
      <img src="../images/Menu-1.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">
      </div>
      </div>

      <div class="item">
      <img src="../images/Menu-2.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">

      </div>
      </div>
      <div class="item">
      <img src="../images/Menu-3.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">
      </div>
      </div>

      <div class="item">
      <img src="../images/Menu-4.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">
      </div>
      </div>

      <div class="item">
      <img src="../images/Menu-5.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">
      </div>
      </div>

      <div class="item">
      <img src="../images/Menu-6.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">
      </div>
      </div>

      <div class="item">
      <img src="../images/Menu-8.png" style="height: 94%; width: 100%;">
      <div class="carousel-caption">
      </div>
      </div>
    
    </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>

<div class="jumbotron p-3 bg-secondary ">
  <div class="container text-center bg-primary p-3" style="--bs-bg-opacity: .5; border-radius: 12px; font-family:'Rubik', sans-serif;">
    <h1>Welcome To The Green Chilli</h1>      
  </div>
</div>




<div class="container bg-success" style="width:95%; padding: 3% 0; border-radius: 4px;">

<?php

require '../admin/connection.php';
$conn = Connect();

$sql = "SELECT * FROM FOOD WHERE options = 'ENABLE' ORDER BY F_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>
<div class="col-md-3">

<form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
    <div class="mypanel" align="center">
        <img src="<?php echo $row["images_path"]; ?>" class="img-responsive" style="height: 150px; width: 250px; border-radius: 6px;" >
        <h3 class="text-dark"><?php echo $row["name"]; ?></h3>
        <h5 class="text-info"><?php echo $row["description"]; ?></h5>
        <h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
        <input type="hidden" name="quantity" value="1"> <!-- Default quantity set to 1 -->
        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
        <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
    </div>
</form>
  
</div>

<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>Stay Hungry...! :P</p>
      </center>
       
    </div>
  </div>

  <?php

}

?>

   <!-- footer  -->
   <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Ahemdabad, Gujrat</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>+91 9510928916</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>thegreenchilli@info.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="./index.php"><img src="../images/logos/8.png" class="img-fluid" alt="logo" style="padding-top: 70px;"></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don't miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-social-icon" style="text-align: center;">
                    <span>Follow us</span>
                    <a <i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a <i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google" aria-hidden="true"></i></i></a>
                </div>
            </div>
        </div>
        <div class="copyright-area" style="text-align: center;">
            <div class="container">
                <div class="copyright-text">
                    <p>Copyright &copy; 2023, All Right Reserved <a>RCS</a></p>
                </div>
            </div>
        </div>
    </footer>
    

</body>
</html>