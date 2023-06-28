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
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Note</th>
                                </tr>
                            </thead>
                            <?php
            
            if (isset($_SESSION["email"])) {
                $semail = $_SESSION['email'];

                $sql = "SELECT * FROM prescription";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                            
                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $pid = $row['id'];
                        $pemail = $row['email'];
                        $pimg = $row['image'];
                        $pnote = $row['note'];

            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $pid; ?></td>
                                    <td><?php echo "<a target='_blank' href='../$pimg'><img style='widht: 40px; height:40px' src='../$pimg'></a>" ?></td>
                                    <td><?php echo $pemail; ?></td>
                                    <td><?php echo $pnote; ?></td>
                                                
                                </tr>
                            </tbody>
                        <?php } } } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
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