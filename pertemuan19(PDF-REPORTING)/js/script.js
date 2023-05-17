//sebelum menulis dengan jquery
// $(document) = jQuery(document)
// javascript tolong carikan saya element html di index yang idnya keyword? harusnya ada jika pemanggilan javascriptnya dibuat dibawah element html di index karena awalnya element tersebut terlebih dahulu di load ke memory tapi jika <script src="js/jquery-3.6.4.min.js"></script> dibuat diatas/head tanpa menggunakan jquery element tersebut tidak bisa di cari/dibaca oleh javascriptnya. contoh synyax mencari elemetn di javascipt:
// var keyword = document.getElementById('keyword');//setelah element html di load ke memory maka baru bisa menjalankan syntax ini yang artinya javascript tolong carikan saya element yang id nya keyword maka akan ada

// keyword.addEventListener("keyup", function(){
//     console.log('ok');
// });// kalau ini di inspect dan lihat di console maka akan muncul ok ketika kita mengetik apapun di input ketika script src dibawah jika di head maka tidak akan dapat dibaca harus menngunakan jquery seperti yang dibawah ini.

$(document).ready(function(){//jquery tolong cari document/apapun itu, ketika document itu siap/ready jalankan fungsi berikutnya

//   var keyword = document.getElementById("keyword");
// keyword.addEventListener("keyup", function(){
//   console.log('oke BANGET');
// }); // lakukan ini semua ketika halamannya sudah ready meskipun kita tulis di dalam head html begitu scriptnya membaca $(document).ready(function(){} sebelum semua dokumennya yang ada di html di load semua ke dalam memory.

//hilangkan tombol cari
$("#tombol-cari").hide();
//masuk ke ajax dengan menggunakan jquery scriptnya akan lebih ringkas


//event ketika keyword ditulis kalau di pertemuan sebelumnnya addEventListener("keyup")
//Jquery tolong carikan saya element keyword cara penulisan event menggunakan on 'keyup' ketika tombol dilepas jalankan fungsinya

$('#keyword').on('keyup', function(){
  
  //munculkan icon loading
  $('.loader').show();
  
  //ajax menggunakan load
  // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
//jquery cari element container lalu load/ubah isinya dari data yang kita ambil dari sumber mahasiswa.php lalu kirimkan data keywordnya di isi dengan apapun yang diketikkan oleh usernya, kalau dijavascript .value kalau jquery .val()

//fungsi load mempunyai keterbatasan karena dia hanya bisa menggunakan get aja kalau menggunakan post tidak bisa harus menggunakan fungsi ajax yang lain

     $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
$('#container').html(data);
$('.loader').hide();


     });

});

});



