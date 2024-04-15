<?php 

include 'layout/header.php'

?>

<div class="container">
  <h2 style="width: 100%; border-bottom: 4px solid gray;"><b>Master Produk</b></h2>

  <a href="tambah_produk.php" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Produk</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>        
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM produk");
      $no = 1;
      while ($row = mysqli_fetch_assoc($result)){
      ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['nama'] ?></td>          
          <td>Rp. <?= number_format($row['harga']) ?></td>
          <td><?= $row['stok'] ?></td>
          <td><a href="edit_produk.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a> <a href="proses/delete_produk.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a> <a href="tambah_stok.php?id=<?= $row['id'] ?>" class="btn btn-success" ><i class="glyphicon glyphicon-plus-sign"></i> Stok</a></td>
        </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
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
<?php 

include 'layout/footer.php'

?>