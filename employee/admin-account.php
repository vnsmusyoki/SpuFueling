<?php
session_start();
if (!isset($_SESSION['employee'])) {
    header('Location: ../login.php');
} else {
    include '../db-conection.php';
    $email = $_SESSION['employee'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email' ";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];
            $memberid = $fetch['login_employee'];
            global $memberid;
            $checkclient = "SELECT *  FROM `employee` WHERE `employee_id`= '$memberid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchclient = mysqli_fetch_assoc($queryemail)) {
                    $firstname = $fetchclient['employee_first_name'];
                    $lastname = $fetchclient['employee_other_names'];

                    $globalmembername = $firstname . " " . $lastname;
                }
            }

            global $globalmembername;
            global $memberid;
            global $globalloggedinid;
        }
    }
}
?>