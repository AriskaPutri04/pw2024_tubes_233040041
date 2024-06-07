<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek data berhasil ditambahkan atau tidak
    if ( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'index.php';
        </script> 
        ";
    }  
      
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Purwakarta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <style>
        body {
           background-color: steelblue;
            margin: 50px 0;
            font-family: "Playfair Display", serif;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        h1 {
            text-align: center;
            text-shadow: 2px 2px 2px blue;
            margin-bottom: 20px;
        }

        button {
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 2px 2px 2px darkgreen;
        }
    </style>
</head>

<body>

    <div class="container col-7">
    <h1 style="Color: White; text-shadow: 4px 4px 4px blue">Tambah Data SMKN</h1>
   
   <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Nama :</label>
            <input type="text" class="form-control" name="nama" id="nama" style="box-shadow: 1px 1px 1px blue"
            required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Alamat : </label>
            <input type="text" class="form-control" name="alamat" id="alamat" style="box-shadow: 1px 1px 1px blue"
            required>
        </div>   
        <div class="mb-3">
            <label for="informasi" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Informasi : </label>
            <input type="text" class="form-control" name="informasi" id="informasi" style="box-shadow: 1px 1px 1px blue"
            required>
        </div>
        <div class="mb-3">
            <label for="akreditasi" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Akreditasi : </label>
            <input type="text" class="form-control" name="akreditasi" id="akreditasi" style="box-shadow: 1px 1px 1px blue"
            required>
        </div>
        <div class="mb-3"> 
            <label for="gambar" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Gambar : </label>
            <input class="form-control form-control-sm" type="file" name="gambar" id="gambar" style="box-shadow: 1px 1px 1px blue"
            required>
        </div>
            <button type="submit" name="submit" class="btn btn-success">Tambah Data</button>
   </form>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>