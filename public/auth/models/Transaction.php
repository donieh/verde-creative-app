<?php

// Include the database configuration
require_once(__DIR__ . "/../../php/config.php");

class Transaction
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        // Fetch all users from the transaction table
        $query = "SELECT * FROM transaction";
        $result = $this->conn->query($query);

        if (!$result) {
            throw new Exception("Error retrieving users: " . $this->conn->error);
        }

        return $result;
    }

    public function store($newTransaction)
{
    // Prepare and execute an INSERT query to add a new transaction to the transaction table
    $query = "INSERT INTO transaction (business, startDate, endDate, invoiceDate, discount, downPayment) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        throw new Exception("Error preparing query: " . $this->conn->error);
    }

    // Bind parameters, including checking if discount is set or not
    // Bind parameters, including checking if discount is set or not
if (array_key_exists('discount', $newTransaction) && $newTransaction['discount'] !== '') {
    $discount = $newTransaction['discount'];
} else {
    // If discount is not set or empty, set it to NULL
    $discount = null;
}

if (array_key_exists('downPayment', $newTransaction) && $newTransaction['downPayment'] !== '') {
    $downPayment = $newTransaction['downPayment'];
} else {
    // If downPayment is not set or empty, set it to NULL
    $downPayment = null;
}

// Prepare and execute an INSERT query to add a new transaction to the transaction table
$query = "INSERT INTO transaction (business, startDate, endDate, invoiceDate, discount, downPayment) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $this->conn->prepare($query);

if (!$stmt) {
    throw new Exception("Error preparing query: " . $this->conn->error);
}

$stmt->bind_param("sssssd", $newTransaction['business'], $newTransaction['startDate'], $newTransaction['endDate'], $newTransaction['invoiceDate'], $discount, $downPayment);

$success = $stmt->execute();

if (!$success) {
    throw new Exception("Error inserting new transaction: " . $stmt->error);
}

return $success;
}


    public function getById($id)
    {
        // Retrieve a user by ID from the staff table
        $query = "SELECT * FROM transaction WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $transaction = $result->fetch_assoc();

        if (!$transaction) {
            return null; // User not found
        }

        return $transaction;
    }

    public function update($updatedTransaction)
    {
        // Update an existing user in the product table
        $query = "UPDATE transaction SET business = ?, startDate = ?, endDate = ?, invoiceDate = ?, discount = ?, downPayment = ?  WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sssssssi", $updatedTransaction['business'], $updatedTransaction['startDate'], $updatedTransaction['endDate'], $updatedTransaction['invoiceDate'], $updatedTransaction['discount'], $updatedTransaction['downPayment']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating transaction: " . $stmt->error);
        }

        return $success;
    }
}
