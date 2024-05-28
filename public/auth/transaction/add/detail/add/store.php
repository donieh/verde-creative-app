<?php

include("../../../../../php/config.php");
include("../../../../models/TransactionDetail.php");

// get form data

$transactionDetail = new TransactionDetail($conn);
$transactionDetail->store([
    'itemName' => $_POST['itemName'],
        'packageName' => $_POST['packageName'],
    'quantity' => $_POST['quantity'],
   
]);

// redirect to transaction index
// header("Location: ../auth/dashboard/?menu=transaction");
header("Location: /auth/dashboard/?menu=transaction&action=add");
exit; 