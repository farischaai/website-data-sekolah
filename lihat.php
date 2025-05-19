<?php
session_start();
include 'koneksi.php';
$sql = "SELECT * FROM tb_siswa";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="header">
        <h1>Website Data Sekolah</h1>
        <nav>
            <a href="index.html">Tambah Data</a>
            <a href="lihat.php">Lihat Data</a>
        </nav>
    </div>
    <div class="form-container">
        <h2>Data Siswa/Guru</h2>
        <div class="b">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIS/NIP</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Sebagai</th>
                <th>Aksi</th>

            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['nis'] . "</td>";
                    echo "<td>" . $row['nis'] . "</td>";
                    echo "<td>" . $row['kelas'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['jurusan'] . "</td>";
                    echo "<td>" . $row['sebagai'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "'>Edit</a> 
                            <a href='hapus.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data siswa.</td></tr>";
                //header("Location: lihat.php");
            }
            mysqli_close($koneksi);
            ?>
        </table>
        </div>
        <br><br>
    </div>
    <div class="footer">
.    </div>
</body>
</html>
