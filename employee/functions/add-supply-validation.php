<?php
include '../db-conection.php';

$supplier = mysqli_real_escape_string($conn, $_POST['supplier_id']);
$tank = mysqli_real_escape_string($conn, $_POST['tank_id']);
$cost = mysqli_real_escape_string($conn, $_POST['cost']);
$capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
$comments = mysqli_real_escape_string($conn, $_POST['comments']);

if (
    empty($supplier) || empty($tank) || empty($cost) || empty($comments) || empty($capacity)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[0-9 ]*$/", $cost)) {
    $message = "
<script>
toastr.error('Fullname format is incorrect');
</script>
";
} else {
    $date = date('Y-m-d');
    $inserttank = "INSERT INTO `supplies`(`supply_supplier_id`, `supply_capacity`, `supply_total_cost`, `supply_fuel_tank_id`, `supply_date`, `supply_comments`) VALUES ('$supplier','$capacity','$cost','$tank', '$date','$comments')";
    $querylogin = mysqli_query($conn, $inserttank);
    $lastid = mysqli_insert_id($conn);
    if ($querylogin) {
        $message = " <script>
                                        toastr.success('Supply add was Successful. Please login to continue.');
                                        </script>";
        echo "<script>
                                    window.location.replace('manage-supplies.php');
                                    </script>";
    }
}