# LaraSocketIO with Redis

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="350">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo-redis.svg/2560px-Logo-redis.svg.png" width="350">
  <img src="https://cdn.icon-icons.com/icons2/2699/PNG/512/socketio_logo_icon_168806.png" width="350">
</p>

Aplikasi ini merupakan contoh implementasi Laravel dengan Redis dan Socket.IO. Membuat aplikasi real-time yang responsif dan efisien.

## Alur Schema

![Scheme](readme/schema.jpg)

## Langkah-langkah Penggunaan

### 1. Instalasi Dependensi

```bash
composer install
npm install
```

### 2. Jalankan Redis Server

Pastikan Redis sudah terpasang, kemudian jalankan server dengan perintah:

```bash
redis-server
```

### 3. Jalankan Socket.IO

Jalankan server Socket.IO dengan perintah:

```bash
node socket.js
```

### 4. Jalankan Laravel Server

Terakhir, jalankan server Laravel dengan perintah:

```bash
php artisan serve
```

## Tahap Uji Coba

Setelah tahap persiapan selesai, sekarang saatnya untuk menguji aplikasi ini.

### Langkah 1: Buka Browser Chrome

Buka browser Chrome dengan dua profile yang berbeda.

### Langkah 2: Buka URL Admin

Di salah satu browser, buka URL admin:

[http://localhost:8000/admin](http://localhost:8000/admin)

### Langkah 3: Buka URL Client

Di browser lain, buka URL client:

[http://localhost:8000/client](http://localhost:8000/client)

### Tampilan Uji Coba

![Demo](readme/demo.gif)

Dengan langkah-langkah di atas, Anda sekarang dapat menguji aplikasi LaraSocketIO with Redis. Selamat mencoba! 🚀
