<?php include 'views/layout/header.php'; ?>

<div class="content">
    <div class="form-container">
        <h2> Tambah Data Karyawan Baru</h2>
        
        <form action="index.php?action=store" method="POST">
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan:</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <div class="form-group">
                <label for="id_jabatan">Jabatan:</label>
                <select id="id_jabatan" name="id_jabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <?php
                    while ($row = $stmt_jabatan->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id_jabatan']}'>{$row['nama_jabatan']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_kota">Kota Asal:</label>
                <select id="id_kota" name="id_kota" required>
                    <option value="">-- Pilih Kota --</option>
                    <?php
                    while ($row = $stmt_kota->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id_kota']}'>{$row['nama_kota']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Simpan</button>
                <a href="index.php" class="btn btn-secondary">❌ Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>