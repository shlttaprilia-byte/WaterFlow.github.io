<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
include 'koneksi.php';

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM jualair WHERE id=$id");
    header("Location: index.php");
}
?>

<h2>Data Produk</h2>
<a href="tambah.php">+ Tambah Produk</a>
<br><br>

<form method="GET">
    <input type="text" name="cari" placeholder="Cari produk...">
    <button type="submit">Cari</button>
</form>

<br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Kategori</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$data = mysqli_query($conn, "SELECT * FROM jualair 
    WHERE nama_produk LIKE '%$cari%'");

while ($d = mysqli_fetch_array($data)) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_produk']; ?></td>
    <td><?= $d['harga']; ?></td>
    <td><?= $d['stok']; ?></td>
    <td><?= $d['kategori']; ?></td>
    <td><?= $d['deskripsi']; ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
        <a href="?hapus=<?= $d['id']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>