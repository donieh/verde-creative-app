<?php
// Include necessary files (adjust paths as needed)
require_once("../../php/config.php");
require_once("../models/Product.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
         $product = new Product($conn);
        $deleteResult = $product->deleteProduct($id);
        
        if ($deleteResult) {
            $url = "index.php?menu=product";
            echo "<script>alert('Product successfully deleted'); window.location='$url'; </script>";
            exit; // Stop further execution
        } else {
            throw new Exception("Failed to delete product.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Product ID not specified.";
}
?>
