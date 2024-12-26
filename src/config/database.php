<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

Dotenv::createImmutable(__DIR__ . '/../../')->load();

class Database {
    private $host;
    private $db;
    private $user;
    private $password;
    public $connection;

    public function __construct() {
        $this->host = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];

        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
