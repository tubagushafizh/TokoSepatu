<?php

include '../../conn.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$nama_gambar = $_FILES['image']['name'][0];
$size_gambar = $_FILES['image']['size'][0];
$tmp_file = $_FILES['image']['tmp_name'][0];
$error = $_FILES['image']['error'][0];
$type = $_FILES['image']['type'][0];

$produk = mysqli_query($conn,"SELECT * FROM produk WHERE id = '$id'");
$produk = mysqli_fetch_assoc($produk);

if($nama_gambar != "")
{
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
  echo "
    <script>
    alert('$nama_gambar');    
    </script>
    ";
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

  if(!move_uploaded_file($tmp_file, "../../image/Produk/".$namaGambarBaru)) {
    echo "
    <script>
    alert('PRODUK GAGAL DIUBAH');
    window.location = '../produk.php';
    </script>
    ";
  }
  unlink('../../image/Produk/'. $produk['image']);
} else {
  $namaGambarBaru = $produk['image'];
}

$result = mysqli_query($conn, "UPDATE produk SET nama = '$nama', image = '$namaGambarBaru', deskripsi = '$deskripsi', harga = '$harga' WHERE id = '$id'");

if($result) {
  echo "
  <script>
  alert('PRODUK BERHASIL DIUBAH');
  window.location = '../produk.php';
  </script>
  ";
} else {
  echo "
  <script>
  alert('PRODUK GAGAL DIUBAH');
  window.location = '../produk.php';
  </script>
  ";
}

?>