<?php
require 'admin-account.php';
?><?php
    $tank_capacity = $tank_name = $message = '';
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
                            </span> Manage Account Username
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Update Account Details <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Updating Account Username</h4>

                                    <form class="forms-sample" action="" method="POST" autocomplete="off" ">
                                      <?php

                                        if (isset($_POST["createaccount"])) {
                                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                                            $passlength = strlen($password);
                                            if (empty($cpassword)) {
                                                $message = "
                                        <script>
                                            toastr.error('Please Provide the  username');
                                        </script>
                                    ";
                                            } else if (!preg_match("/^[a-zA-z0-9 ]*$/", $username)) {
                                                $message = "
                                            <script>
                                            toastr.error('Username format is incorrect');
                                            </script>
                                            ";
                                            } else {

                                                $checkusername = "SELECT * FROM `login` WHERE `login_username` = '$username'";
                                                $queryusername = mysqli_query($conn, $checkusername);
                                                $checkusernamerows = mysqli_num_rows($queryusername);
                                                if ($checkusernamerows >= 1) {
                                                    $message = "
                                        <script>
                                        toastr.error('Username already exists. Please confirm your new username  again .');
                                        </script>";
                                                } else {

                                                    $update = "UPDATE `login` SET `login_username` = '$newpass' WHERE `login_id` = '$globalloggedinid'";
                                                    $queryupdate = mysqli_query($conn, $update);
                                                    if ($queryupdate) {
                                                        $message = "
                                        <script>
                                            toastr.success('username has been updated successfully');
                                        </script>
                                    ";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        <?php echo $message; ?>
                                 


                                <div class=" row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Username</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="eg. johndoeadmin" name="username">
                                            </div>
                                        </div>


                                </div>

                                <button type="submit" class="btn btn-gradient-primary mr-2" name="createaccount">Update
                                    Username</button>
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