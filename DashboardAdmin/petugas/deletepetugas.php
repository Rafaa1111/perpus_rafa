<?php 
require "../../config/config.php"; 

$petugas = $_GET["id"];
if(deletepetugas($petugas) > 0) {
    echo "<script>
    alert('Member berhasil dihapus!');
    document.location.href = 'petugas.php';
    </script>";
  }else {
    echo "<script>
    alert('Member gagal dihapus!');
    document.location.href = 'petugas.php';
    </script>";
}
?>