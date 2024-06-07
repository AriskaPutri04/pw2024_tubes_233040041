<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$smkn = query("SELECT * FROM smkn");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Data SMKN Purwakarta</h1>
    <table border="1" cellpadding="10" cellspacing="0">

        <thead>
          <tr class="table">
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Informasi</th>
            <th scope="col">Akreditasi</th>
          </tr>
        </thead>';

    $i = 1;
    foreach( $smkn as $row ) {
        $html .='<tr>
            <td class="nomor" style="text-align:center">'. $i++ .'</td>
            <td><img src="img/' . $row["gambar"] . '"  width="100"></td>
            <td>'. $row["nama"] .'</td>
            <td>'. $row["alamat"] .'</td>
            <td>'. $row["informasi"] .'</td>
            <td style="text-align:center">'. $row["akreditasi"] .'</td>
        </tr>';
    }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-smkn-purwakarta.pdf', 'D'); 

?>

