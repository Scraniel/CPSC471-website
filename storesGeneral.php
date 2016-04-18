<!DOCTYPE html>
<html lang="en">
<head>
<title>DiSCOVER ORGANiC | Stores</title>
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
                <div class="autor"> <a href="login.html">Login</a> <a href="createAccount.html">Create account</a> </div>
                <nav class="">
                    <ul class="sf-menu">
                        <li><a href="index.php">Home</a></li>
                        <li class="current"><a href="storesGeneral.php">Stores</a></li>
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
<div class="black bl1 bl2">
    <div class="container_12">
        <?php
        include 'utility/databaseConnect.php';
        include 'utility/utilityFunctions.php';

        $stores = getTable($con, 'STORE');

        foreach ($stores as $store) {
            $storeName = $store['name'];
            echo "<div class='grid_12'>
                <h3 class='head1'>$storeName</h3>
                </div>";

//            $locations = getTable($con, 'LOCATION');
//            foreach ()
//        <div class="grid_6"> <img src="images/page3_img1.jpg" alt="" class="img_inner fleft">
//            <div class="extra_wrapper">
//                <p class="p3 col1">Uokhasellus id adipiscing nu. </p>
//                Lorem ipsum dolor sit amet, consectetur adipiscing elitylot. Integer semper dapibus pharetra. Aenean a rhoncus justo. Aenean consectetur tellus non purus accumsan id mollisar lorem commodo. Etiam quis ante mattis laoreet risus eterto condimentum dui. Sed id elementum nibh. Nunc consewity ecetur metus eu massa feugiat pellentesque. Praesentaloi accumsan eu sem non consectetur. <br>
//                <a href="#" class="btn bt1">More</a> </div>
//        </div>
        }
        ?>
        <div class="clear"></div>

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
  <!--      <div class="container_12">
            <div class="grid_12">Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a> <br/>Edits by: DiSCOVER ORGANiC Inc.</div>
        </div> -->
    </div>
</footer>
</body>
</html>