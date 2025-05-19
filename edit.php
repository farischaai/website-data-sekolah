<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_siswa WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID tidak ditemukan.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];    
    $kelas  = $_POST["kelas"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jurusan = $_POST["jurusan"];

    $query = "UPDATE tb_siswa SET nama='$nama', kelas='$kelas', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil diperbarui.";
        header("Location: lihat.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Website Data Sekolah</h1>
        <nav>
            <a href="#">Home</a>
            <a href="register.html">Tambah Data</a>
            <a href="datasiswa.php">Lihat Data</a>
        </nav>
    </div>
    <div class="form-container">
        <h2>Form Edit Data Siswa</h2>
    <form action="" method="POST">
        <label>Nama Siswa</label>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>

        <label>Kelas</label>
        <input type="text" id="kelas" value="<?php echo $data['kelas']; ?>" name="kelas">

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="laki" <?php echo ($data['jenis_kelamin'] == 'laki') ? "selected" : ""; ?>>Laki-laki</option>
            <option value="cewe" <?php echo ($data['jenis_kelamin'] == 'cewe') ? "selected" : ""; ?>>Perempuan</option>
        </select>

        <label for="jurusan">Jurusan:</label>
          <input type="text" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>" required>

        <input type="submit" name="submit" value="Update Data">
    </form>
    <br><br>
    </div>
    <div class="footer">
    </div>
</body>
</html>
