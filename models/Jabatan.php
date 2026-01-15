<?php
class Jabatan {
    private $conn;
    private $table_name = "tabel_jabatan";

    public $id_jabatan;
    public $nama_jabatan;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nama_jabatan ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>