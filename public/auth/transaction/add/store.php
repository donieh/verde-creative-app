<?php

include("../../../php/config.php");
include("../../models/Transaction.php");

// get form data

$transaction = new Transaction($conn);
$transaction->store([
    'business' => $_POST['business'],
    // 'invoiceNumber' => $_POST['invoiceNumber'],
    'startDate' => $_POST['startDate'],
    'endDate' => $_POST['endDate'],
    'invoiceDate' => $_POST['invoiceDate'],
    'discount' => $_POST['discount'],
    'downPayment' => $_POST['downPayment'],
]);

// redirect to transaction index
// header("Location: ../auth/dashboard/?menu=transaction");
header("Location: /auth/dashboard/?menu=transaction");
exit; 