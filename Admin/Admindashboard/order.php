<?php
require_once "../config.php";
$start = 0;
$row_per_page = 10;
$sql = "SELECT * FROM `order`";
$records = $conn->query( $sql );
$nr_of_rows = $records->num_rows;
$pages = ceil($nr_of_rows/$row_per_page);
if(isset($_GET['page-nr'])){
    $page = $_GET['page-nr']-1;
    $start = $page*$row_per_page;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="../../favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Furniture || Orders</title>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../../index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>FURNITURE</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $row["email"]; ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admindashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="order.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Orders</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $row["username"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="../logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <?php
            }
                }
            ?>
            <!-- Navbar End -->

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Order Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">User_Id</th>
                                            <th scope="col">Product_id</th>
                                            <th scope="col">Address_id</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment_method</th>
                                            <th scope="col">Order_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM `order` LIMIT $start,$row_per_page");
                                            if(mysqli_num_rows($sql) > 0){
                                                while($value = $sql->fetch_assoc()){
                                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $value["order_id"]; ?></th>
                                            <td><?php echo $value["user_id"]; ?></td>
                                            <td><?php echo $value["product_id"]; ?></td>
                                            <td><?php echo $value["address_id"]; ?></td>
                                            <td><?php echo $value["status"]; ?></td>
                                            <td><?php echo $value["payment_method"]; ?></td>
                                            <td><?php echo $value["order_at"]; ?></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                            ?>
                                            <div class="page-info">
                                                <?php
                                                if(!isset($_GET['page-nr'])){
                                                    $page = 1;
                                                }else{
                                                    $page = $_GET['page-nr'];
                                                }
                                                ?>
                                                Showing <?php echo $page ?> of <?php echo $pages ?> pages
                                            </div>
                                            <div class="pagination">
                                                <a href="?page-nr=1">First</a>
                                                <?php
                                                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                                                    ?>
                                                    <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                                                    <?php
                                                    }else{
                                                        ?>
                                                        <a>Previous</a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="page-numbers">
                                                            <?php
                                                            for($counter = 1; $counter <= $pages; $counter ++){
                                                                ?>
                                                                <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                                <?php
                                                                if(!isset($_GET['page-nr'])){
                                                                    ?>
                                                                    <a href="?page-nr = 2">Next</a>
                                                                    <?php
                                                                    }
                                                                    else{
                                                                        if($_GET['page-nr'] >= $pages) {
                                                                            ?>
                                                                            <a>Next</a>
                                                                            <?php
                                                                            }else{
                                                                                ?>
                                                                                <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                                                                                <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <style>
                                                                            .pagination {
                                                                            display: flex;
                                                                            text-align: center;
                                                                            padding-bottom: 10px;
                                                                            text-align: left;
                                                                            }
                                                                            
                                                                            .pagination a {
                                                                            color: black;
                                                                            float: left;
                                                                            padding: 8px 16px;
                                                                            text-decoration: none;
                                                                            transition: background-color .3s;
                                                                            border: 1px solid #ddd;
                                                                            margin: 0 4px;
                                                                            }
                                                                            
                                                                            .pagination a.active {
                                                                            background-color: #4CAF50;
                                                                            color: white;
                                                                            border: 1px solid #4CAF50;
                                                                            }
                                                                            
                                                                            .pagination a:hover:not(.active) 
                                                                            {
                                                                                background-color: #ddd;
                                                                            }

                                                                            .page-info{
                                                                                text-align: left;
                                                                                padding-bottom: 5px;
                                                                                color: green;
                                                                            }
                                                                            </style>
                                                                            <a href="?page-nr=<?php echo $pages?>">Last</a>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">ABCD</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="#">Hriday Kumar</a>
                        </br>
                        <!-- Distributed By <a class="border-bottom" href="#" target="_blank">Google</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

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