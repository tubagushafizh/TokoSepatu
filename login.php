<?php 
  include 'layout/header.php';
?>

<div class="container" style="padding-bottom: 250px;">
<h2 style="width: 100%; border-bottom: 4px solid #ff8680"><b>Login</b></h2>
  <form action="proses/login.php" method="post"> 
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" style="width:500px">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" style="width: 500px">
    </div>

    <button type="submit" class="btn btn-success">Login</button>
    <a href="register.php" class="btn btn-primary">Register</a>
  </form>
</div>

<?php 
  include 'layout/footer.php'; 
?>