<?php include 'views/layout/header.php'; ?>

<div class="content">
    <div class="form-container">
        <h2>✏️ Edit Data Karyawan</h2>
        
        <form action="index.php?action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $this->karyawan->id; ?>">
            
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan:</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" 
                       value="<?php echo $this->karyawan->nama_karyawan; ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                       value="<?php echo $this->karyawan->tanggal_lahir; ?>" required>
            </div>

            <div class="form-group">
                <label for="id_jabatan">Jabatan:</label>
                <select id="id_jabatan" name="id_jabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <?php
                    while ($row = $stmt_jabatan->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($row['id_jabatan'] == $this->karyawan->id_jabatan) ? 'selected' : '';
                        echo "<option value='{$row['id_jabatan']}' {$selected}>{$row['nama_jabatan']}</option>";
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
                        $selected = ($row['id_kota'] == $this->karyawan->id_kota) ? 'selected' : '';
                        echo "<option value='{$row['id_kota']}' {$selected}>{$row['nama_kota']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="index.php" class="btn btn-secondary">❌ Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>