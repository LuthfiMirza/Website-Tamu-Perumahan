# 3. PEMBAHASAN

## 3.1. Deskripsi Aplikasi

Aplikasi sistem admin tamu perumahan berbasis website ini merupakan solusi digital untuk mengelola data kunjungan tamu di lingkungan perumahan. Aplikasi ini dirancang sebagai pengganti sistem pencatatan manual yang konvensional untuk meningkatkan efisiensi dan akurasi dalam pengelolaan data tamu. 

Aplikasi ini dilengkapi dengan dua interface utama yaitu admin (administrator) dan satpam (petugas keamanan) sehingga pengguna dapat memilih role sesuai dengan kebutuhan dan tanggung jawab masing-masing. Dengan memanfaatkan teknologi web modern dan framework Laravel, sistem ini menyediakan fitur-fitur seperti pencatatan tamu, monitoring real-time, export data, dan manajemen pengguna yang terintegrasi dalam satu platform.

Untuk pengguna satpam, mereka dapat melakukan login ke dalam sistem menggunakan akun yang telah terdaftar, kemudian dapat mengelola data tamu mulai dari pendaftaran tamu baru, pencatatan waktu masuk dan keluar, hingga monitoring aktivitas tamu secara real-time melalui dashboard yang informatif.

## 3.2. Perencanaan

Pada tahap ini dilakukan proses perencanaan kebutuhan pengguna dan pengambilan data untuk memastikan sistem yang dikembangkan sesuai dengan kebutuhan operasional perumahan.

### 3.2.1. Kebutuhan Pengguna

Aplikasi sistem admin tamu perumahan berbasis website ini dibuat untuk memenuhi kebutuhan pengelolaan data tamu di lingkungan perumahan secara digital dan efisien. Diharapkan dengan adanya sistem ini, petugas keamanan dapat melakukan pencatatan dan monitoring tamu dengan lebih efektif, akurat, dan dapat menghasilkan laporan yang diperlukan untuk keperluan administrasi dan keamanan perumahan.

### 3.2.2. Pengambilan Data
Pengambilan data pada penelitian ini dilakukan melalui wawancara dengan petugas keamanan perumahan yang menangani proses pencatatan tamu sehari-hari. Kemudian dilakukan pengamatan langsung untuk mengetahui alur kerja sistem yang berjalan saat ini, kendala yang dihadapi, dan kebutuhan fitur yang diperlukan untuk meningkatkan efisiensi operasional.

## 3.3. Analisis

Setelah data terkumpul, untuk mengetahui apa saja yang diperlukan dalam perancangan aplikasi ini maka dibutuhkan analisis kebutuhan. Analisis kebutuhan meliputi fungsional dan non-fungsional. Analisis fungsional adalah tentang informasi dan data apa saja yang dibutuhkan untuk ditampilkan ke dalam aplikasi. Sedangkan analisis non-fungsional menjelaskan tentang perangkat yang dijadikan target aplikasi.

### 3.3.1. Analisis SWOT

Berikut adalah hasil dari analisis SWOT aplikasi sistem admin tamu perumahan berbasis web menggunakan metode perencanaan SWOT:

**Strength (Kekuatan)**
- Mudah diakses melalui web browser dari berbagai perangkat
- Fleksibel dibandingkan dengan sistem pencatatan manual
- Dapat mengunduh file rekap data tamu dalam bentuk PDF maupun Excel
- Interface yang user-friendly dan responsif
- Sistem keamanan dengan autentikasi pengguna
- Real-time monitoring dan dashboard informatif

**Weakness (Kelemahan)**
- Ketergantungan pada koneksi internet untuk akses optimal
- Memerlukan pelatihan awal untuk pengguna yang belum familiar dengan sistem digital
- Website masih memerlukan pengembangan fitur lanjutan seperti notifikasi real-time
- Belum terintegrasi dengan sistem keamanan fisik seperti CCTV

**Opportunity (Peluang)**
- Fitur yang terdapat pada aplikasi ini masih bisa dikembangkan dan disempurnakan seperti integrasi QR Code, sistem persetujuan tamu, dan aplikasi mobile
- Potensi integrasi dengan sistem smart home dan IoT
- Pengembangan fitur analytics dan reporting yang lebih advanced
- Implementasi sistem notifikasi real-time untuk warga

**Threat (Ancaman)**
- Aplikasi web bisa terserang malware atau cyber attack yang akan mengambil informasi dari sistem
- Munculnya sistem baru di masa depan yang lebih efektif dan canggih
- Perubahan regulasi keamanan perumahan yang memerlukan adaptasi sistem
- Kompetisi dengan solusi sejenis yang lebih advanced

### 3.3.2. Analisis Kebutuhan

Analisis kebutuhan digunakan untuk menentukan perangkat keras dan perangkat lunak yang cocok untuk digunakan pada pengembangan dan implementasi sistem admin tamu perumahan berbasis web.

**Perangkat Keras**
- Processor: Intel Core i5 atau AMD Ryzen 5 (minimum)
- RAM: 8GB (minimum), 16GB (recommended)
- Storage: 500GB SSD
- System type: 64-bit operating system, x64-based processor
- Network: Koneksi internet stabil minimum 10 Mbps

**Perangkat Lunak**
- Sistem Operasi: Windows 10/11, macOS, atau Linux
- Web Server: Apache (XAMPP) atau Nginx
- Database: MySQL 8.0 atau MariaDB
- PHP: Version 8.1 atau lebih tinggi
- Framework: Laravel 10.x
- Editor Text: Visual Studio Code atau PhpStorm
- Version Control: Git
- Browser: Chrome, Firefox, Safari, atau Edge (versi terbaru)

## 3.4. Perancangan

Pada tahap ini menjelaskan tentang perancangan sistem dan tampilan aplikasi yang disertai dengan penjelasannya. Proses perancangan ini berhubungan dengan hasil analisis dari metode SWOT dan kebutuhan sistem.

### 3.4.1. Unified Modeling Language (UML)

Perancangan aplikasi web dilakukan dengan menggunakan metode pemodelan UML. Dengan rancangan umum sistem menggunakan Use Case Diagram, penggambaran alur kerja dari sistem menggunakan Activity Diagram, dan penggambaran struktur database menggunakan Class Diagram.

### 3.4.2. Use Case Diagram

Use Case Diagram menggambarkan apa saja aktivitas yang dilakukan oleh suatu sistem. Pada sistem ini, satpam dapat melakukan pencatatan data tamu, monitoring, dan export data. Admin dapat mengelola pengguna, role, dan konfigurasi sistem.

**• Use Case Diagram Admin**

Rancangan umum sistem dibuat menggunakan Use Case Diagram. Berikut merupakan bentuk Use Case Diagram untuk admin. Dalam perancangan sistem pada admin ini, seorang admin perlu melakukan login terlebih dahulu. Setelah itu, admin dapat mengelola data pengguna, role dan permission, log aktivitas, backup data, dan melihat laporan komprehensif. Hanya admin yang dapat mengakses panel administrasi dan mengelola konfigurasi sistem secara keseluruhan.

![Use Case Diagram Admin](images/use-case-admin.png)

**• Use Case Diagram Satpam**

Rancangan umum sistem untuk satpam dibuat menggunakan Use Case Diagram. Berikut merupakan bentuk Use Case Diagram untuk satpam (petugas keamanan). Satpam dapat melakukan login, mengelola data tamu (tambah, edit, hapus), melakukan pencarian dan filter data, export laporan, dan monitoring dashboard real-time.

![Use Case Diagram Satpam](images/use-case-satpam.png)

**• Activity Diagram**

Activity Diagram adalah representasi grafis dari seluruh tahapan alur kerja. Diagram ini digunakan untuk menjelaskan proses bisnis dan alur kerja operasional secara langkah demi langkah dari komponen-komponen suatu sistem yang sedang dirancang. Pada activity diagram, proses awal desain alur digambarkan dengan Initial State dan diakhiri dengan Final State. Sedangkan objek yang terdapat yaitu sebuah aktivitas untuk menggambarkan proses yang ada pada website ini. Hubungan setiap aktivitas dihubungkan dengan transition.

![Activity Diagram](images/activity-diagram.png)

**• Class Diagram**

Fungsi utama dari class diagram adalah menggambarkan struktur sebuah sistem pemrograman. Perancangan class diagram digunakan untuk membantu melihat struktur database dan relasi antar tabel yang ada pada aplikasi web. Class diagram pada aplikasi web ini menunjukkan entitas utama seperti User, Tamu, LogAktivitas, dan PenjadwalanSatpam beserta atribut dan relasinya.

![Class Diagram](images/class-diagram.png)

## 3.5. Struktur Navigasi

Struktur navigasi digunakan untuk mengetahui alur navigasi pengguna dalam mengakses fitur-fitur aplikasi. Struktur navigasi juga sebagai panduan untuk pengembangan interface seperti menambah, menghapus, dan mengubah data.

Pada aplikasi ini terdapat dua role utama yaitu admin dan satpam dengan struktur navigasi yang berbeda sesuai dengan hak akses masing-masing. Struktur navigasi menggunakan kombinasi hirarki dan non-linear untuk memberikan fleksibilitas akses.

**Struktur Navigasi Admin:**
- Login → Dashboard Admin → (User Management, Role Management, Log Activities, System Settings, Reports)

**Struktur Navigasi Satpam:**
- Login → Dashboard Satpam → (Data Tamu, Tambah Tamu, Export Data, Jadwal Satpam, Profile)

![Struktur Navigasi Admin](images/struktur-navigasi-admin.png)
![Struktur Navigasi Satpam](images/struktur-navigasi-satpam.png)

## 3.6. Database

Database yang digunakan pada aplikasi web ini dibuat dengan menggunakan MySQL melalui phpMyAdmin. Cara membuat database di phpMyAdmin yaitu dengan cara memasukkan nama database yang akan dibuat pada create database kemudian klik tombol create. Tahap selanjutnya yaitu menentukan struktur yang akan digunakan. Perancangan struktur data meliputi nama atribut, tipe data, dan kunci utama pada setiap tabel.

**• Tabel yang akan digunakan untuk menyimpan data tamu:**

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id | bigint(20) unsigned | NO | PRI | NULL | auto_increment |
| gambar | varchar(255) | NO |  | NULL |  |
| jenis_tamu | varchar(255) | NO |  | NULL |  |
| tanggal | date | NO |  | NULL |  |
| jam_masuk | time | NO |  | NULL |  |
| jam_keluar | time | YES |  | NULL |  |
| posisi | varchar(255) | NO |  | NULL |  |
| tujuan | varchar(255) | NO |  | NULL |  |
| plat_nomor | varchar(255) | NO |  | NULL |  |
| created_at | timestamp | YES |  | NULL |  |
| updated_at | timestamp | YES |  | NULL |  |

**Tabel 3.1 Tabel Tamu**

**• Tabel yang akan digunakan untuk menyimpan data pengguna:**

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id | bigint(20) unsigned | NO | PRI | NULL | auto_increment |
| name | varchar(255) | NO |  | NULL |  |
| email | varchar(255) | NO | UNI | NULL |  |
| email_verified_at | timestamp | YES |  | NULL |  |
| password | varchar(255) | NO |  | NULL |  |
| remember_token | varchar(100) | YES |  | NULL |  |
| created_at | timestamp | YES |  | NULL |  |
| updated_at | timestamp | YES |  | NULL |  |

**Tabel 3.2 Tabel Users**

**• Tabel yang akan digunakan untuk menyimpan log aktivitas:**

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id | bigint(20) unsigned | NO | PRI | NULL | auto_increment |
| user_id | bigint(20) unsigned | YES | MUL | NULL |  |
| aktivitas | varchar(255) | NO |  | NULL |  |
| waktu | datetime | YES |  | NULL |  |
| deskripsi | text | YES |  | NULL |  |
| created_at | timestamp | YES |  | NULL |  |
| updated_at | timestamp | YES |  | NULL |  |

**Tabel 3.3 Tabel Log Aktivitas**

**• Tabel yang akan digunakan untuk menyimpan jadwal satpam:**

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id | bigint(20) unsigned | NO | PRI | NULL | auto_increment |
| user_id | bigint(20) unsigned | YES | MUL | NULL |  |
| tanggal | date | NO |  | NULL |  |
| shift | enum('pagi','siang','malam') | NO |  | NULL |  |
| jam_mulai | time | NO |  | NULL |  |
| jam_selesai | time | NO |  | NULL |  |
| status | enum('aktif','tidak_aktif') | NO |  | aktif |  |
| created_at | timestamp | YES |  | NULL |  |
| updated_at | timestamp | YES |  | NULL |  |

**Tabel 3.4 Tabel Penjadwalan Satpam**

## 3.7. Perancangan Tampilan Website

Pada tahap perancangan tampilan website ini akan menjelaskan mockup yang nantinya akan digunakan untuk dasar tampilan pada implementasi. Proses perancangan tampilan website menggunakan pendekatan responsive design dan user experience yang optimal.

### 3.7.1. Perancangan Halaman Login

Halaman login ini adalah halaman yang akan tampil pertama kali ketika website sistem admin tamu dibuka. Pengguna dapat mengisi email dan password yang telah terdaftar di database untuk melakukan login. Terdapat validasi form dan error handling untuk meningkatkan user experience.

![Halaman Login](images/design-login.png)

**Gambar 3.1. Perancangan Halaman Login**

### 3.7.2. Perancangan Halaman Dashboard

Halaman dashboard ini adalah halaman yang akan tampil pertama kali ketika pengguna berhasil login pada website sistem admin tamu. Dashboard menampilkan statistik tamu, grafik kunjungan, dan informasi penting lainnya dalam bentuk yang mudah dipahami.

![Halaman Dashboard](images/design-dashboard.png)

**Gambar 3.2. Perancangan Halaman Dashboard**

### 3.7.3. Perancangan Halaman Data Tamu

Halaman data tamu adalah halaman yang mana satpam dapat melihat, menambah, edit, dan menghapus data tamu. Halaman ini dilengkapi dengan fitur pencarian, filter, dan pagination untuk memudahkan navigasi data yang banyak.

![Halaman Data Tamu](images/design-data-tamu.png)

**Gambar 3.3. Perancangan Halaman Data Tamu**

### 3.7.4. Perancangan Halaman Tambah Tamu

Halaman tambah tamu ini adalah halaman yang mana satpam dapat menambah data tamu baru. Satpam dapat mengisi informasi seperti foto tamu, jenis tamu, plat nomor kendaraan, tujuan kunjungan, dan informasi lainnya yang diperlukan.

![Halaman Tambah Tamu](images/design-tambah-tamu.png)

**Gambar 3.4. Perancangan Halaman Tambah Tamu**

### 3.7.5. Perancangan Halaman Daftar Tamu

Halaman daftar tamu ini menampilkan semua data tamu yang telah terdaftar dengan fitur filter berdasarkan tanggal, status, dan jenis tamu. Halaman ini juga menyediakan fitur export data untuk keperluan laporan.

![Halaman Daftar Tamu](images/design-daftar-tamu.png)

**Gambar 3.5. Perancangan Halaman Daftar Tamu**

## 3.8. Implementasi dan Pengujian

Setelah persiapan selesai, tahap selanjutnya adalah implementasi sistem ke dalam program aplikasi web. Pada tahap pengkodean menggunakan Visual Studio Code dengan bahasa pemrograman PHP dan framework Laravel untuk backend, serta HTML, CSS, dan JavaScript untuk frontend. Kemudian akan dilakukan pengujian menggunakan metode black-box testing.

## 3.9. Implementasi Tampilan Website

Program aplikasi website ini telah dilakukan konversi dari perancangan ke implementasi pemrograman dengan menggunakan text editor Visual Studio Code untuk menulis kode program dan XAMPP untuk localhost server.

### 3.9.1. Tampilan Login

Tampilan awal saat membuka website akan muncul form login untuk masuk ke dalam sistem. Pengguna dapat mengisi email dan password yang sudah terdaftar di database untuk melakukan login. Sistem akan memvalidasi kredensial dan mengarahkan ke dashboard sesuai dengan role pengguna.

![Tampilan Login](images/impl-login.png)

**Gambar 3.6. Implementasi Tampilan Login**

### 3.9.2. Tampilan Dashboard Satpam

Setelah satpam berhasil login, tampilan akan mengarah ke dashboard yang menampilkan statistik tamu hari ini, grafik kunjungan mingguan, dan shortcut ke fitur-fitur utama. Dashboard dirancang responsif dan informatif untuk memudahkan monitoring.

![Tampilan Dashboard Satpam](images/impl-dashboard-satpam.png)

**Gambar 3.7. Implementasi Dashboard Satpam**

### 3.9.3. Tampilan Tambah Tamu

Pada tampilan tambah tamu, satpam dapat mengisi form untuk mendaftarkan tamu baru. Form dilengkapi dengan validasi input, upload foto tamu, dan fitur auto-complete untuk mempercepat proses input data.

![Tampilan Tambah Tamu](images/impl-tambah-tamu.png)

**Gambar 3.8. Implementasi Tambah Tamu**

### 3.9.4. Tampilan Daftar Tamu

Pada tampilan daftar tamu, satpam dapat melihat semua data tamu dengan fitur pencarian, filter berdasarkan tanggal dan status, serta pagination. Terdapat juga aksi untuk edit, hapus, dan checkout tamu.

![Tampilan Daftar Tamu](images/impl-daftar-tamu.png)

**Gambar 3.9. Implementasi Daftar Tamu**

### 3.9.5. Tampilan Jadwal Satpam

Pada tampilan jadwal satpam, pengguna dapat melihat jadwal shift kerja dalam bentuk kalender yang interaktif. Fitur ini membantu koordinasi antar satpam dan memastikan coverage keamanan yang optimal.

![Tampilan Jadwal Satpam](images/impl-jadwal-satpam.png)

**Gambar 3.10. Implementasi Jadwal Satpam**

### 3.9.6. Tampilan Admin Panel

Admin panel menggunakan Filament PHP yang menyediakan interface yang powerful untuk mengelola data master, pengguna, role, dan konfigurasi sistem. Panel ini dilengkapi dengan fitur CRUD lengkap, export data, dan monitoring sistem.

![Tampilan Admin Panel](images/impl-admin-panel.png)

**Gambar 3.11. Implementasi Admin Panel**

### 3.9.7. Tampilan Export Data

Fitur export data memungkinkan pengguna untuk mengunduh laporan dalam format Excel atau PDF. Pengguna dapat memilih rentang tanggal dan jenis data yang ingin diekspor untuk keperluan pelaporan dan arsip.

![Tampilan Export Data](images/impl-export-data.png)

**Gambar 3.12. Implementasi Export Data**

## 3.10. Pengujian Sistem

Pengujian sistem dilakukan menggunakan metode black-box testing untuk memastikan semua fitur berfungsi sesuai dengan spesifikasi yang telah ditentukan. Pengujian meliputi:

### 3.10.1. Pengujian Fungsional
- Testing login dan logout untuk berbagai role
- Testing CRUD operations pada data tamu
- Testing fitur pencarian dan filter
- Testing export data dalam berbagai format
- Testing responsive design pada berbagai device

### 3.10.2. Pengujian Keamanan
- Testing autentikasi dan autorisasi
- Testing validasi input untuk mencegah SQL injection
- Testing CSRF protection
- Testing session management

### 3.10.3. Pengujian Performa
- Testing response time untuk berbagai operasi
- Testing load handling dengan data dalam jumlah besar
- Testing concurrent user access
- Testing database query optimization

Hasil pengujian menunjukkan bahwa sistem berfungsi dengan baik dan memenuhi requirement yang telah ditetapkan. Sistem dapat menangani operasi CRUD dengan response time rata-rata di bawah 2 detik dan dapat melayani multiple concurrent users tanpa degradasi performa yang signifikan.