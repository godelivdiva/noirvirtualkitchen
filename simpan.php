<?php
include 'koneksi.php';

// menyimpan data ke variabel
$nama = $_POST['fName'];
$telp = $_POST['fTelp'];
$alamat = $_POST['fAlamat'];
$pesanan = $_POST['fPesanan'];
$total = $_POST['fTotal'];
$catatan = $_POST['fNotes'];

// query insert
$query = "INSERT INTO t_virtual_kitchen (
    nama,
    no_telfon,
    alamat,
    pesanan,
    total,
    catatan,
    tanggal_ready) 
    VALUES (
        '$nama',
        '$telp',
        '$alamat',
        '$pesanan',
        '$total',
        '$catatan',
        NOW()+INTERVAL 3 DAY
        )";
$result = mysqli_query($conn,$query);

if (!$result) {
    die ('SQL Error : ') .mysqli_error($conn);
}
mysqli_close($conn);
//mengalihkan ke halaman utama
header("location:index.php");
?>