<?php

include("../../../php/config.php");
include("../../models/Product.php");

// get form data

$product = new Product($conn);
$product->store([
    'item' => $_POST['item'],
    'package' => $_POST['package'],
    'price' => $_POST['price'],
]);

// redirect to client index
// header("Location: ../auth/dashboard/?menu=product");
header("Location: /auth/dashboard/?menu=product");
exit; 