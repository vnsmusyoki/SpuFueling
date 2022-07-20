<?php
include '../db-conection.php';

$name = mysqli_real_escape_string($conn, $_POST['fullname']);
$company = mysqli_real_escape_string($conn, $_POST['company']);
$emailaddress = mysqli_real_escape_string($conn, $_POST['email_address']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$phonelength = strlen($phone_number);
if (
    empty($name) || empty($company) || empty($emailaddress) || empty($phone_number)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
    $message = "
<script>
toastr.error('Fullname format is incorrect');
</script>
";
} else if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
    $message = "
<script>
toastr.error('Incorrect email address. Provide a valid one.');
</script>
";
} else if ($phonelength !== 10) {
    $message = "
<script>
toastr.error('Phone number must have 10 digits.');
</script>
";
} else {
   
        $inserttank = "INSERT INTO `suppliers`(`supplier_name`, `supplier_company`, `supplier_email`, `supplier_phone_number`) VALUES ('$name','$company','$emailaddress','$phone_number')";
        $querylogin = mysqli_query($conn, $inserttank);
        $lastid = mysqli_insert_id($conn);
        if ($querylogin) {
            $message = " <script>
                                        toastr.success('Supplier add was Successful. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-suppliers.php');
                                    </script>";
        }
    }