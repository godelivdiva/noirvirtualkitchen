<?php
include 'koneksi.php';
$sql = 'SELECT nama, pesanan,total, date_format(tanggal_ready,"%d %M %Y") tanggal_ready,catatan
        FROM t_virtual_kitchen';

$result = mysqli_query($conn,$sql);

if (!$result) {
    die ('SQL Error : ') .mysqli_error($conn);
}
// $data = mysqli_fetch_array($result);
mysqli_close($conn);
?>