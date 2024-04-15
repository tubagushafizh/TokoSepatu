<?php
session_start();
include '../conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM users where username = '$username'");
$jml = mysqli_num_rows($cek);
$row = mysqli_fetch_assoc($cek);
if ($jml == 1) {
  if (password_verify($password, $row["password"])) {
    $_SESSION['user'] = $row['nama'];
    $_SESSION['id_customer'] = $row['id'];
    $_SESSION['email'] = $row['email'];    
    $_SESSION['role'] = $row['role'];
    if($row['role'] == 1)
    {
      header('location:../index.php');
    } else {
      header('location:../Admin/index.php');
    }
  } else {
    echo "
		<script>
		alert('USERNAME/PASSWORD SALAH');
		window.location = '../login.php';
		</script>
		";
		die;
  }
} else {
  echo "
		<script>
		alert('USERNAME/PASSWORD SALAH');
		window.location = '../login.php';
		</script>
		";
	die;
}
?>