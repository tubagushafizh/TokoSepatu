<?php

include 'layout/header.php'

?>

<div class="container-fluid" style="margin: 0;padding: 0;">
	<div class="image" style="margin-top: -21px">
		<img src="image/home/1.jpg" style="width: 100%;  height: 650px;">
	</div>
</div>

<div class="container">

  <h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #ff8d87; border-bottom: 2px solid #ff8d87;">Sepatu Keren adalah toko Sepatu untuk brand Lokal Indonesia. Local Pride!!!</h4>

  <h2 style=" width: 100%; border-bottom: 4px solid #ff8680; margin-top: 80px;"><b>Produk Kami</b></h2>

  <div class="row">
    <?php
      $result = mysqli_query($conn,'SELECT * FROM produk WHERE stok > 0') or die(mysqli_error($conn));
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img style="height: 200px; width:150px;" src="image/Produk/<?= $row['image'] ?>">
            <div class="caption">
              <h3><?= $row['nama'] ?></h3>
              <h4>Rp.<?= number_format($row['harga'])?></h4>
              <div class="row">
                <div class="col-md-6">
                  <a href="produk.php?produk=<?= $row['id'] ?>" class="btn btn-warning btn-block">Detail</a>
                </div>
                <?php if(isset($_SESSION['id_customer'])) {?>
                  <div class="col-md-6">
                    <a href="proses/add_keranjang.php?produk=<?= $row['id'] ?>" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
  </div>
</div>

<br>
<br>
<br>
<br>
<?php
include 'layout/footer.php'
?>