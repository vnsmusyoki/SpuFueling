<?php
require'admin-account.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin List</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
                            </span> Generate Stations Report
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>All Stations <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Stations</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th> Full Name </th>
                                                    <th> Email Address </th>
                                                    <th> Phone Number </th>
                                                    <th> Station </th>
                                                    <th> Residence</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../db-conection.php';
                                                $checkadmins = "SELECT * FROM `admin`";
                                                $query = mysqli_query($conn, $checkadmins);
                                              $bookingsplansrows = mysqli_num_rows($query);
                                                
                                                if ($bookingsplansrows >= 1) {
                                                    while ($fetch  = mysqli_fetch_assoc($query)) {
                                                        $inid = $fetch['admin_id'];
                                                        $fullname = $fetch['admin_full_names'];
                                                        $phonenumber = $fetch['admin_phone_number'];
                                                        $emailaddress = $fetch['admin_email_address'];
                                                        $residence = $fetch['admin_residence'];
                                                        $stationid = $fetch['admin_station_id'];

                                                   $checkstations = "SELECT * FROM `stations` WHERE `station_id` = '$stationid'";
                                                        $querys = mysqli_query($conn, $checkstations);
                                                        $checkstationsrows = mysqli_num_rows($querys);
                                                        if ($checkstationsrows >= 1) {
                                                            while ($fetch  = mysqli_fetch_assoc($querys)) {
                                                                $stationname = $fetch['station_name'];
                                                            }}
                                                        echo "
                                                    
                                                            <tr>
                                                                <td>$fullname</td>
                                                                <td>$emailaddress</td>
                                                                <td>$phonenumber</td>
                                                                <td>$stationname</td> 
                                                                <td>$residence</td>
                                                              
                                                                
                                                                 
                                                                
                                
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</body>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });
});
</script>

</html>