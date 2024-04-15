<?php

include 'layout/header.php';
$id_customer = $_SESSION['id_customer'];

if (isset($_POST['update'])) {
  $id_keranjang = $_POST['id'];
  $qty = $_POST['qty'];
  $helperKeranjang = mysqli_query($conn, "SELECT * FROM cart WHERE id = '$id_keranjang'");
  $helperKeranjang = mysqli_fetch_assoc($helperKeranjang);
  $id_produk = $helperKeranjang['id_produk'];
  $helperProduk = mysqli_query($conn,"SELECT * FROM produk WHERE id = '$id_produk'");
  $helperProduk = mysqli_fetch_assoc($helperProduk);
  $hargaProduk = $helperProduk["harga"];
  $tempHarga = $qty * $hargaProduk;

  $edit = mysqli_query($conn, "UPDATE cart SET qty = '$qty', harga = '$tempHarga' WHERE id = '$id_keranjang'");
  if($edit) {
    echo "
		<script>
		alert('KERANJANG BERHASIL DIPERBARUI, $qty, $id_keranjang');
		window.location = 'keranjang.php';
		</script>
		";
  }
}

if (isset($_GET["del"])) {
  $id_keranjang = $_GET['id'];
	$del = mysqli_query($conn, "DELETE FROM cart WHERE id = '$id_keranjang'");
  if ($del) {
    echo "
		<script>
		alert('1 PRODUK DIHAPUS');
		window.location = 'keranjang.php';
		</script>
		";
  }
}

?>

<div class="container" style="padding-bottom: 300px;">
  <h2 style="width: 100%; border-bottom: 4px solid #ff8680;"><b>Keranjang</b></h2>
  <table class="table table-striped">
    <?php
      $keranjang = mysqli_query($conn, "SELECT id FROM cart WHERE id_customer = '$id_customer'");
      $row = mysqli_num_rows($keranjang);
      if($row > 0){
      $hasil = 0;
    ?>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Image</th>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Quantity</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php
        $cart = mysqli_query($conn,"SELECT p.image as foto, p.nama as nama,p.harga as satuan, c.* FROM cart c INNER JOIN produk p ON c.id_produk = p.id WHERE id_customer = '$id_customer'");
        $no = 1;
        while($row = mysqli_fetch_assoc($cart)){        
      ?>
        <tbody>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" value="<?= $row['id'] ?>" name="id">
            <tr>
              <th scope="row"><?= $no ?></td>
              <td><img src="image/Produk/<?= $row['foto'] ?>" width="100"></td>
              <td><?= $row['nama'] ?></td>
              <td>Rp. <?= number_format($row['satuan']) ?></td>
              <td><input type="number" id="qty" name="qty" class="form-control" style="text-align: center;" value="<?= $row['qty'] ?>"></td>
              <td>Rp. <?= number_format( $row['harga']) ?></td>
              <td><button type="submit" name="update" class="btn btn-warning">Update</button> | <a class="btn btn-danger" href="keranjang.php?del=1&id=<?= $row['id'] ?>" onclick="return confirm('Yakin Ingin Dihapus?')" >Delete</a></td>
            </tr>
          </form>
          <?php            
            $hasil += $row['harga'];
            $no++;
          ?>
        <?php } ?>
          <tr>
							<td colspan="7" style="text-align: right; font-weight: bold;">Grand Total = Rp.<?= number_format($hasil); ?></td>
						</tr>
						<tr>
							<td colspan="7" style="text-align: right; font-weight: bold;"><a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> <a href="checkout.php?id=<?= $id_customer; ?>" class="btn btn-primary">Checkout</a></td>
						</tr>
        </tbody>      
    <?php
      } else {
						echo "
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Image</th>
						<th scope='col'>Nama</th>
						<th scope='col'>Harga</th>
						<th scope='col'>Qty</th>
						<th scope='col'>SubTotal</th>
						<th scope='col'>Action</th>
						</tr>
						<tr>
						<td colspan='7' class='text-center bg-warning'><h5><b>KERANJANG BELANJA ANDA KOSONG </b></h5></td>
						</tr>

						";
					} 
    ?>
  </table>
</div>

<?php

include 'layout/footer.php';

?>