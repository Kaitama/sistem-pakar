## Tentang Aplikasi

Aplikasi ini merupakan project Sistem Pakar dengan sekumpulan metode di dalamnya. Aplikasi ini dirancang untuk memenuhi pembelajaran Peminatan Program Skripsi di STMIK Triguna Dharma. Aplikasi ini dapat diunduh secara bebas dan digunakan siapapun dengan ketentuan untuk TIDAK MEMPERJUAL-BELIKAN dalam bentuk apapun.

-   [STMIK Triguna Dharma](https://www.trigunadharma.ac.id).
-   [Laravel](https://laravel.com).
-   [Tailwindcss](https://tailwindcss.com/).

## Metode yang Tersedia

-   [x] Certainty Factor
-   [ ] Teorema Bayes
-   [ ] Dempster Shafer

## Instalasi

1. Download aplikasi local server yang mendukung PHP versi 8.0 seperti [XAMPP](https://www.apachefriends.org/download.html) atau [WAMP Server](https://www.wampserver.com/en/download-wampserver-64bits/) untuk sistem operasi Windows.

2. Download dan install [Composer](https://getcomposer.org/Composer-Setup.exe).
3. Download dan install [Node JS](https://nodejs.org/en/download/).
4. Restart komputer.
5. Jalankan aplikasi **XAMPP Control Panel**, klik tombol `RUN` untuk Apache dan MySQL.
6. Download dan install [Visual Studio Code](https://code.visualstudio.com/Download).
7. Download dan ekstrak project ini pada drive D komputer, rename folder hasil ekstrak menjadi `sistem-pakar`.
8. Jalankan aplikasi **Visual Studio Code**, pilih menu `File` -> `Open Folder` lalu pilih folder `sistem-pakar` hasil download sebelumnya.
9. Pilih menu `Terminal` -> `New Terminal` pada aplikasi **Visual Studio Code** lalu ketik perintah berikut untuk melakukan instalasi paket-paket vendor Laravel:

```
composer update
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

13. Ketik perintah berikut pada terminal **Visual Studio Code** untuk melakukan instalasi Laravel Breeze (fitur login dan register) serta migrasi tabel user menuju database:

```
php artisan breeze:install
npm install
npm run dev
php artisan migrate
```

14. Buka file `config/app.php` lalu ubah pilihan `metode` sesuai pilihan.

15. Ketik perintah berikut pada terminal **Visual Studio Code** untuk menjalankan server:

```
php artisan serve
```

16. Ketik alamat url (biasanya `http://127.0.0.1:8000`) yang tampil pada terminal menuju web browser untuk melihat tampilan aplikasi ini.

## Author

Aplikasi ini dirancang dan dibangun oleh [Khairi Ibnutama, S.Kom., M.Kom](https://kaitama.dev), dosen tetap Yayasan Bina Keluarga Sejahtera, [STMIK Triguna Dharma](https://www.trigunadharma.ac.id).

## Framework

Aplikasi ini dibangun menggunakan framework PHP [Laravel](https://laravel.com).

## Security Vulnerabilitas

Jika anda menemukan bug, error, atau kesalahan perhitungan saat penggunaan aplikasi, mohon untuk menghubungi author di alamat email [mr.ibnutama@gmail.com](mailto:mr.ibnutama@gmail.com).

## License

Aplikasi ini berlisensi "open-sourced software" dibawah [MIT license](https://opensource.org/licenses/MIT).
