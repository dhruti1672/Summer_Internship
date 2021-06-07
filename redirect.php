<?php
session_start();
require './class/atclass.php';
$iq= mysqli_query($connection,"INSERT INTO `payment_ master`(`book_id`, `pay_status`, `pay_request_id`, `payment_id`) VALUES ('{$_SESSION['book_id']}','{$_REQUEST['payment_status']}','{$_REQUEST['payment_request_id']}','{$_REQUEST['payment_id']}')") or die("error". mysqli_error($connection));
if($iq)
{
    echo "<script> alert('Check Your Mail for payment Receipt'); window.location='hotels.php'; </script>";
    
}
?>

