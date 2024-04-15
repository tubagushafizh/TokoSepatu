<?php 

include '../conn.php';
session_start();

$id_produk = $_GET['produk'];
$id_customer = $_SESSION['id_customer'];

$produk = mysqli_query($conn,"SELECT * FROM produk WHERE id = '$id_produk'");
$produk = mysqli_fetch_assoc($produk);

$cek = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = '$id_customer' AND id_produk = '$id_produk'");
$jml = mysqli_num_rows($cek);
if ($jml > 0) {
  $cart = mysqli_fetch_assoc($cek);
  $qty = $cart['qty'] + 1;  
  $harga = $qty * $produk['harga'];
  $update = mysqli_query($conn,"UPDATE cart SET qty = '$qty', harga = '$harga' WHERE id_customer = '$id_customer' AND id_produk = '$id_produk'");  
  header('location:../index.php');
} else {
  $harga = $produk['harga'];
  $insert = mysqli_query($conn,"INSERT INTO cart (id_customer, id_produk, qty, harga) VALUES ('$id_customer', '$id_produk', 1, '$harga')");
  header('location:../index.php');
}
?>