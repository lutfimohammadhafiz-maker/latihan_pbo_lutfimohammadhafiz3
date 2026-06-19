<?php
// TAHAP 3: File koneksi database menggunakan PDO
class Database {
    private $host = 'localhost';
    private $dbname = 'DB_SIMULASI_PBO_IF3_LutfiMohammadHafiz';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", 
                                  $this->username, 
                                  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>