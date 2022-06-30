<?php
include '../db-conection.php';

$name = mysqli_real_escape_string($conn, $_POST['inventory_name']);
$cost = mysqli_real_escape_string($conn, $_POST['inventory_cost']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
if (
    empty($name) || empty($cost) || empty($description)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else {
    $checkusername = "SELECT * FROM `inventory` WHERE `inventory_item` = '$name'";
    $queryusername = mysqli_query($conn, $checkusername);
    $checkusernamerows = mysqli_num_rows($queryusername);
    if ($checkusernamerows >= 1) {
        $message = "
    <script>
    toastr.error('Inventory Item Name already exists. Please confirm the name  again .');
    </script>";
    } else {
        $inserttank = "INSERT INTO `inventory`(`inventory_item`, `inventory_cost`, `inventory_description`) VALUES ('$name','$cost','$description')";
        $querylogin = mysqli_query($conn, $inserttank);
        $lastid = mysqli_insert_id($conn);
        if ($querylogin) {
            $message = " <script>
                                        toastr.success('Inventory add was Successful. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-inventories.php');
                                    </script>";
        }
    }
}