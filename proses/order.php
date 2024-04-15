<?php
include '../conn.php';

$id_customer = $_POST['id_customer'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$kodepos = $_POST['kodepos'];
$alamat = $_POST['alamat'];
$total = $_POST['total'];
$tanggal = date('Y-m-d H:i:s');

$keranjang = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = '$id_customer'");

$order = mysqli_query($conn,"INSERT INTO transaksi (id_customer, total, status, tanggal, provinsi, kota, kodepos, alamat) VALUE ('$id_customer', '$total', 0, '$tanggal', '$provinsi', '$kota', '$kodepos', '$alamat')");

if($order){
  $newOrder = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_customer = '$id_customer' AND tanggal = '$tanggal'");  
  $newOrder = mysqli_fetch_assoc($newOrder);
  $id_order = $newOrder["id"];
  while ($row = mysqli_fetch_assoc($keranjang)) {
    $id_produk = $row['id_produk'];
    $qty = $row['qty'];
    $detail_order = mysqli_query($conn, "INSERT INTO detail_transaksi (id_order, id_produk, qty) VALUES ('$id_order', '$id_produk', '$qty')");    
  }

  $del_produk = mysqli_query($conn,"DELETE FROM cart WHERE id_customer = '$id_customer'");

  if($del_produk) {
    echo "
		<script>
		alert('Order Berhasil');
		window.location = '../index.php';
		</script>
		";
		die;
  }
} else {
  echo "
		<script>
		alert('Order Gagal, Silahkan dicoba lagi');
		window.location = '../keranjang.php';
		</script>
		";
		die;
}
?>