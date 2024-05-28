<?php

// Include the database configuration
require_once(__DIR__ . "/../../php/config.php");

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function index()
    {
        // Fetch all users from the staff table
        $query = "SELECT * FROM staff";
        $result = $this->conn->query($query);

        if (!$result) {
            throw new Exception("Error retrieving users: " . $this->conn->error);
        }

        return $result;
    }

    public function store($newUser)
    {
        // Hash the password using md5
        $newUser['password'] = md5($newUser['password']);

        // Prepare and execute an INSERT query to add a new user to the staff table
        $query = "INSERT INTO staff (name, position, username, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("ssss", $newUser['name'], $newUser['position'], $newUser['username'], $newUser['password']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error inserting new user: " . $stmt->error);
        }

        return $success;
    }

    public function getById($id)
    {
        // Retrieve a user by ID from the staff table
        $query = "SELECT * FROM staff WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user) {
            return null; // User not found
        }

        return $user;
    }

    public function update($updatedUser)
    {
        // Update an existing user in the staff table
        $query = "UPDATE staff SET name = ?, position = ?, username = ?, password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        // Hash the updated password using md5
        $updatedUser['password'] = md5($updatedUser['password']);

        $stmt->bind_param("ssssi", $updatedUser['name'], $updatedUser['position'], $updatedUser['username'], $updatedUser['password'], $updatedUser['id']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating user: " . $stmt->error);
        }

        return $success;
    }

    public function deleteUser($id)
{
    // Delete a user from the staff table
    $query = "DELETE FROM staff WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        throw new Exception("Error preparing query: " . $this->conn->error);
    }

    $stmt->bind_param("i", $id);
    $success = $stmt->execute();

    if (!$success) {
        throw new Exception("Error deleting user: " . $stmt->error);
    }

    return $success;
}

}
