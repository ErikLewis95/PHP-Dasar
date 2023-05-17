

Login System
1. Register
2. Login
3. Session
4. Cookie 

kegunaan SESSION -> pada saat user masuk ke halaman utama web biasanya diarahkan ke index.php secara default lalu ketika user berpindah ke halaman lainnya  atau url lain user bisa juga mengetikkan nama halaman tersebut dan berpindah-pindah kehalaman lain tanpa ada batasan dan walaupun tanpa harus melalui halaman login contoh dari halaman http://localhost/phpdasar/pertemuan13(Login)/index.php pindah ke halaman ubah.php, pindah ke halaman tambah.php dan kehalaman lainnya nah dengan session user tidak akan bisa masuk kehalaman lainnya sebelum masuk dari halaman login

SESSION -> sebuah mekanisme penyimpanan informasi kedalam sebuah variabel agar bisa digunakan di lebih dari satu halaman. biasanya didalam file php data itu hanya bisa digunakan didalam satu halaman saja, kecuali data tersebut dikirimkan datanya (nilai/value dari variable tsbt), pada pertemuan sebelumnya suadah coba menggunakan 2 cara dengan menggunakan GET dan POST kalau data tsbt dikirimkan menggunakan url mengunakan $_GET kalau mengirimkan data menggunakan form menggunkan $_POST tetapi ada cara lain yakni menggunakan SESSION kalau kedua variable supeglobal $_GET dan $_POST hanya mengirimkan data ke 2 halaman tetapi kalau SESSION di semua halaman tetapi ada syaratnya; informasi pada SESSION disimpan di server jadi tidak perlu khawatir soal keamanan datanya; SESSION VS COOKIE -> sama" sebuah informasi/value yang bisa kita gunakan di berbagai halaman tetapi bedahnya kalau SESSION di simpan di SERVER sedangkan COOKIE di simpannya di CLIENT (web browser) COOKIE dipertemuan berikutnya, dengan menggunakan session ini data/ informasi yang kita kelola itu akan ditangani oleh variable superglobals $_SESSION untuk mengisikan data ke dalam $_SESSION ini ada syarat yakni dengan menggunakan session_start() sebelum kita menuliskan syntax HTMLnya pastikan sebelum script php gunakan session_start().

kegunaan COOKIE -> mengenali user; browser bisa mengetahui siapa yang sendang masuk atau mengakses halaman web; shopping cart biasanya digunakan ketika memilih barang yang ingin dibeli dimasukkan ke cart kemudian barang tersebut tidak langsung hilang dicart tapi disimpan di cookie sehingga user dpt memilih barang yang lain atau berpindah" page; personalisasi biasanya digunaka untuk mengetahui kebiasaan user dalam melakukan pencarian di internet; memberikan kenyamanan kepada user contohnya : feature remember me atau ingat saya biasanya user yang tidak ingin repot" masuk ke website atau login dan mereka yakin bahwa itu hanya digunakan olehnya tapi hati" kenyamanan user tersebut bisa menjadi celah keamanan sebab cookie bisa di manipulasi atau edit delete read di php cookie biasa diakses dengan superglobal variabel $_COOKIE, syarat untuk membuat cookie membutuhkan sebuah function setcookie()

LIVESEARCH -> kalau mencari sesuatu di google youtube atau facebook biasanya ada sugestion(saran) di bawahnya, untuk menerapkan fungsi livesearch ini kita menerapkan fungsi ajax(Asynchronous Javascript and XM)

AJAX 
1. Javascript.
2. DOM.

melakukan teknik AJAX jita butuh sebuah objek didalam browser kita yang disebut dgn objek ajax yg disebut dgn XMLHttpRequest()
