<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['station'];
$checkproduct = "DELETE  FROM `stations` WHERE `station_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-stations.php');</script>";
}