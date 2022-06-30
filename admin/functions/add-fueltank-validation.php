<?php
include '../db-conection.php';

$name = mysqli_real_escape_string($conn, $_POST['tank_name']);
$capacity = mysqli_real_escape_string($conn, $_POST['tank_capacity']);
if (
    empty($name) || empty($capacity)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else {
    $checkusername = "SELECT * FROM `fuel_tank` WHERE `fuel_tank_name` = '$name'";
    $queryusername = mysqli_query($conn, $checkusername);
    $checkusernamerows = mysqli_num_rows($queryusername);
    if ($checkusernamerows >= 1) {
        $message = "
    <script>
    toastr.error('Tank Name already exists. Please confirm your name  again .');
    </script>";
    } else {
        $inserttank = "INSERT INTO `fuel_tank`(`fuel_tank_name`, `fuel_tank_capacity`) VALUES ('$name','$capacity')";
        $querylogin = mysqli_query($conn, $inserttank);
        $lastid = mysqli_insert_id($conn);
        if ($querylogin) {
            $message = " <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-tanks.php');
                                    </script>";
        }
    }
}