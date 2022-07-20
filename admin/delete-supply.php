<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['supply'];
$checkproduct = "DELETE  FROM `supplies` WHERE `supply_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-supplies.php');</script>";
}