<?php
require'admin-account.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <?php include 'topbar.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php include 'sidebar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span> Manage Supplies
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>All Supplies <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Supplies</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> ID </th>
                                                    <th> Supplier Name </th>
                                                    <th> Capacity Supplied </th>
                                                    <th> Total Cost </th>
                                                    <th> Tank Supplied </th>
                                                    <th>Date Supplier</th>
                                                    <th>Comments</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../db-conection.php';
                                                $bookingplans = "SELECT * FROM `supplies`";
                                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                                if ($bookingsplansrows >= 1) {
                                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                                        $id = $fetch['supply_id'];
                                                        $supplierid = $fetch['supply_supplier_id'];
                                                        $capacity = $fetch['supply_capacity'];
                                                        $tankid = $fetch['supply_fuel_tank_id'];
                                                        $cost = $fetch['supply_total_cost'];
                                                        $date = $fetch['supply_date'];
                                                        $comments = $fetch['supply_comments'];
                                                        $checktank = "SELECT * FROM `fuel_tank` WHERE `fuel_tank_id` = '$tankid'";
                                                        $querytank = mysqli_query($conn, $checktank);
                                                        $fetchtank = mysqli_num_rows($querytank);
                                                        if ($fetchtank > 0) {
                                                            while ($fetchtank = mysqli_fetch_assoc($querytank)) {
                                                                $tankname = $fetchtank['fuel_tank_ref'];
                                                            }
                                                        }

                                                        $checksupplier = "SELECT * FROM `suppliers` WHERE `supplier_id` = '$supplierid'";
                                                        $querysupplier = mysqli_query($conn, $checksupplier);
                                                        $fetchsupplier = mysqli_num_rows($querysupplier);
                                                        if ($fetchsupplier > 0) {
                                                            while ($fetchtank = mysqli_fetch_assoc($querysupplier)) {
                                                                $suppliername = $fetchtank['supplier_name'];
                                                            }
                                                        }
                                                        echo "
                                                    
                                                            <tr>
                                                                <td>$id</td>
                                                                <td>$suppliername</td>
                                                                <td>$capacity</td> 
                                                                <td>$cost</td> 
                                                                <td>$tankname</td> 
                                                                <td>$date</td> 
                                                                <td>$comments</td> 
                                                                <td>
                                                                <a href='edit-supply.php?supply=$id'> <button   class='btn btn-outline-success btn-rounded btn-icon'>
                                                                <i class='mdi mdi-bullseye'></i>
                                                              </button> </a>
                                                            
                                                              <a href='delete-supply.php?supply=$id'> <button class='btn btn-outline-danger btn-rounded btn-icon'>
                                                                <i class='mdi mdi-recycle'></i>
                                                              </button>
                                                              </a> 
                                                             
                                                                </td>
                                                                
                                                                 
                                                                
                                
                                </tr>";
                                                    }
                                                }

                                                ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            Fueling.com 2022</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Shawn <a href="£"></a>
                            SPU</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>