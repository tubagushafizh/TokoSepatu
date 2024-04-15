<?php

include 'layout/header.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);
$customer = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id'");
$customer = mysqli_fetch_assoc($customer);

?>

<div class="container" style="padding-bottom: 200px">
  <h2 style="width:100%; border-bottom: 4px solid #ff8680"><b>Checkout</b></h2>
  <div class="row">
    <div class="col-md-6">
      <h4>Daftar Pesanan</h4>
      <table class="table table-striped">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>qty</th>
          <th>sub</th>
        </tr>
        <?php 
          $cart = mysqli_query($conn,"SELECT p.nama as nama, p.harga as harga_produk, c.* FROM cart c INNER JOIN produk p on c.id_produk = p.id WHERE id_customer = '$id'");
          $no = 1;
          $hasil = 0;
          while ($row = mysqli_fetch_array($cart)) {
          ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $row['nama'] ?></td>
            <td>Rp.<?= number_format($row['harga_produk']) ?></td>
            <td><?= $row['qty'] ?></td>
            <td>Rp.<?= number_format($row['harga']) ?></td>
          </tr>
        <?php
          $hasil += $row['harga'];
          $no++;
        }
        ?>
        <tr>
          <td colspan="5" style="text-align: right; font-weight:bold;">Grand Total = Rp.<?= number_format($hasil) ?></td>
        </tr>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 bg-success">
      <h5>Pastikan Pesanan Anda Sudah Benar</h5>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 bg-warning">
      <h5>Isi Form Dibawah Ini</h5>
    </div>
  </div>

  <br>

  <form action="proses/order.php" method="post">
    <input type="hidden" name="id_customer" value="<?= $id ?>">
    <input type="hidden" name="total" value="<?= $hasil ?>">
    <div class="form-group">
      <label for="nama_customer">Nama</label>
      <input type="text" class="form-control" id="nama_customer" placeholder="Nama" name="nama_customer" style="width: 557px;" value="<?= $customer['nama'] ?>" readonly>
    </div>
    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="provinsi">Provinsi</label>
          <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="provinsi">
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" id="kota" name="kota" class="form-control" placeholder="Kota">
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="kodepos">Kode Pos</label>
          <input type="text" id="kodepos" name="kodepos" class="form-control" placeholder="Kode Pos">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-2">
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Order Sekarang</button>
      </div>
      <div class="col-md-2">
        <a href="keranjang.php" class="btn btn-danger">Kembali</a>
      </div>
    </div>    
  </form>
</div>

<?php 

include 'layout/footer.php'

?>