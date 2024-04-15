<?php
  session_start();
  unset($_SESSION['user']);
  unset($_SESSION['email']);
  unset($_SESSION['role']);
  header('location: ../login.php');
?>