<?php
include 'koneksi.php';
?>
<?php
// Hapus data berdasarkan ID
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $koneksi->query("DELETE FROM opl_data WHERE id = $id");
    echo "<p style='color:green;'>Data berhasil dihapus!</p>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Point Lesson - PT Dankos Farma</title>
</head>
<body>
    <h1>One Point Lesson - PT Dankos Farma</h1>

    <!-- Form Input OPL -->
    <h2>Form Input OPL</h2>
    <form method="POST" action="">
        <label>Judul OPL:</label><br>
        <input type="text" name="judul" required><br>

        <label>Dibuat Oleh:</label><br>
        <input type="text" name="dibuat_oleh" required><br>

        <label>Supervisor:</label><br>
        <input type="text" name="supervisor" required><br>

        <label>Langkah 1:</label><br>
        <textarea name="langkah1" required></textarea><br>

        <label>Langkah 2:</label><br>
        <textarea name="langkah2"></textarea><br>

        <label>Langkah 3:</label><br>
        <textarea name="langkah3"></textarea><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="foto_langkah1">Foto Langkah 1:</label>
    <input type="text" name="foto_langkah1" id="foto_langkah1" class="form-control">
    
    <label for="foto_langkah2">Foto Langkah 2:</label>
    <input type="text" name="foto_langkah2" id="foto_langkah2" class="form-control">
    
    <label for="foto_langkah3">Foto Langkah 3:</label>
    <input type="text" name="foto_langkah3" id="foto_langkah3" class="form-control">

    <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
</form>
<form action="" method="post">
    <label for="foto_langkah1">Link Foto Langkah 1:</label>
    <input type="url" name="foto_langkah1" id="foto_langkah1" class="form-control" placeholder="Masukkan URL Foto Langkah 1">
    
    <label for="foto_langkah2">Link Foto Langkah 2:</label>
    <input type="url" name="foto_langkah2" id="foto_langkah2" class="form-control" placeholder="Masukkan URL Foto Langkah 2">
    
    <label for="foto_langkah3">Link Foto Langkah 3:</label>
    <input type="url" name="foto_langkah3" id="foto_langkah3" class="form-control" placeholder="Masukkan URL Foto Langkah 3">

    <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
</form>
    <?php
    // Simpan Data ke Database
    if (isset($_POST['simpan'])) {
        $judul = $_POST['judul'];
        $dibuat_oleh = $_POST['dibuat_oleh'];
        $supervisor = $_POST['supervisor'];
        $langkah1 = $_POST['langkah1'];
        $langkah2 = $_POST['langkah2'];
        $langkah3 = $_POST['langkah3'];

        $query = "INSERT INTO opl_data (judul, dibuat_oleh, supervisor, langkah1, langkah2, langkah3) 
                  VALUES ('$judul', '$dibuat_oleh', '$supervisor', '$langkah1', '$langkah2', '$langkah3')";

        if ($koneksi->query($query)) {
            echo "<p style='color:green;'>Data berhasil disimpan!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $query . "<br>" . $koneksi->Error . "</p>";
        }
    }
    ?>
    

    <!-- Tampil Data OPL -->
    <h2>Data OPL</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Judul OPL</th>
            <th>Dibuat Oleh</th>
            <th>Supervisor</th>
            <th>Langkah 1</th>
            <th>Langkah 2</th>
            <th>Langkah 3</th>
        </tr>
        <?php
        $result = $koneksi->query("SELECT * FROM opl_data");
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['judul']) . "</td>
                        <td>" . htmlspecialchars($row['dibuat_oleh']) . "</td>
                        <td>" . htmlspecialchars($row['supervisor']) . "</td>
                        <td>" . htmlspecialchars($row['langkah1']) . "</td>
                        <td>" . htmlspecialchars($row['langkah2']) . "</td>
                        <td>" . htmlspecialchars($row['langkah3']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data!</td></tr>";
        }
        ?>
    </table>
</body>
</html>