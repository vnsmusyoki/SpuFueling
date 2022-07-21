<?php
include '../db-conection.php';

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$othernames = mysqli_real_escape_string($conn, $_POST['othernames']);
$emailaddress = mysqli_real_escape_string($conn, $_POST['email_address']);
$idnumber = mysqli_real_escape_string($conn, $_POST['id_number']);
$phonenumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
$station_name = mysqli_real_escape_string($conn, $_POST['station_name']);
$residence = mysqli_real_escape_string($conn, $_POST['residence']);
$kinfullname = mysqli_real_escape_string($conn, $_POST['next_of_kin_full_name']);
$kinphonenumber = mysqli_real_escape_string($conn, $_POST['kin_phone_number']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
$phonelength = strlen($phonenumber);
if (
    empty($firstname) || empty($othernames) || empty($phonenumber) || empty($emailaddress) || empty($idnumber) ||
    empty($station_name) || empty($residence) || empty($kinfullname) || empty($kinphonenumber) || empty($username)
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
} else {
    $checkid = $_GET['id']; 
    $insertlogin = "UPDATE  `employee` SET `employee_first_name`='$firstname', `employee_other_names`='$othernames', `employee_id_number`='$idnumber', `employee_email_address`='$emailaddress', `employee_residence`='$residence', `residence_next_of_kin_full_names`='$kinfullname', `employee_next_of_kin_phone_number`='$kinphonenumber', `employee_phone_number`='$phonenumber', `employee_station_id`='$station_name' WHERE `employee_id`='$checkid'";
    $querylogin = mysqli_query($conn, $insertlogin);
    $lastid = mysqli_insert_id($conn);
    if ($querylogin) {

        $addstaff = "UPDATE  `login` SET `login_username`='$username' WHERE  `login_employee`='$lastid'";
        $querystaff = mysqli_query($conn, $addstaff);
        $lastmemberid = mysqli_insert_id($conn);
        
        if ($querystaff) {

            $message = "
                                        <script>
                                        toastr.success('Edit Successful..');
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