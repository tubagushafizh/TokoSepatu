<?php
include '../conn.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$telp = $_POST['telp'];
$password = $_POST['password'];
$repass = $_POST['repassword'];
// echo "<script> alert ('$password, $repass') </script>";

if($password == $repass) {
  $cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
  if($cek->num_rows > 0)  {
    echo "
		<script>
		alert('USERNAME SUDAH DIGUNAKAN');
		window.location = '../register.php';
		</script>
		";
		die;
  }
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $result = mysqli_query($conn,"INSERT INTO users (nama, email, username, password, telp, role) VALUES('$nama', '$email', '$username', '$hash', '$telp', '1')");
  if($result) {
    echo "
		<script>
		alert('REGISTER BERHASIL');
		window.location = '../login.php';
		</script>
		";
  }
} else {
  	echo "
	<script>
	alert('KONFIRMASI PASSWORD TIDAK SAMA');
	window.location = '../register.php';
	</script>
	";
}
?>
