<div align="center">
   <h1>
      Coding Test Laravel
   </h1>
</div>

## How to use
1. Clone repository ini
2. setelah itu masuk ke folder, dan ketik di terminal `composer install` agar file bisa digunakan
3. Rubah file `.env.example` menjadi `.env`, kemudian ketik di terminal `php artisan key:generate` untuk menginisialisasi KEY
4. isi data berikut di file `.env` sesuai dengan db yang dibuat
	```env
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=nama_database
	DB_USERNAME=username_phpmyadmin (biasanya root)
	DB_PASSWORD=
	```
5. setelah sukses, tambahkan tabel dengan migrate, caranya adalah dengan ketik di terminal `php artisan migrate`
6. Untuk menambahkan data dummy, maka tambahkan seeder, dengan cara ketik di terminal `php artisan db:seed`
7. Aplikasi dapat digunakan 😊

## Authentifikasi

Username : test@gmail.com <br>
Password : test

## Screenshot

<img src="./1. Dashboard.png">
<p align="center">Dashboard<p>

<br>

<img src="./2. Kategori Barang.png">
<p align="center">Kategori Barang<p>

<br>

<img src="./3. Barang.png">
<p align="center">Barang<p>

<br>

<img src="./4. Item Sales.png">
<p align="center">Item Sales<p>

<br>

<img src="./5. Laporan Penjualan.png">
<p align="center">Laporan Penjualan<p>

<br>

<img src="./6. Soal 2.png">
<p align="center">Soal 2<p>

<br>

<img src="./7. Hasil Soal 2.png">
<p align="center">Hasil Soal 2<p>

<br>
