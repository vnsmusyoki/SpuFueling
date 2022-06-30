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
$phonelength = strlen($phone_number);
if (
    empty($firstname) || empty($othernames) || empty($phonenumber) || empty($emailaddress) || empty($idnumber) ||
    empty($netsalary) || empty($residence) || empty($kinfullname) || empty($kinphonenumber) || empty($username) || empty($password)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-z ]*$/", $full_name)) {
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
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    $checkphone = "SELECT *  FROM `instructor` WHERE `instructor_mobile` = '$phone_number'";
    $queryphone = mysqli_query($conn, $checkphone);
    $checkphonerows = mysqli_num_rows($queryphone);
    if ($checkphonerows >= 1) {
        $message = "
    <script>
    toastr.error('Phone Number already exists. Please confirm your number again .');
    </script>";
    } else {
        $checkemail = "SELECT * FROM `instructor` WHERE `instructor_email` = '$email'";
        $queryemail = mysqli_query($conn, $checkemail);
        $checkemailrows = mysqli_num_rows($queryemail);
        if ($checkemailrows >= 1) {
            $message = "
    <script>
    toastr.error('Email Address already exists. Please confirm your email  again .');
    </script>";
        } else {

            $checkusername = "SELECT * FROM `login` WHERE `login_user_name` = '$username'";
            $queryusername = mysqli_query($conn, $checkusername);
            $checkusernamerows = mysqli_num_rows($queryusername);
            if ($checkusernamerows >= 1) {
                $message = "
    <script>
    toastr.error('Username already exists. Please confirm your email  again .');
    </script>";
            } else {
                $password = md5("password");
                $insertlogin = "INSERT INTO `login`(`login_user_name`,`login_password`, `login_rank`, `login_admin_id`,
    `login_member_id`, `login_instructor_id`) VALUES ('$username', '$password','member', null, null, null)";
                $querylogin = mysqli_query($conn, $insertlogin);
                $lastid = mysqli_insert_id($conn);
                if ($querylogin) {

                    $addstaff = "INSERT INTO `member`(`member_full_name`, `member_email`, `member_mobile`, `member_date_of_birth`,
    `member_gender`, `member_joining_date`, `member_end_date`, `member_user_id`) VALUES ('$full_name', '$email',
    '$phone_number', '$date_of_birth', '$gender', '$start_date', '$end_date', '$lastid')";
                    $querystaff = mysqli_query($conn, $addstaff);
                    $lastmemberid = mysqli_insert_id($conn);
                    if ($querystaff) {
                        $updatelogin = "UPDATE `login` SET `login_member_id` = '$lastmemberid' WHERE `login_id` = '$lastid'";
                        $queryupdatelogin = mysqli_query($conn, $updatelogin);
                        if ($queryupdatelogin) {
                            $message = "
    <script>
    toastr.success('Registration Successful. Please login to continue.');
    </script>";
                            echo "<script>
    window.location.replace('all-members.php');
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
}