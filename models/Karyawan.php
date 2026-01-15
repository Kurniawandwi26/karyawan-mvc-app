<?php
class Karyawan {
    private $conn;
    private $table_name = "tabel_karyawan";

    public $id;
    public $nama_karyawan;
    public $tanggal_lahir;
    public $id_jabatan;
    public $id_kota;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT 
                    k.id,
                    k.nama_karyawan,
                    k.tanggal_lahir,
                    j.nama_jabatan,
                    kt.nama_kota
                  FROM " . $this->table_name . " k
                  INNER JOIN tabel_jabatan j ON k.id_jabatan = j.id_jabatan
                  INNER JOIN tabel_kota kt ON k.id_kota = kt.id_kota
                  ORDER BY k.id ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            $this->nama_karyawan = $row['nama_karyawan'];
            $this->tanggal_lahir = $row['tanggal_lahir'];
            $this->id_jabatan = $row['id_jabatan'];
            $this->id_kota = $row['id_kota'];
        }
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nama_karyawan=:nama_karyawan, 
                      tanggal_lahir=:tanggal_lahir, 
                      id_jabatan=:id_jabatan, 
                      id_kota=:id_kota";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nama_karyawan", $this->nama_karyawan);
        $stmt->bindParam(":tanggal_lahir", $this->tanggal_lahir);
        $stmt->bindParam(":id_jabatan", $this->id_jabatan);
        $stmt->bindParam(":id_kota", $this->id_kota);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nama_karyawan=:nama_karyawan, 
                      tanggal_lahir=:tanggal_lahir, 
                      id_jabatan=:id_jabatan, 
                      id_kota=:id_kota
                  WHERE id=:id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nama_karyawan", $this->nama_karyawan);
        $stmt->bindParam(":tanggal_lahir", $this->tanggal_lahir);
        $stmt->bindParam(":id_jabatan", $this->id_jabatan);
        $stmt->bindParam(":id_kota", $this->id_kota);
        $stmt->bindParam(":id", $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
