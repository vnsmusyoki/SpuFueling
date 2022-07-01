<?php
// session_start();
include '../db-conection.php';
// if (!isset($_SESSION['admin'])) {
//     header('Location: ../../login.php');
// } else {
//     $loggedinmember = $_SESSION['admin'];
// }
$dietcheck = $_GET['station'];
$checkproduct = "DELETE  FROM `stations` WHERE `station_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-stations.php');</script>";
}