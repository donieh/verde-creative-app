<?php
include("../../../php/config.php");

// Check if all required fields are present in $_POST
if (isset($_POST['id'], $_POST['code'], $_POST['name'], $_POST['contactPerson'], $_POST['phone'], $_POST['address'])) {
    // Retrieve and sanitize POST data
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $contactPerson = $_POST['contactPerson'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Update client data using prepared statement
    $sql = "UPDATE client SET 
            code = ?, 
            name = ?, 
            contactPerson = ?, 
            phone = ?, 
            address = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssi", $code, $name, $contactPerson, $phone, $address, $id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Check if any rows were affected
        $rowsAffected = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);

        if ($rowsAffected > 0) {
            // Redirect to client dashboard on successful update
            $url = "/auth/dashboard/?menu=client";
            $pesan = "Successfully Edited";
            echo "<script>alert('$pesan'); window.location='$url';</script>";
            exit; // Ensure to exit after redirection
        } else {
            // No rows were affected, handle accordingly
            $pesan = "No changes were made";
        }
    } else {
        // Handle prepare statement error
        $pesan = "Failed to prepare update";
    }
} else {
    // Handle incomplete data submission
    $pesan = "Incomplete data submitted";
}

// Display error message and redirect back
echo "<script>alert('$pesan'); window.history.back();</script>";
exit;

mysqli_close($conn);
?>
