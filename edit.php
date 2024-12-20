<?php
include 'koneksi.php';

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $koneksi->query("SELECT * FROM opl_data WHERE id = $id");
    $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $dibuat_oleh = $_POST['dibuat_oleh'];
    $supervisor = $_POST['supervisor'];
    $langkah1 = $_POST['langkah1'];
    $langkah2 = $_POST['langkah2'];
    $langkah3 = $_POST['langkah3'];

    $query = "UPDATE opl_data SET 
                judul='$judul', dibuat_oleh='$dibuat_oleh', supervisor='$supervisor', 
                langkah1='$langkah1', langkah2='$langkah2', langkah3='$langkah3'
              WHERE id=$id";

    if ($koneksi->query($query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<h2>Edit Data OPL</h2>
<form method="POST" action="">
    <label>Judul OPL:</label><br>
    <input type="text" name="judul" value="<?= $data['judul'] ?>"><br>

    <label>Dibuat Oleh:</label><br>
    <input type="text" name="dibuat_oleh" value="<?= $data['dibuat_oleh'] ?>"><br>

    <label>Supervisor:</label><br>
    <input type="text" name="supervisor" value="<?= $data['supervisor'] ?>"><br>

    <label>Langkah 1:</label><br>
    <textarea name="langkah1"><?= $data['langkah1'] ?></textarea><br>

    <label>Langkah 2:</label><br>
    <textarea name="langkah2"><?= $data['langkah2'] ?></textarea><br>

    <label>Langkah 3:</label><br>
    <textarea name="langkah3"><?= $data['langkah3'] ?></textarea><br><br>

    <button type="submit" name="update">Update</button>
</form>