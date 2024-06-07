<?php
require '../functions.php';

$keyword = $_GET ["keyword"];

$query = "SELECT *FROM smkn
              WHERE
           nama LIKE '%$keyword%' OR 
           alamat LIKE '%$keyword%' OR
           informasi LIKE '%$keyword%' OR
           akreditasi LIKE '%$keyword%' 
         ";
$smkn = query($query);
?>
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

