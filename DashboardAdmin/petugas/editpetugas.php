<?php
require '../../config/config.php';
$id = $_GET['id'];
if (isset($_POST["tombol"])) {
   if (editPetugas($_POST, $id) > 0) {
    echo "<script>
    alert('Berhasil edit petugas!'); window.location='petugas.php';
    </script>";
   } else {
      echo "<script>
    alert('Gagal update petugas!');
    </script>";
   }
}
$admin = queryReadData("SELECT * FROM admin WHERE id=$id");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Tambah Petugas</title>
     <link rel="icon" href="../../assets/book.png" type="image/png">
    </head>
  <body>
  <div class="container">
    <div class="card p-3 mt-5" style="height: 750px;">
      <div class="position-absolute top-0 start-50 translate-middle">
        <img src="../../assets/user.png" class="" alt="adminLogo" width="85px">
      </div>
      <h1 class="pt-5 text-center fw-bold">Tambah Petugas</h1>
      <hr>
    <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
    <?php foreach($admin as $item){ ?>
    <label for="validationCustom01" class="form-label">Nama Admin</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
    <input type="text" class="form-control" name="nama" id="validationCustom01" required VALUE="<?= $item["nama_admin"]; ?>">
    <div class="invalid-feedback">
        Masukkan Nama anda!
    </div>
  </div>
  <label for="validationCustom02" class="form-label">Password</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
    <input type="password" class="form-control" id="validationCustom02" name="password" required VALUE="<?= $item["password"]; ?>">
    <div class="invalid-feedback">
        Masukkan Password anda!
    </div>
  </div>

  <label for="validationCustom02" class="form-label">Kode Admin</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-star"></i></span>
    <input type="text" class="form-control" id="validationCustom02" name="kode_petugas" required VALUE="<?= $item["kode_admin"]; ?>">
    <div class="invalid-feedback">
        Masukkan Kode Admin anda!
    </div>
  </div>

  <label for="validationCustom02" class="form-label">No Telepon</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
    <input type="number" class="form-control" id="validationCustom02" name="no_tlp" required VALUE="<?= $item["no_tlp"]; ?>">
    <div class="invalid-feedback">
        Masukkan No Telepon anda!
    </div>
  </div>

  <label for="validationCustom02">Role </label>
  <div class="col input-group mb-2">
  <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-users"></i></label>
  <select class="form-select"  id="inputGroupSelect01"  name="role" >
    <option VALUE="<?= $item["role"]; ?>"><?= $item["role"]; ?></option>
    <option value="petugas">Petugas</option>
    <option value="admin">Admin</option>
    </select>
    <?php } ?>
  </div>
  
  <div class="col-12" style="margin-top: 50px ;">
    <button class="btn btn-primary" type="submit" name="tombol">Edit</button>
    <a class="btn btn-primary" href="petugas.php">Batal</a>
  </div>
</form>
</div>
<?php if(isset($error)) : ?>
    <div class="alert alert-danger mt-2" role="alert">Nama atau Password Salah!</div>
<?php endif; ?>
  </div>
  
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>