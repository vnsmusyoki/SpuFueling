<?php
require 'admin-account.php';
$firstname = $othernames = $message = $email_address = $id_number = $phone_number = $station_name = $residence = $next_of_kin_full_name = $kin_phone_number = $username = $password =
    '';
?>
<?php
$tankid = $_GET['id'];
include '../db-conection.php';
$bookings = "SELECT * FROM `employee` WHERE `employee_id` = '$tankid'";
$querybookings = mysqli_query($conn, $bookings);
$bookingsrows = mysqli_num_rows($querybookings);
if ($bookingsrows >= 1) {
    while ($fetch = mysqli_fetch_assoc($querybookings)) {
        $globalfirstname = $fetch['employee_first_name'];
        $globalthernames = $fetch['employee_other_names'];
        $globalidnumber = $fetch['employee_id_number'];
        $globalemail = $fetch['employee_email_address'];
        $globalresidence = $fetch['employee_residence'];
        $globalkinfullname = $fetch['residence_next_of_kin_full_names'];
        $globalkinphonenumber = $fetch['employee_next_of_kin_phone_number'];
        $globalphonenumber = $fetch['employee_phone_number'];
    }
    global $globalfirstname;
    global $globalthernames;
    global $globalidnumber;
    global $globalemail;
    global $globalresidence;
    global $globalkinfullname;
    global $globalkinphonenumber;
    global $globalphonenumber;
}
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
                                      <?php if (
                                          isset($_POST['createaccount'])
                                      ) {
                                          require 'functions/edit-employee-validation.php';
                                      } ?>
                                        <?php echo $message; ?>
                                        <div class=" row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">First Name</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="Name" name="firstname"
                                                    value="<?php echo $globalfirstname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Other Names</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="Name" name="othernames"
                                                    value="<?php echo $globalthernames; ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Email address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3"
                                                    placeholder="Email" name="email_address"
                                                    value="<?php echo $globalemail; ?>">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">ID Number</label>
                                            <input type="number" min="1" class="form-control" id="exampleInputName1"
                                                placeholder="National ID Number" name="id_number"
                                                value="<?php echo $globalidnumber; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Phone Number</label>
                                            <input type="number" min="1" class="form-control" id="exampleInputName1"
                                                placeholder="Current Phone Number" name="phone_number"
                                                value="<?php echo $globalphonenumber; ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Station Name</label>
                                            <select name="station_name" id="" class="form-control">
                                                <option value="">click to select</option>
                                                <?php
                                                include '../db-conection.php';
                                                $bookingplans =
                                                    'SELECT * FROM `stations`';
                                                $querybookingsplans = mysqli_query(
                                                    $conn,
                                                    $bookingplans
                                                );
                                                $bookingsplansrows = mysqli_num_rows(
                                                    $querybookingsplans
                                                );
                                                if ($bookingsplansrows >= 1) {
                                                    while (
                                                        $fetch = mysqli_fetch_assoc(
                                                            $querybookingsplans
                                                        )
                                                    ) {
                                                        $id =
                                                            $fetch[
                                                                'station_id'
                                                            ];
                                                        $name =
                                                            $fetch[
                                                                'station_name'
                                                            ];
                                                        echo "<option value='$id'>$name</option>";
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <di class="form-group">
                                    <label for="exampleTextarea1">Residence Address</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="residence"><?php echo $globalresidence; ?>
                                    </textarea>
                                </di v>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Next of Kin Full Names</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Kin FUll names" name="next_of_kin_full_name"
                                                value="<?php echo $globalkinfullname; ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Next of Kin Phone Number</label>
                                            <input type="number" min="1" class="form-control" id="exampleInputName1"
                                                placeholder="current phone number for next of kin"
                                                name="kin_phone_number" value="<?php echo $globalkinphonenumber; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Username</label>
                                    <input type="text" class="form-control" id="exampleInputPassword4" name="username"
                                        placeholder="username" value="<?php echo $globalusername; ?>">
                                </div>



                                <button type="submit" class="btn btn-gradient-danger mr-2" name="createaccount">Edit
                                    EMployee</button>
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