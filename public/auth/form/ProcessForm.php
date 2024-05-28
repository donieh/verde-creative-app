<?php
include "../../php/config.php";

// Mendapatkan nilai dari formulir HTML
$businessName = $_POST['businessName'];
$contactPerson = $_POST['contactPerson'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$smmPackage = $_POST['smmPackage'];
$message = $_POST['message'];
$preferredStartDate = $_POST['preferredStartDate'];

// Menyimpan data ke dalam database
$sql = "INSERT INTO FormOrder (businessName, contactPerson, email, phoneNumber, smmPackage, message, preferredStartDate)
VALUES ('$businessName', '$contactPerson', '$email', '$phoneNumber', '$smmPackage', '$message', '$preferredStartDate')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan ke dalam database";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>