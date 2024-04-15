<?php

include '../../conn.php';

$id = $_GET['id'];
if (isset($_GET['status'])) {
  switch ($_GET['status']) {
    case 'terima':
      $status = 1;
      break;

    case 'tolak':
      $status = 5;
      break;

    case 'selesai':
      $status = 2;
      break;
  }
} else {
  $status = 3;  
}

$resi = isset($_POST['resi']) ? $_POST['resi'] : null;

$update = mysqli_query($conn, "UPDATE transaksi SET status = '$status', no_resi = '$resi' WHERE id = '$id'");
if ($update) {
  echo "
    <script>
    alert('Pesanan Berhasil diupdate');
    window.location = '../order.php';
    </script>
    ";
    die;
}

?>