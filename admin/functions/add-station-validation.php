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
    $checkusername = "SELECT * FROM `stations` WHERE `station_email` = '$email'";
    $queryusername = mysqli_query($conn, $checkusername);
    $checkusernamerows = mysqli_num_rows($queryusername);
    if ($checkusernamerows >= 1) {
        $message = "
    <script>
    toastr.error('Station Item Name already exists. Please confirm the name  again .');
    </script>";
    } else {
        $inserttank = "INSERT INTO `stations`(`station_email`, `station_mobile`, `station_desc`, `station_name`, `station_location`) VALUES ('$email', '$phone', '$description', '$name', '$location')";
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
}