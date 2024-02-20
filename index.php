<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Buku Bijak!</title>
    <link rel="icon" href="assets/book.png" type="image/png">
  </head>
  <body>
    <!--Navbar-->
   <nav class="navbar fixed-top navbar-expand-lg  shadow-sm justify-space-between">
  <div class="container-fluid">
    <img src="assets/logo2.png" alt="logo" width="150px">

    <div class="dropdown">
          <button class="btn btn-light " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars"></i>
          </button>
        <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
          <li>
            <a class="dropdown-item text-center p-2 bg-primary text-light rounded mb-2" href="sign/link_login.html">Sign in <i class="fa-solid fa-sign-in"></i></a>
          </li>
          <li>
            <a class="dropdown-item text-center p-2 bg-info text-light rounded" href="sign/member/sign_up.php">Register <i class="fa-solid fa-address-card"></i></a>
          </li>
          </ul>
        </div>
  </div>
</nav>

    <section id="homeSection" class="p-5">
      <div class="d-flex flex-wrap justify-content-center">
        <div class="col mt-5">
        <div class="textcol">
         <h2 class="text">Selamat Membaca</h2>
         </div>
          <a class="btn btn-primary" href="sign/link_login.html">Get started</a>
          <?php 
          require "config/config.php";
          // query read semua buku
          $buku = queryReadData("SELECT * FROM buku ORDER BY id_buku DESC");
          //search buku
          if(isset($_POST["search"]) ) {
            $buku = search($_POST["keyword"]);
          }
          //read buku informatika
          if(isset($_POST["informatika"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'informatika'");
          }
          //read buku bisnis
          if(isset($_POST["bisnis"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'bisnis'");
          }
          //read buku filsafat
          if(isset($_POST["filsafat"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'filsafat'");
          }
          //read buku novel
          if(isset($_POST["novel"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'novel'");
          }
          //read buku sains
          if(isset($_POST["sains"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'sains'");
          }
          ?>
<style>
    .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
    }
  </style>
  <!--Btn filter data kategori buku-->
  <div class="d-flex gap-2 mt-2 justify-content-center">
      <form action="" method="post">
        <div class="layout-card-custom">
         <button class="btn btn-outline-primary" type="submit">Semua</button>
         <button type="submit" name="informatika" class="btn btn-outline-primary">Informatika</button>
         <button type="submit" name="bisnis" class="btn btn-outline-primary">Bisnis</button>
         <button type="submit" name="filsafat" class="btn btn-outline-primary">Filsafat</button>
         <button type="submit" name="novel" class="btn btn-outline-primary">Novel</button>
         <button type="submit" name="sains" class="btn btn-outline-primary">Sains</button>
         </div>
        </form>
       </div>
       
       <form action="" method="post" class="mt-2">
       <div class="input-group d-flex justify-content-end mb-5">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari judul atau kategori...">
         <button class="border border-start-3 bg-outline-primary rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
         
       </div>
      </form>
      
      <!--Card buku-->
    <div class="layout-card-custom">
       <?php foreach ($buku as $item) : ?>
       <div class="card" style="width: 10rem;">
         <a href="sign/member/sign_in.php"><img src="imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="200px"></a>
         <div class="card-body">
           <h6 class="card-title"><?= $item["judul"]; ?></h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
          </ul>
        </div>
       <?php endforeach; ?>
      </div>
      </div>
    </section>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>