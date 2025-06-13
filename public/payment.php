<?php
session_start();
require '../admin/connection.php';
$conn = Connect();
if (!isset($_SESSION['login_user2'])) {
    header("location: userLogin.php");
}
if(!isset($_SESSION['total'])){
    header("location: cart.php");
}       
?>

<html>

<head>
    <title> Cart </title>
</head>

<link rel="stylesheet" type="text/css" href="../css/payment.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type = "text/css" href ="../css/footer.css">
<link rel="shortcut icon" href="../images/logos/3.png" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

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
                <a class="navbar-brand" href="../index.php">The Green Chilli</a>
            </div>

            <div class="collapse navbar-collapse " id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../aboutus.php">About</a></li>
                    <li><a href="../contactus.php">Contact Us</a></li>

                </ul>

                <?php
                if (isset($_SESSION['login_user1'])) {

                ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
                        <li><a href="../admin/myrestaurants.php">MANAGER CONTROL PANEL</a></li>
                        <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                    </ul>
                <?php
                } else if (isset($_SESSION['login_user2'])) {
                ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
                        <li><a href="./foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
                        <li><a href="./cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                                (<?php
                                    if (isset($_SESSION["cart"])) {
                                        $count = count($_SESSION["cart"]);
                                        echo "$count";
                                    } else
                                        echo "0";
                                    ?>)
                            </a></li>
                        <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                    </ul>
                <?php
                } else {

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

    <?php
    $gtotal = 0;
    foreach ($_SESSION["cart"] as $keys => $values) {

        $F_ID = $values["food_id"];
        $foodname = $values["food_name"];
        $quantity = $values["food_quantity"];
        $price =  $values["food_price"];
        $total = ($values["food_quantity"] * $values["food_price"]);
        $R_ID = $values["R_ID"];
        $username = $_SESSION["login_user2"];
        $order_date = date('Y-m-d');

        $gtotal = $gtotal + $total;


        $query = "INSERT INTO `orders`(`F_ID`, `foodname`, `price`, `quantity`, `order_date`, `username`, `R_ID`) VALUES ('" . $F_ID . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "','" . $R_ID . "')";


        $success = $conn->query($query);

        if (!$success) {
    ?>
            <div class="container">
                <div class="jumbotron" style="text-align: center; background-color: transparent;">
                    <h1>Something went wrong!</h1>
                    <p>Try again later.</p>
                </div>
            </div>

    <?php
        }
    }

    ?>
    <div class="container">
        <div class="jumbotron" style="text-align: center; background-color: transparent;">
            <h1>Choose your payment option</h1>
        </div>
    </div>
    <br>
    <h1 class="text-center">Grand Total: &#8377;<?php echo $_SESSION['total']; ?>/-</h1>
    <h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
    <br>
    <h1 class="text-center">
        <a href="./cart.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
        <a href="./onlinepay.php"><button class="btn btn-success"><span class="glyphicon glyphicon-credit-card"></span> Pay Online</button></a>
        <a href="./COD.php"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On Delivery</button></a>
    </h1>



    <br><br><br><br><br><br>
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