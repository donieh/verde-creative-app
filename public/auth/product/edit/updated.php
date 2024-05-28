<?php
include("../../../php/config.php");

// Retrieve and sanitize POST data
$id = $_POST['id'];
$item = $_POST['item'];
$package = $_POST['package'];
$price = $_POST['price'];

// Update query with prepared statement
$sql = "UPDATE product SET 
        item = ?, 
        package = ?, 
        price = ? 
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssi", $item, $package, $price, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect back to client dashboard after update
    $url = "/auth/dashboard/?menu=product";
    $pesan = "Successfully Edited";
    echo "<script>alert('$pesan'); window.location='$url'; </script>";
} else {
    // Handle error if prepare statement fails
    $pesan = "Failed to update data";
    echo "<script>alert('$pesan'); window.history.back(); </script>";
}

mysqli_close($conn);
?>
