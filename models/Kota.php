<?php
class Kota {
    private $conn;
    private $table_name = "tabel_kota";

    public $id_kota;
    public $nama_kota;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nama_kota ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>