<?php include 'views/layout/header.php'; ?>

<div class="content">
    <?php
    // Tampilkan pesan sukses/error
    if(isset($_GET['message'])) {
        if($_GET['message'] == 'success_create') {
            echo '<div class="alert success">✅ Data berhasil ditambahkan!</div>';
        } elseif($_GET['message'] == 'success_update') {
            echo '<div class="alert success">✅ Data berhasil diupdate!</div>';
        } elseif($_GET['message'] == 'success_delete') {
            echo '<div class="alert success">✅ Data berhasil dihapus!</div>';
        } elseif($_GET['message'] == 'error') {
            echo '<div class="alert error">❌ Terjadi kesalahan!</div>';
        }
    }
    ?>

    <div class="header-section">
        <h2>📋 Daftar Karyawan</h2>
        <a href="index.php?action=create" class="btn btn-primary">➕ Tambah Karyawan Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Kota Asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$nama_karyawan}</td>";
                echo "<td>" . date('d-m-Y', strtotime($tanggal_lahir)) . "</td>";
                echo "<td>{$nama_jabatan}</td>";
                echo "<td>{$nama_kota}</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='index.php?action=edit&id={$id}' class='btn btn-edit'>✏️ Edit</a>";
                echo "<a href='index.php?action=delete&id={$id}' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus data {$nama_karyawan}?\")'>🗑️ Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>
