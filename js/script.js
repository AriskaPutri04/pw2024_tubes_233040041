// ambil elemen-elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function() {
    
    // buat objek Ajax
    var xhr = new XMLHttpRequest();

    // mengecek kesiapan Ajax
    xhr.onreadystatechange = function() {
        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi Ajax
    xhr.open('GET', 'ajax/smkn.php?keyword=' + keyword.value, true);
    xhr.send();
});