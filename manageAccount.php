<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>DiSCOVER ORGANiC | Login</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <div class="h_phone">Need Help? Call Us +1 (800) 123 4567</div>
      <h1><a href="index.php"><img src="images/logo.png" alt=""></a> </h1>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
    <div class="menu_block">
        <div class="container_12">
            <div class="grid_12">
                <!-- <div class="socials"><a href="#"></a><a href="#"></a></div>-->
                <div class="autor"> <a href="customer/logout.php">Logout</a> </div>
                <nav class="">
                    <ul class="sf-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="storesGeneral.php">Stores</a></li>
                        <li class="with_ul"><a href="productsGeneral.html">Products</a>
                            <ul>
                                <li><a href="productsGeneral.html">Sort By</a>
                                    <ul>
                                        <li><a href="productsGeneral.html">Alphabetical</a></li>
                                        <li><a href="productsGeneral.html">Category</a></li>
                                        <li><a href="productsGeneral.html">Store</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contacts.html">Contacts</a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
<div class="content">
  <div class="black bl1">
    <div class="container_12">
      <div class="grid_8">
        <h3> </h3>
        <img src="images/page2_img1.jpg" alt="" class="img_inner fleft">
        <div class="extra_wrapper">
            <h3>Manage Account</h3>
            <?php
                if(isset($_SESSION["username"]))
                {   
                    ?>
                        <form name ="login" style="display : inline" action="customer/customerWebservice.php" method="post" onsubmit = "return validateForm()">
                            <label class="login"> <span>Please enter new email or password:</span></br></br></span>
                            <input type="text" name="email" placeholder="New Email" id="username" /> </br></br>
                            <input type="password" name="password" placeholder="New Password" id="password" /> </br></br>
                            <input type="hidden" name="action" value="update">
                         <!--   <a href="#" class="btn" data-type="submit">Submit</a></label>-->
                              <button> Submit </button></label>
                        </form>
                <?php
                }
                else if (isset($_SESSION["storename"]))
                    {
                    ?> 
                        <form name ="login" style="display : inline" action="store/storeWebservice.php" method="post" onsubmit = "return validateForm()">
                            <label class="login"> <span>Please enter new email or password:</span></br></br></span>
                            <input type="text" name="email" placeholder="New Email" id="username" /> </br></br>
                            <input type="password" name="password" placeholder="New Password" id="password" /> </br></br>
                            <input type="hidden" name="action" value="update">
                         <!--   <a href="#" class="btn" data-type="submit">Submit</a></label>-->
                              <button> Submit </button></label>
                        </form>
                    <?php
                }
            ?>
        </div>
      </div>
      <div class="grid_4">
      </div>
        <div class="clear"></div>
    </div>
  </div>
</div>
<footer>
    <div class="container_12">
        <div class="grid_2">
            <div class="copy"> <a href="index.php" class="footer_logo"><img src="images/footer_logo.png"	alt=""></a> &copy; 2016 <a href="#">Privacy Policy</a> </div>
        </div>
        <div class="grid_2">
            <ul>
            </ul>
        </div>
        <div class="grid_2">
            <ul>
            </ul>
        </div>
        <div class="grid_2">
            <ul>
            </ul>
        </div>
        <div class="grid_3 prefix_1">
            <h4>Newsletter</h4>
            <form id="newsletter" action="#">
                <div class="success">Your subscribe request has been sent!</div>
                <label class="email"> <span>Enter e-mail address</span>
                    <input type="email" value="" >
                    <a href="#" class="btn" data-type="submit">Subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="f_bot">
        <div class="container_12">
            <div class="grid_12">Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a> <br/>Edits by: DiSCOVER ORGANiC Inc.</div>
        </div>
    </div>
</footer>
</body>
</html>