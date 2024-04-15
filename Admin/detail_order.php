<?php

include 'layout/header.php';

$id_order = $_GET['id'];
$order = mysqli_query($conn, "SELECT u.nama as nama, t.* FROM transaksi t INNER JOIN users u on t.id_customer = u.id WHERE t.id = '$id_order'");
$order = mysqli_fetch_assoc($order);
$alamat = $order['alamat'] . ' ' . $order['kota'] . ' ' . $order['provinsi'] . '' . $order['kodepos'];

$detail_order = mysqli_query($conn,"SELECT p.nama as nama, p.harga as harga,  d.* FROM detail_transaksi d INNER JOIN produk p on d.id_produk = p.id WHERE id_order = '$id_order'");


switch ($order['status']) {
  case '0':
    $status = 'Pesanan Baru';
    break;
  case '1':
    $status = 'Pesanan Dalam Proses';
    break;

  case '2':
    $status = 'Proses Pesanan Selesai';
    break;

  case '3':
    $status = 'Pesanan Diantar';
    break;

  case '4':
    $status = 'Pesanan Sampai';
    break;

  case '5':
    $status = 'Pesanan Ditolak';
    break;

  case '6':
    $status = 'Pesanan dicancel';
    break;
}
?>

<div class="container">
  <h2 style="width: 100%; border-bottom: 4px solid gray;"><b>Detail Order</b></h2>

  <table class="table table-striped">
    <form action="proses/pesanan.php?id=<?= $id_order ?>" method="post">
      <tbody>
        <tr>
          <th>Customer</th>
          <td><?= $order['nama'] ?></td>      
        </tr>
        <tr>
          <th>Tanggal</th>
          <td><?= $order['tanggal'] ?></td>      
        </tr>
        <tr>
          <th>Alamat</th>
          <td><?= $alamat?></td>      
        </tr>
        <tr>
          <th>Total</th>
          <td><?= $order['total'] ?></td>      
        </tr>
        <tr>
          <th>No Resi</th>          
          <td><?= $order['status'] == 2 && ($order['no_resi'] == '' || $order['no_resi'] == null) ? "<input type='text' class='form-control' name='resi' id='resi' placeholder='Isi Nomor Resi'>" : $order['no_resi']; ?></td>
        </tr>
        <tr>
          <th>Status</th>
          <td><?= $status ?></td>
        </tr>
        <?php if($order['status'] == 2) {?>
        <tr>
          <th></th>
          <td><button type='submit' class='btn btn-success'>Simpan</button></td>
        </tr>
        <?php } ?>
      </tbody>
    </form>
  </table>

  <h3 style="width: 100%; border-bottom: 1px solid gray;"><b>Detail Produk</b></h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>QTY</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($detail_order)) {
        ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td><?= $row['qty'] ?></td>
            <td><?= $row['harga'] * $row['qty'] ?></td>
          </tr>
      <?php
          $no++;
        }
      ?>
    </tbody>
  </table>
</div>

<?php 

  include 'layout/footer.php'

?>