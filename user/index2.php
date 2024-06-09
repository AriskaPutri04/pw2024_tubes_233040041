<?php

require '../functions.php';
$smkn = query("SELECT * FROM smkn");
?>


<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN</title>
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
        background-color: #C1D3FE;
      }
    </style>
  </head> 

<body id="home">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">SMKN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="#akreditasi">Akreditasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#smkn">SMKN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login.php">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!--Akhir Navbar  -->

 <!-- Jumbotron -->
    <section class="jumbotron text-center">
        <img src="../img/logo3.jpg" class="logox" alt="...">
        <p class="lead" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-duration="1500">Sekolah Menengah kejuruan (SMKN) dengan jurusan Hebat & Siap Kerja</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#c1d3fe" fill-opacity="1" d="M0,128L80,122.7C160,117,320,107,480,133.3C640,160,800,224,960,224C1120,224,1280,160,1360,128L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path> 
        </svg>
    </section> 
<!-- Akhir Jumbotron -->

 <!-- About -->
 <section id="about">
    <div class="container">
        <div class="row text-center mb-4">
          <div class="col">
            <h2>About SMKN Purwakarta</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <p>
                    Sekolah Menengah Kejuruan Negeri (SMKN) di kabupaten Purwakarta terdapat sekolah-sekolah yang Akreditasi bukan hanya A saja, tetapi adapun yang Akreditas B,C.
                </p>
                <p>
                    Berikut Data lengkap SMKN Purwakarta yang BerAkreditasi A,B,C. Dalam data tersebut terdapat alamat sekolah, informasi dan kompetensi keahlian/jurusan disekolah tersebut.
                </p>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill=" #a5c0ff" fill-opacity="1" d="M0,128L80,122.7C160,117,320,107,480,133.3C640,160,800,224,960,224C1120,224,1280,160,1360,128L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg>
 </section>
 <!-- Akhir About -->

  <!-- AKreditasi -->
  <section id="akreditasi">
      <div class="container">
        <div class="row text-center mb-4">
          <div class="col">
            <h2>Akreditasi</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3 text-center">
            <div class="card" data-aos="flip-right" data-aos-duration="500">
              <img src="../img/smkn1pwk.jpg" class="card-img-top" alt="akreditasi-a">
              <div class="card-body">
                <p class="card-text">Sekolah Menengah Kejuruan Negeri (SMKN) di kabupaten Purwakarta dengan Akreditasi</p>
                <a href="smkna.php" class="btn btn-primary">A</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 text-center">
            <div class="card" data-aos="flip-right"data-aos-duration="500" data-aos-delay="100">
              <img src="../img/smkn1sukatanipwk.jpg" class="card-img-top" alt="akreditasi-b">
              <div class="card-body">
                <p class="card-text">Sekolah Menengah Kejuruan Negeri (SMKN) di kabupaten Purwakarta dengan Akreditasi</p>
                <a href="smknb.php" class="btn btn-primary">B</a>
                </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 text-center">
            <div class="card" data-aos="flip-right"data-aos-duration="500" data-aos-delay="200">
              <img src="../img/smknjatiluhurpwk.jpg" class="card-img-top" alt="akreditasi-c">
              <div class="card-body">
                <p class="card-text">Sekolah Menengah Kejuruan Negeri (SMKN) di kabupaten Purwakarta dengan Akreditasi</p>
                <a href="smknc.php" class="btn btn-primary">C</a>
                </div>  
            </div>
          </div>
        </div>
      </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#c1d3fe" fill-opacity="1" d="M0,128L80,122.7C160,117,320,107,480,133.3C640,160,800,224,960,224C1120,224,1280,160,1360,128L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path> 
    </svg>
 </section>
</section>
<!-- Akhir Akreditasi -->

<!--SMKN-->
  <section id="smkn">
    <div class="container">
      <div class="row text-center mb-4">
        <div class="col">
          <h2>SMKN Purwakarta</h2>
        </div>
      </div>
    </div>
    <div class="container" id="container">
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
                <td><img src="../img/<?= $row["gambar"]; ?>" width="100px"></td>
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
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#a5c0ff" fill-opacity="1" d="M0,128L80,122.7C160,117,320,107,480,128C640,149,800,203,960,197.3C1120,192,1280,128,1360,96L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
  </svg>
<!-- Akhir SMKN-->
  
<!-- Footer --> 
 <footer class= " text-white text-center pb-1" style="background-color: rgb(97, 109, 206);">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://www.instagram.com/ar.riska11/" class="text-decoration-none text-white fw-bold">Ariska Putri</a></p>
 </footer>
<!-- Akhir Footer -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>
</body>

</html>