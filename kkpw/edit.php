<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM jualair WHERE id=$id");
$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE jualair SET
        nama_produk='$_POST[nama]',
        harga='$_POST[harga]',
        stok='$_POST[stok]',
        kategori='$_POST[kategori]',
        deskripsi='$_POST[deskripsi]'
        WHERE id=$id");

    header("Location: index.php");
}
?>

<h2>Edit Produk</h2>

<form method="POST">
    Nama Produk <br>
    <input type="text" name="nama" value="<?= $d['nama_produk']; ?>"><br><br>

    Harga <br>
    <input type="number" name="harga" value="<?= $d['harga']; ?>"><br><br>

    Stok <br>
    <input type="number" name="stok" value="<?= $d['stok']; ?>"><br><br>

    Kategori <br>
    <input type="text" name="kategori" value="<?= $d['kategori']; ?>"><br><br>

    Deskripsi <br>
    <textarea name="deskripsi"><?= $d['deskripsi']; ?></textarea><br><br>

    <button type="submit" name="update">Update</button>
</form>