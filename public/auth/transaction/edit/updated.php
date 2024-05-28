<?php
include "../../../php/config.php";
$id = mysqli_real_escape_string($conn, $_POST['id']);
$code = mysqli_real_escape_string($conn, $_POST['code']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$contactPerson = mysqli_real_escape_string($conn, $_POST['contactPerson']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

$sql = "UPDATE client SET code='$code',
								name='$name',
								contactPerson='$contactPerson',
								phone='$phone',
								address='$address'
								WHERE id='$id'";
$query = mysqli_query($conn, $sql);


$url = "/auth/dashboard/?menu=client";
$pesan = "Successfully Edited";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>