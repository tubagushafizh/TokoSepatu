<?php 
  include 'layout/header.php';
?>

<div class="container" style="padding-bottom: 250px;">
  <h2 style="width: 100%; border-bottom: 4px solid #ff8680"><b>Register</b></h2>
  <form action="proses/register.php" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
        </div>        
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="email">email</label>
          <input type="text" class="form-control" id="email" placeholder="Email" name="email"required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
        </div>
      </div>
      <div class="col-md-6">
        <label for="telp">Nomor Telepon</label>
        <input type="text" class="form-control" id="telp" placeholder="Nomor Telepon" name="telp"required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="repassword">Konfirmasi Password </label>
          <input type="password" class="form-control" id="repassword" placeholder="Konfirmasi Password" name="repassword" required>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-success">Daftar</button>
  </form>
</div>

<?php 
  include 'layout/footer.php'; 
?>