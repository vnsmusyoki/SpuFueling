<?php
include '../db-conection.php';

$name = mysqli_real_escape_string($conn, $_POST['inventory_name']);
$cost = mysqli_real_escape_string($conn, $_POST['inventory_cost']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$inventoryid = mysqli_real_escape_string($conn, $_POST['inventory_id']);
if (
    empty($name) || empty($cost) || empty($description)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else {

    $inserttank = "UPDATE `inventory` SET `inventory_item`='$name',`inventory_cost`='$cost',`inventory_description`='$description' WHERE `inventory_id`='$inventoryid'";
    $querylogin = mysqli_query($conn, $inserttank);
    $lastid = mysqli_insert_id($conn);
    if ($querylogin) {
        $message = " <script>
                                        toastr.success('Inventory edit was Successful.');
                                        </script>";
        echo "<script>
                                    window.location.replace('manage-inventories.php');
                                    </script>";
    }
}