<?php
#status order toko sepatu
#0 = baru
#1 = proses
#2 = selesai
#3 = diantar
#4 = sampai
#5 = ditolak
#6 = cancel
include 'layout/header.php';
$pesananBaru = mysqli_query($conn, "SELECT id FROM `transaksi` WHERE status = '0'");
$jmlPesananBaru = mysqli_num_rows($pesananBaru);
$pesananCancel = mysqli_query($conn, "SELECT id FROM `transaksi` WHERE status IN ('5','6')");
$jmlPesananCancel = mysqli_num_rows($pesananCancel);
$pesananProses = mysqli_query($conn, "SELECT id FROM `transaksi` WHERE status NOT IN ('0', '5', '6')");
$jmlPesananProses = mysqli_num_rows($pesananProses);

?>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px; padding-right: 20px; padding-top: 10px;">
        <h4>Pesanan Baru</h4>
        <h4 style="font-size: 56pt;"><?= $jmlPesananBaru; ?></h4>
      </div>      
    </div>

    <div class="col-md-4" >
			<div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
				<h4>PESANAN DIBATALKAN</h4>
				<h4 style="font-size: 56pt;"><b><?= $jmlPesananCancel; ?></b></h4>
			</div>
		</div>

		<div class="col-md-4" >
			<div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
				<h4>PESANAN DALAM PROSES</h4>
				<h4 style="font-size: 56pt;"><b><?= $jmlPesananProses; ?></b></h4>
			</div>
		</div>
  </div>
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
include 'layout/footer.php';
?>