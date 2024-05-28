<?php

// Include the database configuration
require_once(__DIR__ . "/../../php/config.php");

class TransactionDetail
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        // Fetch all users from the transaction table
        $query = "SELECT * FROM transactionDetail";
        $result = $this->conn->query($query);

        if (!$result) {
            throw new Exception("Error retrieving users: " . $this->conn->error);
        }

        return $result;
    }

    public function store($newTransactionDetail)
    {
        // Prepare and execute an INSERT query to add a new transaction to the transaction table
        $query = "INSERT INTO transactionDetail (itemName, packageName, quantity) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("ssd", $newTransactionDetail['itemName'], $newTransactionDetail['packageName'], $newTransactionDetail['quantity']);

        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error inserting new transaction: " . $stmt->error);
        }

        return $success;
    }


    public function getById($id)
    {
        // Retrieve a user by ID from the staff table
        $query = "SELECT * FROM transactionDetail WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $transactionDetail = $result->fetch_assoc();

        if (!$transactionDetail) {
            return null; // User not found
        }

        return $transactionDetail;
    }

    public function update($updatedTransactionDetail)
    {
        // Update an existing user in the product table
        $query = "UPDATE transaction SET itemName = ?, packageName = ?, quantity = ?  WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("ssi", $updatedTransactionDetail['itemName'], $updatedTransactionDetail['packageName'], $updatedTransactionDetail['quantity']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating transactionDetail: " . $stmt->error);
        }

        return $success;
    }
}
