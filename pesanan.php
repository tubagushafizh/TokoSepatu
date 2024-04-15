<?php

include 'layout/header.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $cancel = mysqli_query($conn, "UPDATE transaksi SET status = 6 WHERE id='$id'");
  echo "
		<script>
		alert('Pesanan dibatalkan');
		window.location = 'pesanan.php';
		</script>
		";
}
?>

<div class="container" style="padding-bottom: 300px;">
  <h2 style="width: 100%; border-bottom: 4px solid #ff8680;">Pesanan</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Alamat Pengiriman</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
        <th scope="col">No Resi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>    
      <?php
        $id_customer = $_SESSION['id_customer'];
        $order = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_customer = '$id_customer'");
        $no = 1;
        while ($row = mysqli_fetch_assoc($order)) {
          $id_order = $row['id'];
          $alamat = $row['alamat'] . ' ' . $row['kota'] . ' ' . $row['provinsi'] . '' . $row['kodepos'];
          switch ($row['status']) {
            case '0':
              $status = 'Menunggu Konfirmasi';
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
              $status = 'Pesanan Dicancel ';
              break;
          }
      ?>      
      <tbody>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['tanggal'] ?></td>
          <td><?= $alamat ?></td>
          <td><?= $row['total'] ?></td>
          <td><?= $status ?></td>
          <td><?= $row['no_resi'] ?></td>
          <?php
          if ($row['status'] == 0) {
            $pesan = 'Apakah Anda Yakin Ingin Membatalkan Pesanan?';
            echo "<td><a href ='pesanan.php?id=$id_order' class='btn btn-danger'>Cancel</a></td>";
          }
          ?>
        </tr>
        <?php
          $no++;
          }
        ?>
      <tbody>
    </tbody>
  </table>
</div>

<?php

include 'layout/footer.php';

?>