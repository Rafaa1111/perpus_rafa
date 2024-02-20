<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$member = queryReadData("SELECT * FROM admin ORDER BY id ");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/member.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Petugas Dan Admin Terdaftar</title>
     <link rel="icon" href="../../assets/book.png" type="image/png">
  </head>
  <body>
    <nav class="navbar fixed-top  shadow-sm">
      <div class="container-fluid p-1">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logo2.png" alt="logo" width="150px">
        </a>
        <div class="pilih">
        <a class="btn btn-tertiary" href="tambahpetugas.php">Tambah Petugas</a>
        <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
        </div>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <!--search engine --->
     <form action="" method="post" class="mt-5">
       <div class="input-group d-flex justify-content-end mb-3">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari data member...">
         <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
       </div>
      </form>
      
      <h3>List Petugas Dan Admin</h3>
      <div class="table-responsive mt-3" >
        <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="list">Id</th>
            <th class="list">nama_admin</th>
            <th class="list">Password</th>
            <th class="list">Kode_admin</th>
            <th class="list">Telepon</th>
            <th class="list">Role</th>
            <th class="list">Delete</th>
          </tr>
        </thead>
      <?php foreach($member as $item) : ?>
      <tr>
        <td><?=$item["id"];?></td>
        <td><?=$item["nama_admin"];?></td>
        <td><?=$item["password"];?></td>
        <td><?=$item["kode_admin"];?></td>
        <td><?=$item["no_tlp"];?></td>
        <td><?=$item["role"];?></td>
        <td>
          <div class="action">
             <a href="deletepetugas.php?id=<?= $item["id"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data  ?');">Delete<i class="fa-solid fa-trash"></i></a>
             <a href="editpetugas.php?id=<?= $item["id"]; ?>" class="btn btn-success" onclick="return confirm('Yakin ingin edit data  ?');">Edit<i class="fa-solid fa-pen-to-square"></i></a>
           </div>
        </td>
       </tr>
      <?php endforeach;?>
    </table>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>