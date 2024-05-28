<?php
// Include necessary files (adjust paths as needed)
require_once("../../php/config.php");
require_once("../models/Client.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new instance of the Client class
   

    // Attempt to delete the Client
    try {
         $client = new Client($conn);
        $deleteResult = $client->deleteClient($id);
        
        if ($deleteResult) {
            $url = "index.php?menu=client";
            echo "<script>alert('Client successfully deleted'); window.location='$url'; </script>";
            exit; // Stop further execution
        } else {
            throw new Exception("Failed to delete client.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Client ID not specified.";
}
?>
