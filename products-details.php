<!DOCTYPE html>
<html lang="zxx">

	<?php	
		session_start();
		include "inc/head.php"; //HEAD
	?>
	<style>
		.mid{
            background: #e9e9e9;
            margin-left: 250px;
            margin-right: 250px;
            padding: 40px;
        }
	</style>
	
<body class="js">
 
    <?php
		include "inc/config.php";
		//include "inc/preloader.php"; //loading before home page load
		//include "inc/header.php";  //header code here
	?>

<!-- Header -->
<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> 98-XXXXXXXX</li>
								<li><i class="ti-email"></i> helpdesk@nepapharma.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i> Pokhara - Kaski</li>
								<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
								<li><i class="ti-user"></i>
							
								<?php
								if (isset($_SESSION["email"])) {
    								$semail = $_SESSION['email'];
									$sql = "SELECT * FROM users WHERE email = '$semail'";
									$res = mysqli_query($conn, $sql);
									$count = mysqli_num_rows($res);
												
									if($count>0){
										while($row=mysqli_fetch_assoc($res)){
											$sessonName = $row['name'];
											$role = $row['role'];
{


                                        	echo "<a href=''>$sessonName</a>";
											}
                                    	}
									}
								}else{
									  echo "<a href=''>My Account</a>";
                                }
								?>
							
								</li>
								<li>
								<?php
								if (isset($_SESSION["email"])) {
    								$semail = $_SESSION['email'];
									$sql = "SELECT * FROM users WHERE email = '$semail'";
									$res = mysqli_query($conn, $sql);
									$count = mysqli_num_rows($res);
												
									if($count>0){
										while($row=mysqli_fetch_assoc($res)){
											$name = $row['name'];
                                        	echo "<a href='logout.php'>Logout</a>";
                                    	}
									}
								}else{
									  echo "<a href='login.php'>Login</a>";
                                }
								?>
							</li>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<!--<a href="index.html"><img src="images/logo.png" alt="logo"></a>-->
							<label style="font-weight: bold; font-size: 40px; color: orange;">NEPAPHARMA</label>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here...">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form action="products.php" method="POST">
									<input name="search" placeholder="Search Productfs Here....." type="search">
									<button class="btnn" name="prosearch"><i class="ti-search" name="subsearch"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>

							<!--- My Cart -->




							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">


								<?php
								if (isset($_SESSION["email"])) {
									$sqlc = "SELECT * from my_carts WHERE email='$semail'";

									if ($resultc = mysqli_query($conn, $sqlc)) {
									
										// Return the number of rows in result set
										$rowcountc = mysqli_num_rows( $resultc );
										
										// Display result
										echo $rowcountc;
									 }
									}
								?>

								</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
							
									<div class="dropdown-cart-header">
										<a href="cart.php">View Cart</a>
									</div>
									
									
									<?php
							if(!isset($_SESSION['email'])){
								echo"Please buy something!";
							 }else{
$sql = "SELECT * FROM my_carts WHERE email='$semail'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
									
if($count>0){
	 while($row=mysqli_fetch_assoc($res)){
		$name = $row['email'];
		$mycartimg = $row['iimage'];
		$mycartname = $row['productN'];
		$mycartunitprice = $row['price'];
		$mycartqty = $row['quantity'];

		$mycartTot = $mycartunitprice*$mycartqty;
							?>
									<ul class="shopping-list">
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="<?php echo $mycartimg; ?>" alt="#"></a>
											<h4><a href="#"><?php echo $mycartname; ?></a></h4>
											<p class="quantity">1x - <span class="amount">Rs. <?php echo $mycartunitprice; ?></span></p>
										</li>
									</ul>
								<?php }}} ?>
									<div class="bottom">
										<a href="cart.php" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li><a href="index.php">Home</a></li>
													<li><a href="products.php">Product</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.php">Cart</a></li>
															<li><a href="checkout.php">Checkout</a></li>
														</ul>
													</li>							
													<li><a href="#">Blog</a></li>
													<li><a href="contact.php">Contact Us</a></li>
													<li class="active"><a href="prescription.php">Prescription</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	
    <div class="mid">
        <?php
            $productID = $_GET['id'];

            $sql = "SELECT * FROM items WHERE id=$productID";
			$res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
												
            if($count>0){
                 while($row=mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $name = $row['Name'];
                $images = $row['Image'];
                $price = $row['Price'];

                ?>

<!-- Products Details here --->
<!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"><div class="pd-wrap">
   
  <style>
.pd-wrap {
  padding: 40px 0;
  font-family: 'Poppins', sans-serif;
}
.heading-section {
  text-align: center;
  margin-bottom: 20px;
}
.sub-heading {
  font-family: 'Poppins', sans-serif;
    font-size: 12px;
    display: block;
    font-weight: 600;
    color: #2e9ca1;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.heading-section h2 {
  font-size: 32px;
    font-weight: 500;
    padding-top: 10px;
    padding-bottom: 15px;
  font-family: 'Poppins', sans-serif;
}
.user-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    position: relative;
  min-width: 80px;
  background-size: 100%;
}
.carousel-testimonial .item {
  padding: 30px 10px;
}
.quote {
  position: absolute;
    top: -23px;
    color: #2e9da1;
    font-size: 27px;
}
.name {
  margin-bottom: 0;
    line-height: 14px;
    font-size: 17px;
    font-weight: 500;
}
.position {
  color: #adadad;
  font-size: 14px;
}
.owl-nav button {
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  outline: none;
  height: 25px;
}
.owl-nav button svg {
  width: 25px;
  height: 25px;
}
.owl-nav button.owl-prev {
  left: 25px;
}
.owl-nav button.owl-next {
  right: 25px;
}
.owl-nav button span {
  font-size: 45px;
}
.product-thumb .item img {
  height: 100px;
}
.product-name {
  font-size: 22px;
  font-weight: 500;
  line-height: 22px;
  margin-bottom: 4px;
}
.product-price-discount {
  font-size: 22px;
    font-weight: 400;
    padding: 10px 0;
    clear: both;
}
.product-price-discount span.line-through {
  text-decoration: line-through;
    margin-left: 10px;
    font-size: 14px;
    vertical-align: middle;
    color: #a5a5a5;
}
.display-flex {
  display: flex;
}
.align-center {
  align-items: center;
}
.product-info {
  width: 100%;
}
.reviews-counter {
    font-size: 13px;
}
.reviews-counter span {
  vertical-align: -2px;
}
.rate {
    float: left;
    padding: 0 10px 0 0;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float: right;
    width: 15px;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 21px;
    color:#ccc;
  margin-bottom: 0;
  line-height: 21px;
}
.rate:not(:checked) > label:before {
    content: '\2605';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.product-dtl p {
  font-size: 14px;
  line-height: 24px;
  color: #7a7a7a;
}
.product-dtl .form-control {
  font-size: 15px;
}
.product-dtl label {
  line-height: 16px;
  font-size: 15px;
}
.form-control:focus {
  outline: none;
  box-shadow: none;
}
.product-count {
  margin-top: 15px; 
}
.product-count .qtyminus,
.product-count .qtyplus {
  width: 34px;
    height: 34px;
    background: #212529;
    text-align: center;
    font-size: 19px;
    line-height: 36px;
    color: #fff;
    cursor: pointer;
}
.product-count .qtyminus {
  border-radius: 3px 0 0 3px; 
}
.product-count .qtyplus {
  border-radius: 0 3px 3px 0; 
}
.product-count .qty {
  width: 60px;
  text-align: center;
}
.round-black-btn {
  border-radius: 4px;
    background: #212529;
    color: #fff;
    padding: 7px 45px;
    display: inline-block;
    margin-top: 20px;
    border: solid 2px #212529; 
    transition: all 0.5s ease-in-out 0s;
}
.round-black-btn:hover,
.round-black-btn:focus {
  background: transparent;
  color: #212529;
  text-decoration: none;
}

.product-info-tabs {
  margin-top: 25px; 
}
.product-info-tabs .nav-tabs {
  border-bottom: 2px solid #d8d8d8;
}
.product-info-tabs .nav-tabs .nav-item {
  margin-bottom: 0;
}
.product-info-tabs .nav-tabs .nav-link {
  border: none; 
  border-bottom: 2px solid transparent;
  color: #323232;
}
.product-info-tabs .nav-tabs .nav-item .nav-link:hover {
  border: none; 
}
.product-info-tabs .nav-tabs .nav-item.show .nav-link, 
.product-info-tabs .nav-tabs .nav-link.active, 
.product-info-tabs .nav-tabs .nav-link.active:hover {
  border: none; 
  border-bottom: 2px solid #d8d8d8;
  font-weight: bold;
}
.product-info-tabs .tab-content .tab-pane {
  padding: 30px 20px;
  font-size: 15px;
  line-height: 24px;
  color: #7a7a7a;
}
.review-form .form-group {
  clear: both;
}
.mb-20 {
  margin-bottom: 20px;
}

.review-form .rate {
  float: none;
  display: inline-block;
}
.review-heading {
  font-size: 24px;
    font-weight: 600;
    line-height: 24px;
    margin-bottom: 6px;
    text-transform: uppercase;
    color: #000;
}
.review-form .form-control {
  font-size: 14px;
}
.review-form input.form-control {
  height: 40px;
}
.review-form textarea.form-control {
  resize: none;
}
.review-form .round-black-btn {
  text-transform: uppercase;
  cursor: pointer;
}
    </style>
    <script>
$(document).ready(function() {
        var slider = $("#slider");
        var thumb = $("#thumb");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;
        slider.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: false, 
            dots: false,
            loop: true,
            responsiveRefreshRate: 200
        }).on('changed.owl.carousel', syncPosition);
        thumb
            .on('initialized.owl.carousel', function() {
                thumb.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                item: 4,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, 
              navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);
        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);
            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            thumb
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumb.find('.owl-item.active').length - 1;
            var start = thumb.find('.owl-item.active').first().index();
            var end = thumb.find('.owl-item.active').last().index();
            if (current > end) {
                thumb.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                thumb.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }
        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                slider.data('owl.carousel').to(number, 100, true);
            }
        }
        thumb.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            slider.data('owl.carousel').to(number, 300, true);
        });


            $(".qtyminus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1> 0)
                    { now--;}
                    $(".qty").val(now);
                }
            })            
            $(".qtyplus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    $(".qty").val(parseInt(now)+1);
                }
            });
    });
        </script>
  <div class="container">
          <div class="heading-section">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div id="slider" class="owl-carousel product-slider">
            <div class="item">
                <img src="<?php echo $images; ?>">
            </div>
          </div>
          
            </div>
            <div class="col-md-6">
              <div class="product-dtl">
                <div class="product-info">
                  <div class="product-name"><?php echo $name;?></div>
                  <div class="reviews-counter">
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" checked />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" checked />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" checked />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
                <span>3 Reviews</span>
              </div>
                  <div class="product-price-discount"><span>Rs. <?php echo $price; ?></span></div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <br /><br /><br /><br /><br />
                <div class="product-count">
                  <div class="">
                  <label for="size">Quantity</label>
                  <form action="products-details.php?id=<?php echo $productID;?>" method="post" class="display-flex">
                  <div class="qtyminus">-</div>
                  <input type="text" name="quantity" value="1" class="qty">
                  <div class="qtyplus">+</div>
                </div>
                <button class="round-black-btn" type="submit" name="submitqty" value="Login">Add To Cart</button>
              </form>


              <?php


                if(isset($_POST['submitqty'])){
                  //don't proceed
                  if($_SESSION == NULL){
                    //redirect to login or register page
                    echo"<script type='text/javascript'>window.location.href = 'login.php';</script>";
                  }else{
                    
                    
                    
                  $totalQnty = $_POST['quantity'];
                  $totPri = $price * $totalQnty;
                  $insertQTY = mysqli_query($conn,"INSERT into my_carts (email, productN, price, quantity, tot, iimage, checkstatus) values ('$semail', '$name', '$price', '$totalQnty', '$totPri', '$images', 'Not Deliverd' )");
                

                  include "inc/toastresult.php";

                  
                }
                }

              ?>

                </div>
              </div>
            </div>
          </div>
          <div class="product-info-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
              <div class="review-heading">REVIEWS</div>
              <p class="mb-20">There are no reviews yet.</p>
              <form class="review-form">
                  <div class="form-group">
                    <label>Your rating</label>
                    <div class="reviews-counter">
                  <div class="rate">
                      <input type="radio" id="star5" name="rate" value="5" />
                      <label for="star5" title="text">5 stars</label>
                      <input type="radio" id="star4" name="rate" value="4" />
                      <label for="star4" title="text">4 stars</label>
                      <input type="radio" id="star3" name="rate" value="3" />
                      <label for="star3" title="text">3 stars</label>
                      <input type="radio" id="star2" name="rate" value="2" />
                      <label for="star2" title="text">2 stars</label>
                      <input type="radio" id="star1" name="rate" value="1" />
                      <label for="star1" title="text">1 star</label>
                  </div>
                </div>
              </div>
                  <div class="form-group">
                    <label>Your message</label>
                    <textarea class="form-control" rows="10"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Name*">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Email Id*">
                      </div>
                    </div>
                  </div>
                  <button class="round-black-btn">Submit Review</button>
                </form>
            </div>
        </div>
      </div>
      
      <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Products Details Ended --->




                <?php

            }}
        ?>
    </div>

<?php
    include "inc/footer.php";
?>
    

</body>
</html>