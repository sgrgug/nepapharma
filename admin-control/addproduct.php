<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
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
           include "inc/loadingscreen.php";
            include "inc/config.php";
            include "inc/header.php";
        ?>
       

        
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            <h3>Add Products</h3>
                            <div class="d-flex mb-2">
                                <form action="addproduct.php" method="post" name="form1" enctype="multipart/form-data">
                                    <label style="font-weight: bold; margin: 5px;">Enter Product Name</label>
                                    <input class="form-control bg-white" type="text" name="productName" placeholder="Product Name">
                                    <label style="font-weight: bold; margin: 5px;">Enter Product Price</label>
                                    <input class="form-control bg-white" type="number" name="productPrice" placeholder="Product Price">
                                    <label style="font-weight: bold; margin: 5px;">Select Product Category</label>
                                    <select class="form-select" name="productCats">
                                        <option value="1">Men Grooming</option>
                                        <option value="2">Women's</option>
                                        <option value="3">Baby</option>
                                    </select><br />
                                    <input class="form-control bg-white" type="file" name="image" accept="image/*" /><br /><br />
                                    <button class="btn btn-warning" type="submit" name="addPro" value="Add Products">Add Products</button>
                                </form>
    
<?php

                // Check If form submitted, insert user data into database.
                    if (isset($_POST['addPro'])) {
                        
                         $eProName     = $_POST['productName'];
                         $eProPrice    = $_POST['productPrice'];
                         $eProCats = $_POST['productCats'];


                         // Get reference to uploaded image
                        $image_file = $_FILES["image"];

                        // Image not defined, let's exit
                        if (!isset($image_file)) {
                            die('No file uploaded.');
                        }

                            // Move the temp image file to the images/ directory
                            //$imgDir = "/../images/";
                            $imgName = $image_file["name"];

                            if($eProCats == "1"){   //men grooming cats
                                $imgDir = "/../images/Men Grooming/";
                                $imgDirIn = "images/Men Grooming/";
                            } elseif($eProCats == "2"){
                                $imgDir = "/../images/Women Care/";
                                $imgDirIn = "images/Women Care/";
                            } elseif($eProCats == "3"){
                                $imgDir = "/../images/baby care/";
                                $imgDirIn = "images/baby care/";
                            }



                            move_uploaded_file(
                            // Temp image location
                            $image_file["tmp_name"],

                            // New image location, __DIR__ is the location of the current PHP file
                            __DIR__ . $imgDir . $imgName
                        );

                         // If email already exists, throw error
                         $email_result = mysqli_query($conn, "select 'Name' from items where Name='$eProName'");

                        // Count the number of row matched 
                        $user_matched = mysqli_num_rows($email_result);


                        

                        // If number of user rows returned more than 0, it means email already exists
                        if ($user_matched > 0) {
                            echo "<br/><br/><strong>Error: </strong> User already exists with the email id '$eProName'.";
                        } else {
                            // Insert user data into database
                            $result   = mysqli_query($conn, "INSERT INTO items(Name,Image,Price,cats) VALUES('$eProName','$imgDirIn/$imgName','$eProPrice','$eProCats')");

                            // check if user data inserted successfully.
                            if ($result) {
                                echo "<br/><br/>Product Added Successfully.";
                            } else {
                                echo "Error. Please try again." . mysqli_error($mysqli);
                            }
                        }
                    }

        ?>
                            </div>
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