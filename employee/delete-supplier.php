<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['supplier'];
$checkproduct = "DELETE  FROM `suppliers` WHERE `supplier_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-suppliers.php');</script>";
}