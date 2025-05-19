<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $nama = $_POST["nama"];    
    $nis = $_POST["nis"];
    $kelas  = $_POST["kelas"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jurusan = $_POST["jurusan"];
    $sebagai = $_POST["sebagai"];

    $query_check = "SELECT * FROM tb_siswa WHERE nis='$nis'";
    $result_check = mysqli_query($koneksi, $query_check);
    if (mysqli_num_rows($result_check) > 0) {
        echo "NIS sudah terdaftar!";
    } else {
        $query_insert = "INSERT INTO tb_siswa (nama, nis, kelas, jenis_kelamin, jurusan, sebagai)
        VALUES ('$nama', '$nis', '$kelas', '$jenis_kelamin', '$jurusan', '$sebagai')";
        if (mysqli_query($koneksi, $query_insert)) {
            header("location: lihat.php");
        } else {
            echo "Gagal menambahkan data: " .mysqli_error($koneksi);
        }
    $koneksi->close();
    }
}
?>