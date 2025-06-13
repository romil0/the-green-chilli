<?php
session_start();
require '../admin/connection.php';
$conn = Connect();
if (!isset($_SESSION['login_user2'])) {
    header("location: userLogin.php");
}

// Initialize discount
$discount_code = '';
$discount_amount = 0;

// Array of valid discount codes
$discounts = [
    'demo' => 10,
    'SAVE5' => 5,
    'FREESHIP' => 15,
    'WELCOME20' => 20,
    
];

if (isset($_POST['apply_discount'])) {
    $discount_code = $_POST['discount_code'];
    
    // Check if the discount code is valid
    if (array_key_exists($discount_code, $discounts)) {
        $discount_amount = $discounts[$discount_code]; // Get discount amount
        echo '<script>alert("Discount code applied!")</script>';
    } else {
        echo '<script>alert("Invalid discount code.")</script>';
    }
}

?>

<html>

<head>
    <title>Cart</title>
    <link rel="shortcut icon" href="../images/logos/3.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/userSection.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

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

            <div class="collapse navbar-collapse" id="myNavbar">
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
                        <li class="active"><a href="./foodlist.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
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
                                <li><a href="./userSingup.php"> User Sign-up</a></li>
                                <li><a href="../admin/managerSingup.php"> Manager Sign-up</a></li>
                                <li><a href="#"> Admin Sign-up</a></li>
                            </ul>
                        </li>

                        <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./userLogin.php"> User Login</a></li>
                                <li><a href="../admin/managerlogin.php"> Manager Login</a></li>
                                <li><a href="#"> Admin Login</a></li>
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
    if (!empty($_SESSION["cart"])) {
    ?>
        <div class="container">
            <div class="jumbotron" style="text-align: center;">
                <h1>Your Shopping Cart</h1>
                <p>Looks tasty...!!!</p>
            </div>
        </div>
        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;">
            <form method="post" action="cart.php">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="40%">Food Name</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Price Details</th>
                            <th width="15%">Order Total</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>

                    <?php
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $values) {
                    ?>
                        <tr>
                            <td><?php echo $values["food_name"]; ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo $keys; ?>]" value="<?php echo $values["food_quantity"]; ?>" min="1" max="99" style="width: 60px;">
                            </td>
                            <td>&#8377; <?php echo $values["food_price"]; ?></td>
                            <td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                    <?php
                        $total += ($values["food_quantity"] * $values["food_price"]);
                        $_SESSION['total'] = $total - $discount_amount;
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">&#8377; <?php echo number_format($total - $discount_amount, 2); ?></td>
                        <td></td>
                    </tr>
                </table>
                <button type="submit" name="update" class="btn btn-primary">Update Cart</button>
                <a href="cart.php?action=empty"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>
                <a href="foodlist.php"><button type="button" class="btn btn-warning">Continue Shopping</button></a>
                <a href="payment.php"><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button></a>
            </form>
            <form method="post" action="cart.php" style="margin-top: 20px;">
                <div class="form-group">
                    <label for="discount_code">Discount Code:</label>
                    <input type="text" name="discount_code" class="form-control" value="<?php echo $discount_code; ?>" placeholder="Enter discount code">
                </div>
                <button type="submit" name="apply_discount" class="btn btn-success">Apply Discount</button>
            </form>
        </div>
        <br><br><br><br><br><br><br>
    <?php
    }

    if (empty($_SESSION["cart"])) {
    ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Your Shopping Cart</h1>
                <p>Oops! We can't smell any food here. Go back and <a href="./foodlist.php">order now.</a></p>
            </div>
        </div>
    <?php
    }

    // Handle quantity update
    if (isset($_POST["update"])) {
        foreach ($_POST['quantity'] as $key => $value) {
            $_SESSION["cart"][$key]["food_quantity"] = $value; // Update quantity
        }
        echo '<script>alert("Cart updated successfully!")</script>';
        echo '<script>window.location="cart.php"</script>';
    }

    // Handle add to cart logic
    if (isset($_POST["add"])) {
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"], "food_id");
            if (!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'food_id' => $_GET["id"],
                    'food_name' => $_POST["hidden_name"],
                    'food_price' => $_POST["hidden_price"],
                    'R_ID' => $_POST["hidden_RID"],
                    'food_quantity' => $_POST["quantity"]
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';
            } else {
                echo '<script>alert("Products already added to cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        } else {
            $item_array = array(
                'food_id' => $_GET["id"],
                'food_name' => $_POST["hidden_name"],
                'food_price' => $_POST["hidden_price"],
                'R_ID' => $_POST["hidden_RID"],
                'food_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    // Handle delete action
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["cart"] as $keys => $values) {
                if ($values["food_id"] == $_GET["id"]) {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Food has been removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }

    // Handle empty cart action
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "empty") {
            unset($_SESSION["cart"]);
            echo '<script>alert("Cart is made empty!")</script>';
            echo '<script>window.location="cart.php"</script>';
        }
    }
    ?>

    <!-- footer -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Ahemdabad, Gujarat</span>
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
                                <li><a href="#">Contact</a></li>
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
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
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
