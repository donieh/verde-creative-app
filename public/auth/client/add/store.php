<?php

include("../../../php/config.php");
include("../../models/Client.php");

// get form data

$client = new Client($conn);
$client->store([
    'code' => $_POST['code'],
    'name' => $_POST['name'],
    'contactPerson' => $_POST['contactPerson'],
    'phone' => $_POST['phone'],
    'address' => $_POST['address'],
]);

// redirect to client index
// header("Location: ../auth/dashboard/?menu=client");
header("Location: /auth/dashboard/?menu=client");
exit; 