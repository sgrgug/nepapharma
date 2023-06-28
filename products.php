<?php

    session_start();
    include "inc/head.php";
    include "inc/config.php";
	//include "inc/preloader.php";
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
													<li class="active"><a href="products.php">Product</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
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
	

<head>
    <style>
        .info{
            background: red;
        }
    </style>
</head>
<body class="js">

	<section class="product-area">
		<div class="container"><br /><label style="font-weight: bold;">Home - All Products</label>
			<div class="row">
                <div class="row">		
						<?php
							if(isset($_POST['prosearch'])){
								$searchPro = $_POST['search'];

								$sql = "SELECT * FROM items WHERE Name LIKE '%$searchPro%'";

           						 //Execute the Query
            					$res = mysqli_query($conn, $sql);

            					//Count Rows
            					$count = mysqli_num_rows($res);

            					//Check whether food available or not
            					if($count>0){
									//Food Available
                					while($row=mysqli_fetch_assoc($res)){
                    					//Get the details
										$prodId = $row['id'];
										$prodName = $row['Name'];
										$prodImage = $row['Image'];
										$prodPrice = $row['Price'];
										$prodCats = $row['cats'];


										?>

											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product" style="padding: 10px; border-radius: 5px;"  onmouseover="this.style.backgroundColor='#eeeeee'" onmouseout="this.style.backgroundColor=''">
													<div class="product-img">
														<a href="products-details.php?id=<?php echo $prodId; ?>">
															<img class="img-pro" src="<?php echo $prodImage;?>">
														</a>
													</div>
													<div class="product-content">
														<h3><a href="products-details.php?id=<?php echo $prodId; ?>"><?php echo $prodName; ?></a></h3>
														<div class="product-price">
															<span><?php echo "Rs." .$prodPrice; ?></span>
														</div>
													</div>
												</div>
											</div>
<?php

									}
								}else{
									echo "<b style='margin: 40px;'>'".$searchPro."'</b>";
									echo "&nbsp <p style='margin: 40px; margin-left: -30px;'>No searh result</p>";
									include "inc/footer.php";
								}
							}else{
						?>
<?php
												$sql = "SELECT * FROM items ORDER BY id DESC LIMIT 15";
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
												<div class="single-product" style="padding: 10px; border-radius: 5px;"  onmouseover="this.style.backgroundColor='#eeeeee'" onmouseout="this.style.backgroundColor=''">
													<div class="product-img">
														<a href="products-details.php?id=<?php echo $id; ?>">
															<img class="img-pro" src="<?php echo $images;?>">
														</a>
													</div>
													<div class="product-content">
														<h3><a href="products-details.php?id=<?php echo $id; ?>"><?php echo $name; ?></a></h3>
														<div class="product-price">
															<span><?php echo "Rs." .$price; ?></span>
														</div>
													</div>
												</div>
											</div>
											<?php }}?>
						<?php } ?>
						
                </div>
            </div>
        </div>
    </section>
</body>


<?php

    //include "inc/footer.php";

?>