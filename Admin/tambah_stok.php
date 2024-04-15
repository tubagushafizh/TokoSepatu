<?php 

include 'layout/header.php';
$id = $_GET['id'];
$produk = mysqli_query($conn,"SELECT * FROM produk WHERE id = '$id'");
$produk = mysqli_fetch_assoc($produk);
?>

<div class="container">
  <h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Tambah Produk</b></h2>

  <form action="proses/tambah_stok.php" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama">Nama Produk</label>
          <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Produk" class="form-control" value="<?= $produk['nama'] ?>" disabled>
          <input type="hidden" id="id" name="id" value="<?= $produk['id'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="harga">Stok Produk</label>
          <input type="number" class="form-control" id="stok" placeholder="Masukkan Stok Produk" name="stok">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
      </div>
      <div class="col-md-6">
        <a href="produk.php" class="btn btn-danger btn-block">Kembali</a>
      </div>
    </div>
  </form>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>

<?php 

include 'layout/footer.php'

?>