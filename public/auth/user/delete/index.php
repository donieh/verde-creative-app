<?php
// Include necessary files (adjust paths as needed)
require_once("../../php/config.php");
require_once("../models/User.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new instance of the User class
   

    // Attempt to delete the user
    try {
         $user = new User($conn);
        $deleteResult = $user->deleteUser($id);
        
        if ($deleteResult) {
            $url = "/auth/dashboard/?menu=user";
            echo "<script>alert('User successfully deleted'); window.location='$url'; </script>";
            exit; // Stop further execution
        } else {
            throw new Exception("Failed to delete user.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: User ID not specified.";
}
?>
