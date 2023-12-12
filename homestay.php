<?php
session_start();
include("connection.php");

if(isset($_POST['tambah_homestay'])){
    $lokasi = $_POST['lokasi'];
    $homestay_class = $_POST['class'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga_satuan'];

    $query = "INSERT INTO homestays(Lokasi, homestay_class, alamat, price) VALUES 
    ('$lokasi', '$homestay_class', '$alamat', '$harga')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Berhasil Menambahkan Penginapan');window.location.href = 'admin.php';</script>";
    }
}
?>

