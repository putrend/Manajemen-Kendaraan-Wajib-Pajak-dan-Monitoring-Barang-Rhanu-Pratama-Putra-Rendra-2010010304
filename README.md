# Project Skripsi Manajemen Kendaraan Wajib Pajak dan Monitoring Barang

Nama    : Rhanu Putra Pratama Putra Rendra
NPM     : 2310010304


Kebutuhan Server :
- PHP 8.* / Versi PHP yang menyesuaikan versi Laravel 11.x
- Database MySQL
- Composer versi terbaru

Langkah Penginstalan :
- Ekstrak dan masuk ke dalam direktori kode pada command prompt.
- Jalankan perintah "composer install".
- Salin berkas ".env.example" dan paste dengan nama ".env".
- Jalankan perintah "php artisan key:generate".
- Buat database untuk digunakan oleh aplikasi ini.
- Konfigurasi file ".env" menjadi seperti :

DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=[Nama Database]   -------->> Diisi dengan nama database <br>
DB_USERNAME=root <br>
DB_PASSWORD= <br>
<br>
- Jalankan perintah "php artisan migrate --seed" untuk melakukan migrasi database.
- Jalankan perintah "php artisan storage:link".
- Mulai server dengan menjalankan perintah "php artisan serve"
- Masuk dengan akun bawaan :
    Username : admin<br>
    Password : 12345
