<?php

include '../../conn.php';
$id = $_POST['id'];
$stok = $_POST['stok'];

$produk = mysqli_query($conn,"SELECT stok FROM produk WHERE id = '$id'");
$produk = mysqli_fetch_assoc($produk);
$stokBefore = $produk["stok"];
$stokAfter = (int)$stokBefore + (int)$stok;
$result = mysqli_query($conn, "UPDATE produk SET stok = '$stokAfter' WHERE id = '$id'");
if($result){
  echo "
	<script>
	alert('STOK BERHASIL DITAMBAHKAN');
	window.location = '../produk.php';
	</script>
	";
} else {
  echo "
	<script>
	alert('STOK GAGAL DITAMBAHKAN');
	window.location = '../produk.php';
	</script>
	";
}
;

?>