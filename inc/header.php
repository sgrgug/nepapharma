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
													<li class="active"><a href="index.php">Home</a></li>
													<li><a href="products.php">Product</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.php">Cart</a></li>
															<li><a href="checkout.php">Checkout</a></li>
														</ul>
													</li>								
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact Us</a></li>
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
	