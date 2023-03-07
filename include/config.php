<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "tmh";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function get_connection() {
        return $this->conn;
    }

    public function close_connection() {
        $this->conn->close();
    }
}

// Create a new Database instance
$database = new Database();

// Get the database connection
$conn = $database->get_connection();


?>