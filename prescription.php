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
	}else{
        echo "<script type='text/javascript'> window.location='login.php';</script>";
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
	

<head>
    <style>
        .info{
            background: red;
        }
    </style>
</head>
<body class="js">

	<section class="product-area">
		<div class="container"><br /><label style="font-weight: bold;">Home - Prescription</label>
			<div class="row">
                <div class="row">
					<div style="margin: 30px; background: #eeeeee;">
                    <label style="padding-left: 40px; padding-top: 40px; font-weight: bold; font-size: 20px; color: orange;">Please upload images of your prescription.</label>
                    <form style="margin: 40px;" action="prescription.php" method="POST" enctype="multipart/form-data">
                        <input class="form-control bg-white" type="file" name="image" accept="image/*" /><br />
                        <label for="exampleFormControlInput1" style="font-weight: bold; font-size: 20px;" class="form-label">Email address</label><br />
                        <label>Input email will recieve any notice from pharmacist.</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="pemail" placeholder="name@example.com"><br />
                        <label for="exampleFormControlInput1" style="font-weight: bold; font-size: 20px;" class="form-label">Note for pharmacist</label><br />
                        <textarea name="pnote" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br />
                        <button class="btn" name="sendpres">Send Prescription</button>
                    </form>

                    <?php
                        if(isset($_POST['sendpres'])){
                            $pEmail = $_POST['pemail'];
                            $pNote = $_POST['pnote'];

                            // Get reference to uploaded image
                        $image_file = $_FILES["image"];

                        // Image not defined, let's exit
                        if (!isset($image_file)) {
                            die('No file uploaded.');
                        }

                            // Move the temp image file to the images/ directory
                            //$imgDir = "/../images/";
                            $imgName = $image_file["name"];
                            $imgDir = "/images/Prescription/";
                            $imgDirIn = "images/Prescription/";

                            move_uploaded_file(
                            // Temp image location
                            $image_file["tmp_name"],

                            // New image location, __DIR__ is the location of the current PHP file
                            __DIR__ . $imgDir . $imgName
                        );

                        $result   = mysqli_query($conn, "INSERT INTO prescription(image,email,note) VALUES('$imgDirIn/$imgName','$pEmail','$pNote')");

                        if($result){
                            include "inc/toastresult.php";
                        }else{
                            echo "error";
                        }

                        }


                    ?>

                    </div>
                    <div style="margin: 30px; background: transparent; padding: 20px;">
                        <h2 style="color: orange;">HOW IT WORKS</H2><br />
                        <div style="margin: 5px; background: #eeeeee; padding: 30px; max-width: 400px;">
                            <h6 style="color: orange;">STEP 1</h6>
                            <p>Call or Message us on FB/Viver/WhatsApp</p>
                        </div>
                        <div style="margin: 5px; background: #eeeeee; padding: 30px; max-width: 400px;">
                            <h6 style="color: orange;">STEP 2</h6>
                            <label>Give your medicine details or send a picture of your prescriptions.</label>
                        </div>
                        <div style="margin: 5px; background: #eeeeee; padding: 30px; max-width: 400px;">
                            <h6 style="color: orange;">STEP 3</h6>
                            <label>Confirm order, delivery date and time.</label>
                        </div>
                        <div style="margin: 5px; background: #eeeeee; padding: 30px; max-width: 400px;">
                            <h6 style="color: orange;">STEP 4</h6>
                            <label>Get your order delivered within 24hrs and pay in cash.</label>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </section>
</body>


<?php

    include "inc/footer.php";

?>