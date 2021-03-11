<?php
session_start();
	if(!isset($_SESSION['userlogin'])){
		header("Location:login.php");
	}
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/device.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
</head>
<body>
	<div class="header">
		  <a href="#default" class="logo">Velocitai Online Shopping</a>
		  <div class="header-right">
		    <a class="active" href="checkout.php">My Cart</a>
		        <a href="#about"></a>
		    <a href="index.php?logout=true" class="header-right">Log Out</a>
		</div>
	</div>
	
	 <div class="navbar container">
	<div class="custom-silder">
                    <div class="owl-carousel owl-theme">
                        <div class="silder-item">
                            <div class="silder-img">
                                <img src="img/img1.jpg" alt="Not Found">
                            </div>
                            <div class="silder-txt">
                                <p>Amazon Prime</p>
                                <span>30 days free trial</span>
                            </div>
                        </div>
                        <div class="silder-item">
                            <div class="silder-img">
                                <img src="img/img2.jpg" alt="Not Found">
                            </div>
                            <div class="silder-txt">
                                <p>Redmi</p>
                                <span>Amazon Special</span>
                            </div>
                        </div>
                        <div class="silder-item">
                            <div class="silder-img">
                                <img src="img/img3.jpg" alt="Not Found">
                            </div>
                            <div class="silder-txt">
                               <p>Alexa</p>
                                <span>Customize your home</span>
                            </div>
                        </div>
                        <div class="silder-item">
                            <div class="silder-img">
                                <img src="img/img4.jpg" alt="Not Found">
                            </div>
                            <div class="silder-txt">
                                <p>One Plus</p>
                                <span>Never Settle</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slider Section -->
                <!-- Start Items Section -->
                 <div class="section mainn mainn-raised">
        
        
            <!-- container -->
            <div class="container">
            
                <!-- row -->
                <div class="row">
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <a href="javascript:void(0);"><div class="shop">
                            <div class="shop-img">
                                <img src="./img/shop01.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Laptop<br>Collection</h3>
                                <a href="javascript:void(0);" class="cta-btn">Shop now</a>
                            </div>
                        </div></a>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <a href="javascript:void(0);"><div class="shop">
                            <div class="shop-img">
                                <img src="./img/shop03.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Accessories<br>Collection</h3>
                                <a href="javascript:void(0);" class="cta-btn">Shop now </a>
                            </div>
                        </div></a>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <a href="javascript:void(0);"><div class="shop">
                            <div class="shop-img">
                                <img src="./img/shop02.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Cameras<br>Collection</h3>
                                <a href="javascript:void(0);" class="cta-btn">Shop now </a>
                            </div>
                            </div></a>
                    </div>
                    <!-- /shop -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
                <!-- End Items Sections -->
                

                <!-- Start Cart Items -->

                <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12 mainn mainn-raised">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1" >
                                    
                                   <!-- Insert dustbin.php  here-->
                                      <?php
                            include 'config.php';
                                        
                            
                            $product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 70 AND 75";
                        // $run_query = mysqli_query($con,$product_query);
                        


                        //////
                        $stmt_insert=$db->prepare($product_query);
                        $result=$stmt_insert->execute();
                        if($result)
                        {
                            $user = $stmt_insert->fetch(PDO::FETCH_ASSOC);
                            if($stmt_insert->rowCount() > 0){
                                while($row = $stmt_insert->fetch(PDO::FETCH_BOTH)){
                                $pro_id    = $row['product_id'];
                                $pro_cat   = $row['product_cat'];
                                $pro_brand = $row['product_brand'];
                                $pro_title = $row['product_title'];
                                $pro_price = $row['product_price'];
                                $pro_image = $row['product_image'];

                                $cat_name = $row["cat_title"];

                                echo "
                        
                                
                                        <center>        
                                        <div class='product'>
                                            <a href='product.php?p=$pro_id'><div class='product-img'>
                                                <img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
                                            </div></a>
                                            <div class='product-body'>
                                                <p class='product-category'>$cat_name</p>
                                                <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
                                                <h4 class='product-price header-cart-item-info'>$pro_price</h4>
                        
                                            </div>
                                            <div class='add-to-cart'>
                                                <button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'> add to cart</button>
                                            </div>
                                        </div>
                                       </center>
                                    
                                
                    ";
                }
                ;
                            }
                        }
                        



                        /////
                         
        ?> 
                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
                <!-- ENd Cart Items -->
        </div>





	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="js/jquery.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
    <script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
                loop: true,
            }
        }
    })
    </script>
</body>
</html>