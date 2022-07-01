<?php
include '../db-conection.php';

$name = mysqli_real_escape_string($conn, $_POST['station_name']);
$email = mysqli_real_escape_string($conn, $_POST['station_email']);
$location = mysqli_real_escape_string($conn, $_POST['station_location']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$phone = mysqli_real_escape_string($conn, $_POST['station_phone_number']);
$phonelength = strlen($phone);
if (
    empty($name) || empty($email) || empty($location) || empty($description) || empty($phone)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $name)) {
    $message = "
<script>
toastr.error('Name format is incorrect');
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
} else {
   $stationid = $_GET['station'];
       $inserttank = "UPDATE `stations` SET `station_email`='$email', `station_mobile`='$phone', `station_desc`='$description', `station_name`='$name' ,`station_location`='$location' WHERE `station_id`='$stationid'";
        $querylogin = mysqli_query($conn, $inserttank);
        $lastid = mysqli_insert_id($conn);
        if ($querylogin) {
            $message = " <script>
                                        toastr.success('Inventory add was Successful. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-stations.php');
                                    </script>";
        }
    }