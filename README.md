==================================================
Weather Predictions
==================================================

Oleh Bonda Sisephaputra

--------------------------------------------------

Aplikasi "Weather Predictions" ini merupakan aplikasi berbasis web yang berfungsi untuk menampilkan perkiraan cuaca. Data prediksi cuaca diambil dari API yang disediakan pada https://www.metaweather.com/api/. 

Bahasa pemrograman yang digunakan untuk mengembangkan aplikasi ini yaitu PHP dengan framework Codeigniter.

--------------------------------------------------

Aplikasi web ini terdiri dari 3 fitur utama, diantaranya :

- Fitur search untuk mengetahui cuaca kota mana yang ingin dilihat. Misal: Jika kita ingin melihat cuaca di Jakarta, maka cukup search Jakarta dan tampil hasil cuaca di 6 hari terakhir.

- Fitur untuk menyimpan hasil search yang dapat dilihat pada halaman "Saved Search History", hasil search hanya akan tersimpan sementara saja karena data hanya disimpan kedalam session. Data hanya akan tersimpan selama session masih aktif. Aplikasi ini tidak menggunakan database di dalamnya. 

- Fitur pembacaan lokasi otomatis. Fitur ini akan mendeteksi lokasi (kota) anda secara otomatis berdasarkan IP address, fitur ini akan tampil pada halaman utama (index) hanya jika lokasi tempat anda terdaftar di https://www.metaweather.com

--------------------------------------------------

Langkah-langkah untuk menjalankan aplikasi ini:

- Anda dapat menjalankan aplikasi ini secara lokal di komputer anda dengan menginstal Apache Server di komputer anda. Pembuat aplikasi menggunakan XAMPP Apache Server dalam mengembangkan aplikasi ini.

- Copy seluruh script aplikasi (folder "weather") ke dalam direktori dari Apache Server. Sebagai contoh jika anda menggunakan XAMPP maka anda dapat menyalin script pada folder C:\xampp\htdocs atau menyesuaikan lokasi XAMPP anda. Nama folder tempat menaruh file aplikasi bisa berbeda-beda sesuai jenis Apache Server yang anda gunakan.

- Setelah berhasil menyalin script, aktifkan Apache Server anda dan aplikasi sudah dapat diakses melalui browser anda. Secara default aplikasi dapat diakses dengan url http://localhost/weather

- Anda dapat mengubah nama folder project anda sesuai yang anda suka, misalnya anda ingi mengubah nama folder dari "weather" menjadi ramalan_cuaca. Apabila anda merubah nama folder aplikasi maka anda harus melakukan sedikit perubahan pada script aplikasi. Buka file config.php yang terdapat dalam folder application/config/ dan ubahlah script pada baris ke 27 dari $config['base_url'] = 'http://localhost/weather'; menjadi $config['base_url'] = 'http://localhost/ramalan_cuaca'; dan jangan lupa simpan perubahan file tersebut. Setelah perubahan tersebut maka anda dapat mengakses aplikasi ini dengan alamat url http://localhost/ramalan_cuaca.

- Jika anda ingin mengupload aplikasi ke dalam server web atau server hosting anda, caranya hampir sama dengan cara sebelumnya yaitu anda juga harus menyesuaikan isi script config.php baris ke 27 sesuai dengan alamat domain yang anda gunakan. Contohnya diubah menjadi $config['base_url'] = 'http://namadomain'; 