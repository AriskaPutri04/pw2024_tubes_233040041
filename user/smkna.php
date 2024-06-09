<?php
require '../functions.php';
$smkn = query("SELECT * FROM smkn WHERE id_akreditasi = 1");

if( isset($_POST["cari"]) ) {
    $smkn = cari($_POST["keyword"]);  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN Purwakarata Akreditasi A</title>
    <link rel="stylesheet" href="../css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <style>
      body {
        font-family: "Merienda", cursive;
        background-color: #a5c0ff;
      }
    </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Data SMKN Purwakarta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="index2.php#akreditasi" style="Color: White;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16" style="Color: White">
                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5"/>
                    </svg>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!--Akhir Navbar  -->

<!--SMKN-->
<section>
    <div class="container" id="container">
        <div class="row fs-5 SMK">
            <div class="col text-center">
                <h2 class="SMK" style="color:white; text-shadow: 3px 3px 3px royalblue">Data SMKN Purwakarta Akredirasi A</h2>
                <br>
            </div>
    </div>
    
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
            
          </tr> 
        </thead>
        <tbody class="table-primary">
          <tr>
              <?php $i = 1; foreach( $smkn as $row ) : ?>
                <tr>
                    <th scope="row" class="table-dark" style="text-align:center"><?= $i++; ?></th>
                    <td><img src="../img/<?= $row["gambar"]; ?>" width="100px" ></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["alamat"]; ?></td>
                    <td><?= $row["informasi"];?></td>
                    <td style="text-align:center"><?= $row["akreditasi"]; ?></td>
                </tr>
              <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
  </div> 
</section>
<!--Akhir SMKN-->
</body>

</html>