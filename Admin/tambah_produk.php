<?php

include 'layout/header.php';

?>

<div class="container">
  <h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Tambah Produk</b></h2>

  <form action="proses/tambah_produk.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="image">Pilih Gambar</label>
      <input type="file" id="image" name="image[]" onchange="readURL(this);" >
      <img id="foto" src="#" />
      <p class="help-block">Pilih Gambar Produk</p>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama">Nama Produk</label>
          <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Produk" class="form-control">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="harga">Harga Produk</label>
          <input type="number" class="form-control" id="harga" placeholder="Masukkan Harga Produk" name="harga">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="deskripsi">Deskripsi Produk</label>
          <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
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

    <br>
  </form>
</div>

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

<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#foto').attr('src', e.target.result).width(150).height(200);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>

<?php

include 'layout/footer.php';

?>