<?php

include '../../conn.php';

$id = $_GET['id'];
$produk = mysqli_query($conn,"SELECT * FROM produk WHERE id = '$id'");
$row = mysqli_fetch_assoc($produk);
unlink('../../image/Produk/'. $row['image']);
$del = mysqli_query($conn,"DELETE FROM produk WHERE id = '$id'");
if($del){
  echo "
	<script>
	alert('DATA BERHASIL DIHAPUS');
	window.location = '../produk.php';
	</script>
	";
} else {
  echo "
	<script>
	alert('DATA GAGAL DIHAPUS');
	window.location = '../produk.php';
	</script>
	";
}

?>