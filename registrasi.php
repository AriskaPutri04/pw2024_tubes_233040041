<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "<script> 
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
             </script>";
    } else {
        echo "
        <script>
            alert('user baru gagal ditambahkan!');
            document.location.href = 'registrasi.php';
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
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        label {
            display: block;
        }

        body {
           background-color: steelblue;
            margin: 125px 0;
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


    <div class="container col-4">
    <h1 style="Color: White; text-shadow: 4px 4px 4px blue">Halaman Registrasi</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Username :</label>
            <input type="text" class="form-control" name="username" id="username" style="box-shadow: 1px 1px 1px blue">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Password :</label>
            <input type="password" class="form-control" name="password" id="password" style="box-shadow: 1px 1px 1px blue">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label" style="color: white; font-size:18px; text-shadow: 4px 4px 4px blue">Konfirmasi Password :</label>
            <input type="password" class="form-control" name="password2" id="password2" style="box-shadow: 1px 1px 1px blue">
        </div>
            <button tyepe="submit" class="btn btn-success" name="register">Register!</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>