# crud PHP

di kesempatan kali ini saya belajar membuat CRUD Sederhana menggunakan PHP

walau penulisannya masih sangat berantakan, tapi tidak masalah karna saya  akan terus berkembang sampai dapat membuat program seperti apa yang saya inginkan.

# $_SESSION

$_SESSION berfungsi sebagai penanda dari sebuah sesi di halaman
session pada php di tandai dengan <session_start();> pada code halaman paling atas
session dapat di hilangkan dengan Close Browser atau dengan cara manual <session_destroy()>

# $_COOKIE

$_COOKIE biasanya di gunakan untuk mengenali user, shooping chart, personalize dsb.
"Kenyamanan itu berbanding terbalik dengan keamanan" ~ WPU.

untuk memulai cookie gunakan <setcookie();>
contoh penggunaan cookie: setcookie('keynya_apa','value_apa')

# Perbedaan Cookie dengan Session;
jika session hanya berlaku untuk satu kali sesi saja, dan akan berakhir ketika browsernya di close atau pc nya di matikan. sedangkan cookie akhir dari sesinya dapat di tentukan secara manual dengan hitungan "s" atau Detik.