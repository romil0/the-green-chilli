<!-- Admin  -->
<?php
include('./session_manager.php');

if (!isset($login_session)) {
    header('Location: ./managerlogin.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>

  <head>
    <title> Manager Login | The Green Chilli </title>
  </head>

  <link rel="stylesheet" type="text/css" href="../css/myrestaurants.css">
  <link rel="stylesheet" type = "text/css" href ="../css/footer.css">
  <link rel="shortcut icon" href="../images/logos/3.png" type="image/x-icon">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="./managerlogin.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron" style="text-align: center; border-radius: 20px; margin: 10px;  font-family: 'Rubik', sans-serif;">
     <h1>Hello Manager! </h1>
     <p>Manage all your restaurant from here</p>

    </div>
    </div>

<div class="container">
    <div class="container">
    	<div class="col">
    		
    	</div>
    </div>

    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
      <a href="./myrestaurants.php" class="list-group-item ">My Restaurant</a>
    		<a href="./viewfoodItems.php" class="list-group-item ">View Food Items</a>
    		<a href="./addfood_Items.php" class="list-group-item ">Add Food Items</a>
    		<a href="./editfood_Items.php" class="list-group-item ">Edit Food Items</a>
    		<a href="./deletefood_Items.php" class="list-group-item active">Delete Food Items</a>
        <a href="./vieworder_Details.php" class="list-group-item ">View Order Details</a>
    	</div>
    </div>
    


    
    <div class="col-xs-9">
      <class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="./delete_Food.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> DELETE YOUR FOOD ITEMS FROM HERE </h3>


<?php



// Storing Session
$user_check=$_SESSION['login_user1'];
$sql = "SELECT * FROM food f WHERE f.options = 'ENABLE' AND f.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY F_ID";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th> # </th>
        <th> Food ID </th>
        <th> Food Name </th>
        <th> Price </th>
        <th> Description </th>
        <th> Restaurant ID </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <input name="checkbox[]" type="checkbox" value="<?php echo $row['F_ID']; ?>"/> </td>
      <td><?php echo $row["F_ID"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["price"]; ?></td>
      <td><?php echo $row["description"]; ?></td>
      <td><?php echo $row["R_ID"]; ?></td>
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>
          <div class="form-group">
          <button type="submit" id="submit" name="delete" value="Delete" class="btn btn-danger pull-right"> DELETE</button>    
      </div>

  <?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>

  <?php } ?>

        </form>
      </div>
    </div>
  </div>

  <!-- footer  -->
   <footer class="footer-section" style="margin-top: 10%;">
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