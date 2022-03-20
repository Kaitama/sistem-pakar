## Tentang Aplikasi

Aplikasi ini merupakan project Sistem Pakar dengan sekumpulan metode di dalamnya. Aplikasi ini dirancang untuk memenuhi pembelajaran Peminatan Program Skripsi di STMIK Triguna Dharma. Aplikasi ini dapat diunduh secara bebas dan digunakan siapapun dengan ketentuan untuk TIDAK MEMPERJUAL-BELIKAN dalam bentuk apapun.

-   [STMIK Triguna Dharma](https://www.trigunadharma.ac.id).
-   [Khairi Ibnutama, S.Kom., M.Kom](https://kaitama.dev).

## Metode yang Tersedia

1. Certainty Factor (done).

## Instalasi

1. Download aplikasi local server yang mendukung PHP versi 8.0 seperti [XAMPP](https://www.apachefriends.org/download.html) atau [WAMP Server](https://www.wampserver.com/en/download-wampserver-64bits/) untuk sistem operasi Windows.

2. Download dan install [Composer](https://getcomposer.org/Composer-Setup.exe).
3. Download dan install [Node JS](https://nodejs.org/en/download/).
4. Restart komputer.
5. Jalankan aplikasi XAMPP Control Panel, klik tombol RUN untuk Apache dan MySQL.
6. Jalankan aplikasi Command Prompt (CMD), ketik perintah berikut untuk pindah ke drive D:

```
D:
```

7. Download dan ekstrak project ini pada drive D komputer, rename folder hasil ekstrak menjadi "sistem-pakar".
8. Ketik perintah berikut pada CMD untuk masuk ke direktori project:

```
cd sistem-pakar
```

9. Ketik perintah berikut pada CMD untuk melakukan instalasi paket-paket vendor Laravel:

```
composer install
```

10. Buka web browser, ketikkan alamat [http://localhost/phpmyadmin](http://localhost/phpmyadmin) lalu buat database baru dengan nama `pakar`.
11. Buka folder project `sistem-pakar` pada aplikasi Text Editor [Visual Studio Code](https://code.visualstudio.com/Download) atau [Sublime Text](https://www.sublimetext.com/download).
12. Ubah nama (rename) file `.env.example` menjadi `.env` lalu edit bagian database seperti berikut:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pakar
DB_USERNAME=root
DB_PASSWORD=
```

13. Ketik perintah berikut pada CMD untuk melakukan instalasi Laravel Breeze (fitur login dan register) serta migrasi tabel user menuju database:

```
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

14. Ketik perintah berikut pada CMD untuk menjalankan server:

```
php artisan serve
```

15. Ketik alamat yang tampil pada CMD menuju web browser untuk melihat tampilan aplikasi ini.

## Author

Aplikasi ini dirancang dan dibangun oleh [Khairi Ibnutama, S.Kom., M.Kom](https://kaitama.dev), dosen tetap Yayasan Bina Keluarga Sejahtera, [STMIK Triguna Dharma](https://www.trigunadharma.ac.id).

## Framework

Aplikasi ini dibangun menggunakan framework PHP [Laravel](https://laravel.com).

## Security Vulnerabilitas

Jika anda menemukan bug, error, atau kesalahan perhitungan saat penggunaan aplikasi, mohon untuk menghubungi author di alamat email [mr.ibnutama@gmail.com](mailto:mr.ibnutama@gmail.com).

## License

Aplikasi ini berlisensi "open-sourced software" dibawah [MIT license](https://opensource.org/licenses/MIT).
