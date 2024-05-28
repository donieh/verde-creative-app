<?php

// Include the database configuration
if (!class_exists('Product')) {
    include("../../php/config.php");

class Product
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        // Fetch all users from the staff table
        $query = "SELECT * FROM product";
        $result = $this->conn->query($query);

        if (!$result) {
            throw new Exception("Error retrieving users: " . $this->conn->error);
        }

        return $result;
    }

    public function store($newProduct)
    {
        // Prepare and execute an INSERT query to add a new user to the staff table
        $query = "INSERT INTO product (item, package, price) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $newProduct['item'], $newProduct['package'], $newProduct['price']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error inserting new product: " . $stmt->error);
        }

        return $success;
    }

    public function getById($id)
    {
        // Retrieve a user by ID from the staff table
        $query = "SELECT * FROM product WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if (!$product) {
            return null; // User not found
        }

        return $product;
    }

    public function update($updatedProduct)
    {
        // Update an existing user in the product table
        $query = "UPDATE product SET item = ?, package = ?, price = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("ssssi", $updatedProduct['item'], $updatedProduct['package'], $updatedProduct['price'], $updatedProduct['id']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating product: " . $stmt->error);
        }

        return $success;
    }

    public function deleteProduct($id)
{
    $query = "DELETE FROM product WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        throw new Exception("Error preparing query: " . $this->conn->error);
    }

    $stmt->bind_param("i", $id);
    $success = $stmt->execute();

    if (!$success) {
        throw new Exception("Error deleting product: " . $stmt->error);
    }

    return $success;
}}}