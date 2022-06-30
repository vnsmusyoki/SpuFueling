<?php
include '../db-conection.php';

$name = mysqli_real_escape_string($conn, $_POST['tank_name']);
$capacity = mysqli_real_escape_string($conn, $_POST['tank_capacity']);
$tankid = mysqli_real_escape_string($conn, $_POST['tank_id']);
if (
    empty($name) || empty($capacity)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else {

    $inserttank = "UPDATE `fuel_tank` SET `fuel_tank_name`='$name',`fuel_tank_capacity`='$capacity' WHERE `fuel_tank_id`='$tankid'";
    $querylogin = mysqli_query($conn, $inserttank);
    $lastid = mysqli_insert_id($conn);
    if ($querylogin) {
        $message = " <script>
                                        toastr.success('Fuel tank update was Successful.');
                                        </script>";
        echo "<script>
                                    window.location.replace('manage-tanks.php');
                                    </script>";
    }
}
