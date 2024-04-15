<?php

include '../../conn.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$nama_gambar = $_FILES['image']['name'][0];
$size_gambar = $_FILES['image']['size'][0];
$tmp_file = $_FILES['image']['tmp_name'][0];
$error = $_FILES['image']['error'][0];
$type = $_FILES['image']['type'][0];

if($error === 4)
{
  echo "
	<script>
	alert('TIDAK ADA GAMBAR YANG DIPILIH');
	window.location = '../produk.php';
	</script>
	";
	die;
}

$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
	echo "
	<script>
	alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
	window.location = '../produk.php';
	</script>
	";
	die;
}

if($size_gambar > 1000000){
	echo "
	<script>
	alert('UKURAN GAMBAR TERLALU BESAR');
	window.location = '../produk.php';
	</script>
	";
	die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

if(move_uploaded_file($tmp_file, "../../image/Produk/".$namaGambarBaru)) {
  $result = mysqli_query($conn, "INSERT INTO produk(nama, image, deskripsi, harga, stok) VALUES('$nama', '$namaGambarBaru', '$deskripsi', $harga, 0)");

  if($result) {
    echo "
		<script>
		alert('PRODUK BERHASIL DITAMBAHKAN');
		window.location = '../produk.php';
		</script>
		";
  } else {
    echo "
		<script>
		alert('PRODUK GAGAL DITAMBAHKAN');
		window.location = '../produk.php';
		</script>
		";
  }
}
?>