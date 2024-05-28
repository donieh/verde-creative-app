<?php
// Include necessary files (adjust paths as needed)
include("../../../php/config.php");
include("../../models/User.php");

// Validate and sanitize form data
$name = $_POST['name'] ?? '';
$position = $_POST['position'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate that required fields are not empty
if (empty($name) || empty($username) || empty($password)) {
    echo "Name, username, and password are required fields.";
    exit;
}

// Hash the password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Create a new instance of the User class with database connection
$user = new User($conn);

try {
    // Store user data into the database using the User class method
    $success = $user->store([
        'name' => $name,
        'position' => $position,
        'username' => $username,
        'password' => $hashedPassword, // Store hashed password
    ]);

    if ($success) {
        // Redirect to the user dashboard upon successful insertion
        header("Location: ../../dashboard/?menu=user");
        exit;
    } else {
        // Handle insertion failure
        echo "Failed to store user data. Please try again.";
        exit;
    }
} catch (Exception $e) {
    // Handle any exceptions or errors
    echo "Error: " . $e->getMessage();
    exit;
}
?>
