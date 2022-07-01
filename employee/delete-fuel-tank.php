<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['tank'];
$checkproduct = "DELETE  FROM `fuel_tank` WHERE `fuel_tank_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-tanks.php');</script>";
}