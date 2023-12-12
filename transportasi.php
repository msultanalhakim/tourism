<?php
session_start();
include("connection.php");

if(isset($_POST['tambah_transportasi'])){
    $nama_transportasi = $_POST['transportation'];
    $tujuan_awal = $_POST['tujuan_awal'];
    $tujuan_akhir = $_POST['tujuan_akhir'];
    $kategori   = $_POST['kategori'];
    $harga = $_POST['harga_satuan'];

    $query = "INSERT INTO transportations(transportation_name, initial_goal, final_destination,kategori, price) VALUES 
    ('$nama_transportasi', '$tujuan_awal', '$tujuan_akhir','$kategori', '$harga')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Berhasil Menambahkan Jalur Transportasi');window.location.href = 'admin.php';</script>";
    }
}
?>