<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Nepapharma Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        

        <?php
            //include "inc/loadingscreen.php";
            include "inc/config.php";
            include "inc/header.php";
        ?>

            <!-- Sale & Revenue Start -->
            

            
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3>Delivery Status</h3>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <?php
            
            if (isset($_SESSION["email"])) {
                $semail = $_SESSION['email'];
                $sql = "SELECT * FROM `order`";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                            
                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $adDasID = $row['id'];
                        $adDasEmail  = $row['email'];
                        $adDasProduct = $row['productN'];
                        $adDasPrice = $row['price'];
                        $adDasQty = $row['quantity'];
                        $adDasTot = $row['tot'];
                        $adDasImg = $row['iimage'];
                        $adDasStatus = $row['checkstatus'];
                   
            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $adDasID; ?></td>
                                    <td><?php echo $adDasEmail; ?></td>
                                    <td><?php echo "<img style='widht: 40px; height:40px' src='../$adDasImg'" ?></td>
                                    <td><?php echo $adDasProduct; ?></td>
                                    <td>Rs. <?php echo $adDasPrice; ?></td>
                                    <td><?php echo $adDasQty; ?></td>
                                    <td>Rs. <?php echo $adDasTot; ?></td>

                                    <!-- checkstatus 0 vaneko not delivery -->

                                    <?php
                                        /*if($adDasStatus == 0){
                                            echo "
                                            <td><a id='demo' onclick='myFunction()' class='btn btn-sm btn-secondary' href=''>Not Delivery</a></td>";
                                            echo "<script>
                                            function myFunction() {";
                                                //$sql = "UPDATE `order` SET checkstatus='0' WHERE id=$adDasID";
                                                $sqlup = "UPDATE `order` SET `checkstatus` = '0' WHERE `order`.`id` = $adDasID";

                                                if (mysqli_query($conn, $sqlup)) {
                                                  echo "Record updated successfully";
                                                } else {
                                                  echo "Error updating record: " . mysqli_error($conn);
                                                }
                                            echo "}
                                            </script>";
                                        } else {
                                            echo "
                                            <td><a id='demo2' onclick='myFunction2()' class='btn btn-sm btn-success' href=''>Success</a></td>";
                                            echo "<script>
                                            function myFunction2() {";
                                                $sql2 = "UPDATE `order` SET `checkstatus` = '1' WHERE `order`.`id` = $adDasID";

                                                if (mysqli_query($conn, $sql2)) {
                                                  echo "Record updated successfully";
                                                } else {
                                                  echo "Error updating record: " . mysqli_error($conn);
                                                }
                                            echo "}
                                            </script>";
                                        }*/

                                        /*if($adDasStatus == 0){ //not delivery
                                            echo"
                                                <td>
                                                    <form action='' method='POST'>
                                                        <button class='btn btn-primary' name='notd'>Not Delivered</button>
                                                    </form>
                                                </td>
                                            ";
                                            if(isset($_POST['notd'])){
                                                mysqli_query($conn,"UPDATE `order` SET `checkstatus` = '1' WHERE `order`.`id` = $adDasID");
                                            }
                                        } else{
                                            echo"
                                                <td>
                                                    <form action='' method='POST'>
                                                        <button class='btn btn-primary' name='d'>Delivered</button>
                                                    </form>
                                                </td>
                                            ";
                                            if(isset($_POST['d'])){
                                                mysqli_query($conn,"UPDATE `order` SET `checkstatus` = '0' WHERE `order`.`id` = $adDasID");
                                            }
                                        }*/
                                        echo "
                                            <td><form action='' method='POST'>
                                                <button value='$adDasID' class='btn btn-primary' name='csta'>$adDasStatus</button>
                                            </form></td>
                                        ";
                                    ?>
                                                
                                </tr>
                            </tbody>
                        <?php } } } ?>
                        <?php 
                            if(isset($_POST['csta'])){
                                $chkngID = $_POST['csta'];
                                

                                mysqli_query($conn,"UPDATE `order` SET `checkstatus` = 'Delivered' WHERE `order`.`id` = '$chkngID'");
                                echo "<script>window.location.replace('home.php')</script>";
                            }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>