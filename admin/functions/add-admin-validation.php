<?php
include '../db-conection.php';

$station = mysqli_real_escape_string($conn, $_POST['station_id']);
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$emailaddress = mysqli_real_escape_string($conn, $_POST['email']);
$phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
$residence = mysqli_real_escape_string($conn, $_POST['residence']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
$phonelength = strlen($phonenumber);
if (
    empty($station) || empty($fullname) || empty($phonenumber) || empty($emailaddress) ||
    empty($residence) ||  empty($username) || empty($password)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
    $message = "
<script>
toastr.error('Provided an invalid names characters');
</script>
";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $username)) {
    $message = "
<script>
toastr.error('Username format is incorrect');
</script>
";
} else if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
    $message = "
<script>
toastr.error('Incorrect email address. Provide a valid one.');
</script>
";
} else if ($phonelength !== 10) {
    $message = "
<script>
toastr.error('Phone number must have 10 digits.');
</script>
";
} else if ($usernamelength < 8) {
    $message = "
    <script>
        toastr.error('Username field require at least 8 characters.');
    </script>";
} else {
    $checkphone = "SELECT *  FROM `admin` WHERE `admin_phone_number` = '$phonenumber'";
    $queryphone = mysqli_query($conn, $checkphone);
    $checkphonerows = mysqli_num_rows($queryphone);
    if ($checkphonerows >= 1) {
        $message = "
    <script>
    toastr.error('Phone Number already exists. Please confirm your number again .');
    </script>";
    } else {
        $checkemail = "SELECT * FROM `admin` WHERE `admin_email_address` = '$emailaddress'";
        $queryemail = mysqli_query($conn, $checkemail);
        $checkemailrows = mysqli_num_rows($queryemail);
        if ($checkemailrows >= 1) {
            $message = "
    <script>
    toastr.error('Email Address already exists. Please confirm your email  again .');
    </script>";
        } else {

            $checkusername = "SELECT * FROM `login` WHERE `login_username` = '$username'";
            $queryusername = mysqli_query($conn, $checkusername);
            $checkusernamerows = mysqli_num_rows($queryusername);
            if ($checkusernamerows >= 1) {
                $message = "
    <script>
    toastr.error('Username already exists. Please confirm your email  again .');
    </script>";
            } else {
                $password = md5($password);
                $insertlogin = "INSERT INTO `admin`(`admin_full_names`, `admin_phone_number`, `admin_email_address`, `admin_residence`, `admin_station_id`) VALUES ('$fullname','$phonenumber','$emailaddress','$residence','$station')";
                $querylogin = mysqli_query($conn, $insertlogin);
                $lastid = mysqli_insert_id($conn);
                if ($querylogin) {

                    $addstaff = "INSERT INTO `login`(`login_username`, `login_rank`, `login_admin`, `login_employee`, `login_password`) VALUES ('$username','admin','$lastid',null,'$password')";
                    $querystaff = mysqli_query($conn, $addstaff);
                    $lastmemberid = mysqli_insert_id($conn);
                    if ($querystaff) {

                        $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
                        echo "<script>
                                    window.location.replace('manage-admins.php');
                                    </script>";
                    } else {
                        $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
                    }
                }
            }
        }
    }
}