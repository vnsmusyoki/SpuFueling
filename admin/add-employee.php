<?php
$firstname = $othernames = $message = $email_address = $id_number = $phone_number = $net_salary = $residence = $next_of_kin_full_name = $kin_phone_number = $username = $password = '';
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
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr-btn.css">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/toastr-options.js"></script>
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
                            </span> Add Employee
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Creating New Record <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Provide the details below</h4>

                                    <form class="forms-sample" action="" method="POST" autocomplete="off" ">
                                      <?php

                                        if (isset($_POST["createaccount"])) {

                                            require 'functions/add-employee-validation.php';
                                        }
                                        ?>
                                        <?php echo $message; ?>
                                        <div class=" row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">First Name</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="Name" name="firstname">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Other Names</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="Name" name="othernames">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Email address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3"
                                                    placeholder="Email" name="email_address">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">ID Number</label>
                                            <input type="number" min="1" class="form-control" id="exampleInputName1"
                                                placeholder="National ID Number" name="id_number">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Phone Number</label>
                                            <input type="number" min="1" class="form-control" id="exampleInputName1"
                                                placeholder="Current Phone Number" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Net Salary</label>
                                            <input type="number" min="1000" class="form-control" id="exampleInputEmail3"
                                                placeholder="Net salary" name="net_salary">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Residence Address</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4"
                                        name="residence"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Next of Kin Full Names</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Kin FUll names" name="next_of_kin_full_name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Next of Kin Phone Number</label>
                                            <input type="number" min="1" class="form-control" id="exampleInputName1"
                                                placeholder="current phone number for next of kin"
                                                name="kin_phone_number">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Username</label>
                                    <input type="text" class="form-control" id="exampleInputPassword4" name="username"
                                        placeholder="username">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputCity1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputCity1"
                                        placeholder="password" name="password">
                                </div>

                                <button type="submit" class="btn btn-gradient-primary mr-2"
                                    name="createaccount">Submit</button>
                                <button class="btn btn-light" type="reset">Cancel</button>
                                </form>
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