# Aplikasi CRUD Data Karyawan - PHP MVC

Aplikasi manajemen data karyawan menggunakan PHP dengan konsep Model-View-Controller (MVC) dan database normalisasi.

## Fitur
- ✅ Create: Tambah data karyawan
- ✅ Read: Tampilkan daftar karyawan
- ✅ Update: Edit data karyawan
- ✅ Delete: Hapus data karyawan

## Teknologi
- PHP 8.x
- MySQL 8.0
- Apache (XAMPP)
- HTML5, CSS3, JavaScript

## Database
Database menggunakan normalisasi 3NF dengan 3 tabel:
- `tabel_kota` - Data kota
- `tabel_jabatan` - Data jabatan
- `tabel_karyawan` - Data karyawan (dengan Foreign Key)

## Cara Install

### 1. Clone Repository
```bash
git clone https://github.com/username/karyawan-mvc-app.git
```

### 2. Import Database
- Buka phpMyAdmin
- Create database: `db_karyawan`
- Import file `database.sql`

### 3. Konfigurasi
Edit file `config/database.php`:
```php
private $host = "localhost";
private $db_name = "db_karyawan";
private $username = "root";
private $password = "260503"; 
```

### 4. Jalankan Aplikasi
- Start Apache & MySQL di XAMPP
- Akses: `http://localhost/karyawan-mvc-app`

## Struktur Folder
```
karyawan_mvc/
├── config/          # Konfigurasi database
├── models/          # Model (Data logic)
├── views/           # View (Tampilan)
├── controllers/     # Controller (Business logic)
├── assets/css/      # Styling
└── index.php        # Entry point
```

## Screenshot
![Daftar Karyawan](screenshot.png)

## Author
Kurniawandwi26 - [GitHub](https://github.com/username)

## License
MIT License 