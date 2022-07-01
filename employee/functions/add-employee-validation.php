<?php
include '../db-conection.php';

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$othernames = mysqli_real_escape_string($conn, $_POST['othernames']);
$emailaddress = mysqli_real_escape_string($conn, $_POST['email_address']);
$idnumber = mysqli_real_escape_string($conn, $_POST['id_number']);
$phonenumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
$netsalary = mysqli_real_escape_string($conn, $_POST['net_salary']);
$residence = mysqli_real_escape_string($conn, $_POST['residence']);
$kinfullname = mysqli_real_escape_string($conn, $_POST['next_of_kin_full_name']);
$kinphonenumber = mysqli_real_escape_string($conn, $_POST['kin_phone_number']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
$phonelength = strlen($phonenumber);
if (
    empty($firstname) || empty($othernames) || empty($phonenumber) || empty($emailaddress) || empty($idnumber) ||
    empty($netsalary) || empty($residence) || empty($kinfullname) || empty($kinphonenumber) || empty($username) || empty($password)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-z]*$/", $firstname) || !preg_match("/^[a-zA-z ]*$/", $othernames) || !preg_match("/^[a-zA-z ]*$/", $kinfullname)) {
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
    $checkphone = "SELECT *  FROM `employee` WHERE `employee_phone_number` = '$phonenumber'";
    $queryphone = mysqli_query($conn, $checkphone);
    $checkphonerows = mysqli_num_rows($queryphone);
    if ($checkphonerows >= 1) {
        $message = "
    <script>
    toastr.error('Phone Number already exists. Please confirm your number again .');
    </script>";
    } else {
        $checkemail = "SELECT * FROM `employee` WHERE `employee_email_address` = '$emailaddress' OR `employee_id_number` = '$idnumber'";
        $queryemail = mysqli_query($conn, $checkemail);
        $checkemailrows = mysqli_num_rows($queryemail);
        if ($checkemailrows >= 1) {
            $message = "
    <script>
    toastr.error('Email Address/ ID Number already exists. Please confirm your email  again .');
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
                $insertlogin = "INSERT INTO `employee`(`employee_first_name`, `employee_other_names`, `employee_id_number`, `employee_email_address`, `employee_residence`, `residence_next_of_kin_full_names`, `employee_next_of_kin_phone_number`, `employee_phone_number`, `employee_net_salary`) VALUES ('$firstname','$othernames','$idnumber','$emailaddress','$residence','$kinfullname','$kinphonenumber','$phonenumber','$netsalary')";
                $querylogin = mysqli_query($conn, $insertlogin);
                $lastid = mysqli_insert_id($conn);
                if ($querylogin) {

                    $addstaff = "INSERT INTO `login`(`login_username`, `login_rank`, `login_admin`, `login_employee`, `login_password`) VALUES ('$username','employee',null,'$lastid','$password')";
                    $querystaff = mysqli_query($conn, $addstaff);
                    $lastmemberid = mysqli_insert_id($conn);
                    if ($querystaff) {

                        $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
                        echo "<script>
                                    window.location.replace('manage-employees.php');
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