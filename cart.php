<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">


	
</head>
<body class="js">
	
	<?php
		session_start();
		//include "inc/preloader.php";
		
		include "inc/config.php";
		//include "inc/header.php";
	?>

<?php
	if (isset($_SESSION["email"])) {
		$semail = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$semail'";
		$res = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($res);
					
		if($count>0){
			while($row=mysqli_fetch_assoc($res)){
				$role = $row['role'];
				if($role == 'admin'){
				//header("location: admin-control/home.php");
				echo "<script type='text/javascript'> window.location='admin-control/home.php';</script>";
				}
			}
		}
	}
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
									$sqlc = "SELECT * from my_carts WHERE email='$semail'";

									if ($resultc = mysqli_query($conn, $sqlc)) {
									
										// Return the number of rows in result set
										$rowcountc = mysqli_num_rows( $resultc );
										
										// Display result
										echo $rowcountc;
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
													<li class="active"><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.php">Cart</a></li>
															<li><a href="checkout.php">Checkout</a></li>
														</ul>
													</li>									
													<li><a href="#">Blog</a></li>
													<li><a href="contact.php">Contact Us</a></li>
													<li><a href="prescription.php">Prescription</a></li>
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
	

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>


						<?php

 if(!isset($_SESSION['email'])){
	echo"<script type='text/javascript'>window.location.href = 'index.php';</script>";
 }else{

$sql = "SELECT * FROM my_carts WHERE email='$semail'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
									
if($count>0){
	 while($row=mysqli_fetch_assoc($res)){
		$id = $row['id'];
		$name = $row['email'];
		$mycartimg = $row['iimage'];
		$mycartname = $row['productN'];
		$mycartunitprice = $row['price'];
		$mycartqty = $row['quantity'];

		$mycartTot = $mycartunitprice*$mycartqty;


		echo"
		
		<tr>
								<td class='image' data-title='No'><img src='$mycartimg' alt='#'></td>
								<td class='product-des' data-title='Description'>
									<p class='product-name'><a href='#'>$mycartname</a></p>
								</td>
								<td class='price' data-title='Price'><span>Rs. $mycartunitprice</span></td>
								<td class='price' data-title='Qty'><!-- Input Order -->
									<span>$mycartqty</span>
								</td>
								<td class='total-amount' data-title='Total'><span>Rs. $mycartTot</span></td>
								<td><form action='' method='POST'>
										<button value='$id' style='background: transparent; border: transparent;' class='ti-trash remove-icon' name='subRemove'>
									</form>
								</td>
							</tr>

		";


?>
<?php
	 }
	}
	}
	?>
<?php
	if(isset($_POST['subRemove'])){
		$delete = $_POST['subRemove'];

		mysqli_query($conn,"DELETE FROM my_carts WHERE id='$delete'");
		echo"<script type='text/javascript'>window.location.href = 'cart.php';</script>";
		
	}
?>
							
					
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="" method="POST">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Free Shipping</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span><?php
									
$sql99 = "SELECT sum(tot) FROM my_carts WHERE email='$semail'";
$res99 = mysqli_query($conn, $sql99);
$count99 = mysqli_num_rows($res99);
									
if($count99>0){
	 while($row99=mysqli_fetch_assoc($res99)){
		$netTotalCart = $row99['sum(tot)'];


										
										echo $netTotalCart; }}?></span></li>
										<li>Shipping<span>Free</span></li>
										<li class="last">You Pay<span><?php echo $netTotalCart;?></span></li>
									</ul>
									<div class="button5">


									<form action="checkout.php" method="POST">
										<button type="submit" class="btn btn-primary" name="checkoutsub">sd</button>
	 								</form>

										<a href="products.php" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
	
<?php
	include "inc/footer.php";
?>

	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>
</html>