<?php
require_once 'config/database.php';
require_once 'models/Karyawan.php';
require_once 'models/Kota.php';
require_once 'models/Jabatan.php';

class KaryawanController {
    private $db;
    private $karyawan;
    private $kota;
    private $jabatan;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        
        $this->karyawan = new Karyawan($this->db);
        $this->kota = new Kota($this->db);
        $this->jabatan = new Jabatan($this->db);
    }

    // Tampilkan semua data (READ)
    public function index() {
        $stmt = $this->karyawan->readAll();
        include 'views/karyawan/index.php';
    }

    // Form tambah data
    public function create() {
        $stmt_kota = $this->kota->readAll();
        $stmt_jabatan = $this->jabatan->readAll();
        include 'views/karyawan/create.php';
    }

    // Proses simpan data (CREATE)
    public function store() {
        if($_POST) {
            $this->karyawan->nama_karyawan = $_POST['nama_karyawan'];
            $this->karyawan->tanggal_lahir = $_POST['tanggal_lahir'];
            $this->karyawan->id_jabatan = $_POST['id_jabatan'];
            $this->karyawan->id_kota = $_POST['id_kota'];

            if($this->karyawan->create()) {
                header("Location: index.php?message=success_create");
            } else {
                header("Location: index.php?message=error");
            }
        }
    }

    // Form edit data
    public function edit() {
        if(isset($_GET['id'])) {
            $this->karyawan->id = $_GET['id'];
            $this->karyawan->readOne();
            
            $stmt_kota = $this->kota->readAll();
            $stmt_jabatan = $this->jabatan->readAll();
            
            include 'views/karyawan/edit.php';
        }
    }

    // Proses update data (UPDATE)
    public function update() {
        if($_POST) {
            $this->karyawan->id = $_POST['id'];
            $this->karyawan->nama_karyawan = $_POST['nama_karyawan'];
            $this->karyawan->tanggal_lahir = $_POST['tanggal_lahir'];
            $this->karyawan->id_jabatan = $_POST['id_jabatan'];
            $this->karyawan->id_kota = $_POST['id_kota'];

            if($this->karyawan->update()) {
                header("Location: index.php?message=success_update");
            } else {
                header("Location: index.php?message=error");
            }
        }
    }

    // Proses hapus data (DELETE)
    public function delete() {
        if(isset($_GET['id'])) {
            $this->karyawan->id = $_GET['id'];
            
            if($this->karyawan->delete()) {
                header("Location: index.php?message=success_delete");
            } else {
                header("Location: index.php?message=error");
            }
        }
    }
}
?>