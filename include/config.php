<?php

class Database {
    private $host = "localhost";
    private $username = "id20414867_root";
    private $password = "p7@H)eD/[FzDT&H4";
    private $database = "id20414867_tmh";
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