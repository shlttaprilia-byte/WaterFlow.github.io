<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO jualair 
    VALUES (
        '',
        '$_POST[nama]',
        '$_POST[harga]',
        '$_POST[stok]',
        '$_POST[kategori]',
        '$_POST[deskripsi]'
    )");

    header("Location: index.php");
}
?>

<h2>Tambah Produk</h2>

<form method="POST">
    Nama Produk <br>
    <input type="text" name="nama" required><br><br>

    Harga <br>
    <input type="number" name="harga" required><br><br>

    Stok <br>
    <input type="number" name="stok" required><br><br>

    Kategori <br>
    <input type="text" name="kategori"><br><br>

    Deskripsi <br>
    <textarea name="deskripsi"></textarea><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>