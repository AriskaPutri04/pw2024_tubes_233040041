<?php 
// Koneksi ke Database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040041'); 

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $informasi = htmlspecialchars($data["informasi"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar) {
        return false;
    }

    $query = "INSERT INTO smkn
                VALUES 
                (NULL, '$nama', ' $alamat', ' $informasi', '$akreditasi', '$gambar')
              ";
    mysqli_query($conn, $query);  

    return mysqli_affected_rows($conn);
}


function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek tidak ada gambar yang diuploadkan
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false; 
    }

    // cek yang diupload adalah gambar 
    $ekstensiGambarValid = ['jpg','jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('Yang anda upload bukan dalam bentuk gambar!');
              </script>";
        return false; 
    } 

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
        alert('Ukuran gambar terlalu besar!');
      </script>";
        return false;
    }

    // setelah pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .=$ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;   
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM smkn WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $informasi = htmlspecialchars($data["informasi"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
   
    // cek apakah user pilih gambar baru atau lama
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
       
    $query = "UPDATE smkn SET
                nama = '$nama',
                alamat = '$alamat',
                informasi = '$informasi',
                akreditasi = '$akreditasi', 
                gambar = '$gambar'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);  

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM smkn 
                WHERE
               nama LIKE '%$keyword%' OR 
               alamat LIKE '%$keyword%' OR
               informasi LIKE '%$keyword%' OR
               akreditasi LIKE '%$keyword%' 
            ";
    return query($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 =  mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
             </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;

    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan user baru ke database
    mysqli_query( $conn, "INSERT INTO user VALUES(NULL,'$username', '$password')" );

    return mysqli_affected_rows($conn);
}

?>