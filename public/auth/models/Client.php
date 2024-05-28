<?php

if (!class_exists('Client')) {
    include("../../php/config.php");

class Client
{

    public function __construct(
        private $conn
    ) {
    }

    public function index()
    {
        $result = $this->conn->query("select * from client");

        return $result;
    }

    public function store(array $newClient)
    {
        $queryStore = $this->conn->prepare("insert into client(code, name, contactPerson, phone, address) values(?, ?, ?, ?, ?)");
        $queryStore->bind_param("sssss", $newClient['code'], $newClient['name'], $newClient["contactPerson"], $newClient["phone"], $newClient["address"]); // isi sendiri

        return $queryStore->execute();
    }
    

    public function getById($id)
    {
        $query = $this->conn->prepare("SELECT * FROM client WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update($updatedClient)
    {
        // Update an existing user in the staff table
        $query = "UPDATE client SET code = ?, name = ?, contactPerson = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Error preparing query: " . $this->conn->error);
        }

        $stmt->bind_param("sssssi", $updatedClient['code'], $updatedClient['name'], $updatedClient['contactPerson'], $updatedClient['phone'], $updatedClient['address'], $updatedClient['id']);
        $success = $stmt->execute();

        if (!$success) {
            throw new Exception("Error updating client: " . $stmt->error);
        }

        return $success;
    }


    public function deleteClient($id)
{
    // Delete a client from the staff table
    $query = "DELETE FROM client WHERE id = ?";
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
}