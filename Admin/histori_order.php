<?php

include 'layout/header.php';

?>

<div class="container">
  <h2 style="width: 100%; border-bottom: 4px solid gray;">Histori Penjualan</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Customer</th>
        <th scope="col">Alamat</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
        <th scope="col">No Resi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $order = mysqli_query($conn, "SELECT u.nama as nama, t.* FROM transaksi t INNER JOIN users u on t.id_customer = u.id");
      $no = 1;      
      $status;
      while ($row = mysqli_fetch_assoc($order)) {
        $id_order = $row['id'];
        $alamat = $row['alamat'] . ' ' . $row['kota'] . ' ' . $row['provinsi'] . '' . $row['kodepos'];
        switch ($row['status']) {
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
            $status = 'Pesanan Sudah Sampai';
            break;

          case '5':
            $status = 'Pesanan Ditolak';
            break;

          case '6':
            $status = 'Pesanan dicancel Customer';
            break;
        }
        ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $alamat ?></td>
          <td><?= number_format($row['total']) ?></td>
          <td><?= $status ?></td>
          <td><?= $row['no_resi'] == null ? '' : $row['no_resi'] ?></td>
          <td>
            <a href="detail_order.php?id=<?= $id_order ?>" class="btn btn-warning">Detail</a>             
          </td>
        </tr>
      <?php
          $no++;
        }
      ?>
    </tbody>
  </table>
</div>

<?php

include 'layout/footer.php';

?>