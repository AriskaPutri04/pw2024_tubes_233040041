<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id =$id");
    $row = mysqli_fetch_assoc($result);

    // cek coookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember']) ) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");  
            exit; 
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <style>
        * {
            top: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url(img/bg-login.jpg);
            margin: 70px 0;
            font-family: "Playfair Display", serif;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        img{
            height: 50%;
            width: 50%;
            border-radius: 45%;
            box-shadow: 2px 3px 6px dodgerblue;
            margin-bottom: 7px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            color: darkblue;
            text-align: center;
            text-shadow: 3px 3px 3px skyblue;
            margin-bottom: 10px;
        }

        .nav {
            justify-content: center;
            padding-bottom: 1rem;
        }

        .button {
            margin: -2rem 0 0 60rem;
        }

        .button .btn {
            float: right;
            background-color: darkblue;
            top: 0;
            margin: 0;
            border-radius: 5px;
            box-shadow: 2px 2px 2px navy;  
        }

        .button .btn a {
            text-decoration: none;
            color: #fff; 
        }     
    </style>
</head>

<body>
  <nav class="nav">
    <div class="button">
        <button class="btn" id="register">
            <a href="registrasi.php">Registrasi</a>
        </button>
    </div>
  </nav>

`   <div class="container col-5">
    <h1>SMKN Purwakarta</h1>
    <img class="logo1" src="img/logo1.jpg" alt="">   

    <?php if( isset($error) ) : ?>
        <p style="color:red; font-style: italic; font-size: 18px;  text-shadow: 2px 2px 2px white">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
            <div class="mb-2">
                <label for="username" class="form-label" style="color: darkblue; font-size:20px; text-shadow: 4px 4px 4px deepskyblue">Username :</label>
                <input type="text" class="form-control" name="username" id="username" style="box-shadow: 2px 2px 3px dodgerblue">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label" style="color: darkblue; font-size:20px; text-shadow: 4px 4px 4px deepskyblue">Password :</label>
                <input type="password" class="form-control" name="password" id="password" style="box-shadow: 2px 2px 3px dodgerblue">
            </div>
            <div class="mb-2 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" style="box-shadow: 2px 2px 3px dodgerblue">
                <label  class="form-check-label" for="remember" style="color: silver; font-size:18px; text-shadow: 3px 3px 3px dodgerblue">Remember me</label>
            </div>
                <button type="submit" class="btn btn-primary" name="login">Login Here!</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>