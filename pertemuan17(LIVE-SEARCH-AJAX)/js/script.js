//ambil element2 yang dibutuhkan 
//javascript tolong carikan saya element yang punya id keyword yang ada didalam dokumen kalau ketemu element tersebut masuk kedalam variable keyword
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//sebelum menjalankan ajax kita membutuhkan triger / sebuah aksi yang kita lakuakan untuk menjalankan ajaxnya misal: ketika kita pencet sbuah tombol, ketika kita ganti sebuah element ketika memasukkan sesuatu di input, ketika load halaman; kalau di javascript namanya event; jadi kita menjalankan ajax pada saat event tertentu dijalankan
//contoh event: 1. click 2. dbclick(double klik) 3.mouseover(ketika kursor di arahkan ke elemennya akan muncul pesan) 4. keypressed(ketika kita mengetik sessuatu di dalam inputnya ) 5. keyup(ketika kita melepaskan tangan dari keyboard)

//javascript carikan saya element tombolCari kalau ketemu ketika tombolnya di click jalankan fungsinya;
// tombolCari.addEventListener('mouseover', function() {
//         alert('BERHASIL!!');
// });

//tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
//   ambil inputnya, value apapun yang diketikkan oleh user cara lihat klik kanan browser lalu ketikkan kesuatu di input lihat inspect konsol 
    // console.log(keyword.value)
    
    //buat object ajax
    var xhr = new XMLHttpRequest();

    //mengecek kesiapan ajax
    xhr.onreadystatechange = function(){
        //readyState->nilainya antara 0-4, 0=>initialisasi, 1=>membuka koneksi dll, status = 200 artinya HTTP status code 
        if ( xhr.readyState == 4 && xhr.status == 200){
            // responseText-> berisi apapun isi dari sumbernya dalam hal ini mahasiswa.php
            // console.log(xhr.responseText);
            //ganti isi yang ada di container dengan apapun sumber responnya dalam has ini ajax/mahasiswa.php
            container.innerHTML = xhr.responseText;
        }
    }
        //eksekusi ajax
        //parameter 1. methodnya mau apa GET atau POST, 2 sumber datanya dari mana, 3. mau synch atau asynch kalau true asynch kalau false "synch" kalau synch apabedanya gk pake ajax 
        //mengirimkan data di url ke mahasiswa.php
        xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
        xhr.send();

});


