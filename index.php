<!DOCTYPE html>
<html lang="zxx">

	<?php	
		session_start();
		include "inc/head.php"; //HEAD
	?>
	<style>
		.img-pro{
			height: 300px;
			width: 180px;
			object-fit: cover;
		}
	</style>
	
<body class="js">
	
	
	
	<?php
		include "inc/config.php";
		//include "inc/preloader.php"; //loading before home page load
		//include "inc/header.php";  //header code here
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
													<li class="active"><a href="index.php">Home</a></li>
													<li><a href="products.php">Product</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.php">Cart</a></li>
															<li><a href="checkout.php">Checkout</a></li>
														</ul>
													</li>								
													<li><a href="blog-single-sidebar.html">Blog</a></li>
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
	
	<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
			<div class="container">
				<img src="images/front large image.jpeg">
			</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	

	
	<!-- Start Small Banner  
	<section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Summer travel <br> collection</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Bag Collectons</p>
							<h3>Awesome Bag <br> 2020</h3>
							<a href="#">Shop Now</a>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-12">
					<div class="single-banner tab-height">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Flash Sale</p>
							<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	-->

	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Shop By Category</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mancare" role="tab">Men's Grooming</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#womencare" role="tab">Woman's Care</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#babycare" role="tab">Baby Care</a></li>
									
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="mancare" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										
											<?php
												$sql = "SELECT * FROM items WHERE cats='1' ORDER BY id DESC LIMIT 8";
												$res = mysqli_query($conn, $sql);
												$count = mysqli_num_rows($res);
												
												if($count>0){
													while($row=mysqli_fetch_assoc($res)){
														$id = $row['id'];
														$name = $row['Name'];
														$images = $row['Image'];
														$price = $row['Price'];
													
											?>
										
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
										<div>
												<div class="single-product">
													<div class="product-img">
														<a href="products-details.php?id=<?php echo $id; ?>">
															<img class="img-pro" src="<?php echo $images;?>">
														</a>
													</div>
													<div >
													<div class="product-content">
														<h3><a href="products-details.php?id=<?php echo $id; ?>"><?php echo $name; ?></a></h3>
														<div class="product-price" style="color: orange;">
															<span><?php echo "Rs." .$price; ?></span>
														</div>
													</div>
													</div>
												</div>
											</div></div>
											<?php }}?>
											
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								
								<!-- =============================================================== --->
								
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="womencare" role="tabpanel">
									<div class="tab-single">
										<div class="row">

										<?php
												$sql = "SELECT * FROM items WHERE cats = '2' ORDER BY id DESC LIMIT 8";
												$res = mysqli_query($conn, $sql);
												$count = mysqli_num_rows($res);
												
												if($count>0){
													while($row=mysqli_fetch_assoc($res)){
														$id = $row['id'];
														$name = $row['Name'];
														$images = $row['Image'];
														$price = $row['Price'];
													
											?>

											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
													<a href="products-details.php?id=<?php echo $id; ?>">
															<img class="img-pro" src="<?php echo $images;?>">
														</a>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $name; ?></a></h3>
														<div class="product-price">
															<span><?php echo "Rs." .$price;?></span>
														</div>
													</div>
												</div>
											</div>
											<?php }} ?>
											
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="babycare" role="tabpanel">
									<div class="tab-single">
										<div class="row">

										
										<?php
												$sql = "SELECT * FROM items WHERE cats = '3' ORDER BY id DESC LIMIT 8";
												$res = mysqli_query($conn, $sql);
												$count = mysqli_num_rows($res);
												
												if($count>0){
													while($row=mysqli_fetch_assoc($res)){
														$id = $row['id'];
														$name = $row['Name'];
														$images = $row['Image'];
														$price = $row['Price'];
													
											?>


											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
													<a href="products-details.php?id=<?php echo $id; ?>">
															<img class="img-pro" src="<?php echo $images; ?>">
														</a>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $name; ?></a></h3>
														<div class="product-price">
															<span><?php echo "Rs." .$price; ?></span>
														</div>
													</div>
												</div>
											</div>
											<?php }} ?>
											
								<!--/ End Single Tab -->
							
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->

						<?php
							$sql = "SELECT * FROM items WHERE Likes >= 8 ORDER BY id DESC LIMIT 6";
							$res = mysqli_query($conn, $sql);
							$count = mysqli_num_rows($res);
												
								if($count>0){
									while($row=mysqli_fetch_assoc($res)){
										$id = $row['id'];
										$name = $row['Name'];
										$images = $row['Image'];
										$price = $row['Price'];
													
						?>


						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="img-pro" src="<?php echo $images; ?>">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html"><?php echo $name; ?></a></h3>
								<div class="product-price">
									<span><?php echo "Rs." .$price ?></span>
								</div>
							</div>
						</div>
						<?php }}?>
						<!-- End Single Product -->
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	<!--
	<section class="section free-version-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 offset-md-2 col-xs-12">
                    <div class="section-title mb-60">
                        <span class="text-white wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Eshop Free Lite version</span>
                        <h2 class="text-white wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Currently You are using free<br> lite Version of Eshop.</h2>
                        <p class="text-white wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Please, purchase full version of the template to get all pages,<br> features and commercial license.</p>

                        <div class="button">
                            <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" rel="nofollow" class="btn wow fadeInUp" data-wow-delay=".8s">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
									-->
	
	<!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">

			<?php
				$sql = "SELECT * FROM blog LIMIT 3";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);
												
					if($count>0){
						while($row=mysqli_fetch_assoc($res)){
						$id = $row['id'];
						$name = $row['Name'];
						$date = Date("F j Y", strtotime($row['Date']));
						$text = $row['Text'];

											
			?>

				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="https://via.placeholder.com/370x300" alt="#">
						<div class="content">
							<p class="date"><?php echo $date; ?></p>
							<a href="#" class="title"><?php echo $name; ?></a>
							<a href="#" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>

				<?php }} ?>
				
			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->
	<?php
		include "inc/subscribe.php";
	?>
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
							<div class="col-lg-6 offset-lg-3 col-12">
								<h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:5px;">Eshop Free Lite</h4>
								<h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
								<p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
								<div class="button" style="margin-top:30px;">
									<a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
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
</body>
</html>