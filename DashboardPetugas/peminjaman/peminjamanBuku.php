<?php
// Halaman pengelolaan peminjaman buku perpustakaan
require "../../config/config.php";
session_start();
$dataPeminjam = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, member.kelas, member.jurusan, peminjaman.id_admin,  peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian,peminjaman.status
FROM peminjaman 
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku");

if (isset($_POST['submit'])) {
   accBuku($_POST['status']);
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
     <title>Kelola peminjaman buku || Petugas</title>
     <link rel="icon" href="../../assets/book.png" type="image/png">
  </head>
  <body>
    
  <nav class="navbar fixed-top shadow-sm">
      <div class="container-fluid p-1">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logo2.png" alt="logo" width="150px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardPetugas.php">Dashboard</a>
      </div>
    </nav>

    <div class="p-4 mt-5">
  
    <div class="mt-5">
    <h3>List Of Peminjaman</h3>
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="list">Id Peminjaman</th>
            <th class="list">Id Buku</th>
            <th class="list">Judul Buku</th>
            <th class="list">Nisn Siswa</th>
            <th class="list">Nama siswa</th>
            <th class="list">Kelas</th>
            <th class="list">Jurusan</th>
            <th class="list">Id Admin</th>
            <th class="list">Tanggal Peminjaman</th>
            <th class="list">Tanggal Pengembalian</th>
            <th class="list">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($dataPeminjam as $item) : ?>
               <?php if ($item['status'] == 'tidak') { ?>
               <tr>
                  <td><?= $item["id_peminjaman"]; ?></td>
                  <td><?= $item["id_buku"]; ?></td>
                  <td><?= $item["judul"]; ?></td>
                  <td><?= $item["nisn"]; ?></td>
                  <td><?= $item["nama"]; ?></td>
                  <td><?= $item["kelas"]; ?></td>
                  <td><?= $item["jurusan"]; ?></td>
                  <td><?= $item["id_admin"]; ?></td>
                  <td><?= $item["tgl_peminjaman"]; ?></td>
                  <td><?= $item["tgl_pengembalian"]; ?></td>
                  <td>
                     <form action="" method="post">
                        <input type="hidden" value="<?= $item["id_peminjaman"]; ?>" name="status">
                        <button type="submit" id="status" name="submit" class="btn btn-outline-primary">Terima</button>
                     </form>
                  </td>
               </tr>
               <?php } else { ?>
               <?php continue; ?>
               <?php } ?>
               <?php endforeach; ?>
               </tbody>
    </table>
    </div>
    </div>
  </div>
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>