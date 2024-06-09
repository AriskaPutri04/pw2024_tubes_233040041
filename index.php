<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// paginition     
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count( query("SELECT * FROM smkn") );
$jumlahHalaman = ceil($jumlahData /$jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$smkn = query("SELECT * FROM smkn LIMIT $awalData, $jumlahDataPerHalaman");


// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $smkn = cari($_POST["keyword"]);  
}

?>
    
<!doctype html> 
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMKN Purwakarta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <style>
      body {
        background-color: whitesmoke;
        font-family: "Vollkorn", serif;
      } 
    </style>
  </head>

  <body>
    <nav class="navbar" style="background-color: midnightblue">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="Color: White; font-size: 37px; text-shadow: 3px 3px 3px royalblue">
          <img src="img/logo.jpg" alt="Logo" width="75" height="50" class="d-inline-block align-text-top logo">
          Data SMKN Purwakarta
        </a>
        <div class="wrapper" style="display: flex;">
          <a href="cetak.php" target="_blank" style="Color: White; padding-right: 1rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
            </svg>
          </a>
          <p style="Color: White; padding-right: 1rem;">|</p>
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square-fill" viewBox="0 0 16 16">
              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4 4a.5.5 0 0 0-.374.832l4 4.5a.5.5 0 0 0 .748 0l4-4.5A.5.5 0 0 0 12 6z"/>
            </svg>
            <span>Menu</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="user/index2.php">Halaman User</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <br><br>

    <div class="container">
    <a href="tambah.php">
        <button type="button" class="btn btn-success" style="box-shadow: 2px 2px 2px darkgreen">Tambah Data</button>
        <br>
    </a>

      <nav class="navbar bg-body-tertiary" style="float: right; margin: 1px;">
        <div class="" >
          <form class="d-flex" role="search" action="" method="post" >
            <input class="form-control me-2" type="text" name="keyword" placeholder="Search..." aautocomplete="off" ria-label="Search" id="keyword">
            <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search!</button>
          </form>
          <br>
        </div>
      </nav>

  <div id="container">

      <table class="table table-bordered">
        <thead>
          <tr class="table-dark">
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Informasi</th>
            <th scope="col">Akreditasi</th>
            <th scope="col">Aksi</th>
            
          </tr> 
        </thead>
        <tbody class="table-primary">
          <tr>
              <?php $i = 1; foreach( $smkn as $row ) : ?>
                <tr>
                    <th scope="row" class="table-dark" style="text-align:center"><?= $i++; ?></th>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="150"></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["alamat"]; ?></td>
                    <td><?= $row["informasi"];?></td>
                    <td style="text-align:center"><?= $row["akreditasi"]; ?></td>
                    
                    <td> 
                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="text-decoration-none badge text-bg-warning">ubah</a>  
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin menghapus data ini?');" class="text-decoration-none badge badge text-bg-danger">hapus</a>
                    </td>
                </tr>
              <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
  </div>
  <br>

 <!-- navigasi -->

<nav aria-label="Page navigation example">
  <ul class="pagination">

  <?php if( $halamanAktif > 1) : ?>
      <li class="page-item">
          <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">&laquo;</a>
    </li>
  <?php endif; ?>
  
  <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
      <?php if( $i == $halamanAktif) : ?>
          <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
      <?php else : ?>
         <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
      <?php endif; ?>
  <?php endfor; ?>
  
  <?php if( $halamanAktif < $jumlahHalaman ) : ?>
    <li class="page-item">
        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">&raquo;</a>
    </li>
  <?php endif; ?>
  </ul>
</nav>

    <script src="js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>