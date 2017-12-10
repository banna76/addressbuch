<?php
$con = mysqli_connect('localhost','root','','phonebook');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
?>
