# Sistem Manajemen Gudang UD Chandra Furniture

## 📋 Deskripsi

Sistem Manajemen Gudang UD Chandra Furniture adalah aplikasi web berbasis PHP yang dirancang untuk mengelola operasional gudang perusahaan furniture. Aplikasi ini memungkinkan pengguna untuk mengelola inventaris, keuangan, pengiriman, dan data karyawan dengan antarmuka yang user-friendly.

## 🏗️ Fitur Utama

### 📊 Dashboard
- **Ringkasan Keuangan**: Menampilkan income, outcome, dan profit secara real-time
- **Inventaris Gudang**: 
  - Bahan baku (raw materials)
  - Bahan jadi (finished products)
- **Jadwal Pengiriman**: Kalender pengiriman bulanan
- **Profil Perusahaan**: Informasi UD Chandra Furniture

### 🏭 Manajemen Gudang
- **Kelola Barang**: 
  - Tambah, edit, hapus barang
  - Kategorisasi bahan baku dan bahan jadi
  - Tracking stok dan satuan
  - Manajemen harga produk
- **Monitoring Stok**: Real-time monitoring ketersediaan barang

### 💰 Sistem Keuangan
- **Logbook Keuangan**:
  - Pencatatan pemasukan (income)
  - Pencatatan pengeluaran (outcome)
  - Perhitungan profit otomatis
  - Filter berdasarkan bulan dan deskripsi
- **Laporan Keuangan**: Dashboard ringkasan keuangan

### 🚚 Manajemen Pengiriman
- **Data Pengiriman**:
  - Informasi tujuan pengiriman
  - Tanggal pengiriman
  - Deskripsi pengiriman
  - Total harga pengiriman
- **Filter Pengiriman**: Berdasarkan tanggal, tujuan, dan nama karyawan
- **Kalender Pengiriman**: Visualisasi jadwal pengiriman

### 👥 Manajemen Karyawan
- **Data Karyawan**: Informasi lengkap karyawan
- **Role Management**: Pengaturan peran dan akses
- **Tracking Karyawan**: Monitoring aktivitas pengiriman per karyawan

### 🔐 Sistem Autentikasi
- **Login/Logout**: Sistem keamanan akses
- **User Management**: Pengelolaan pengguna admin
- **Session Management**: Pengelolaan sesi pengguna

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP (Native)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Database Connection**: PDO (PHP Data Objects)
- **Styling**: Custom CSS dengan responsive design

## 📁 Struktur Proyek

```
├── asset/                 # Assets (gambar, logo, icon)
│   ├── login/            # Asset untuk halaman login
│   └── style/            # Asset styling
├── display/              # Halaman tampilan utama
│   ├── dashboard.php     # Dashboard utama
│   ├── warehouse.php     # Halaman gudang
│   ├── shipment.php      # Halaman pengiriman
│   ├── employee.php      # Halaman karyawan
│   └── logBook*.php      # Halaman logbook keuangan
├── style/                # File CSS
│   ├── displayDb.css     # Styling dashboard
│   ├── warehouse.css     # Styling gudang
│   ├── shipment.css      # Styling pengiriman
│   └── sidebar.css       # Styling sidebar
├── Barang.php            # Class untuk manajemen barang
├── Logbook.php           # Class untuk manajemen keuangan
├── Pengiriman.php        # Class untuk manajemen pengiriman
├── UserAdmin.php         # Class untuk manajemen user
├── config.php            # Konfigurasi database
├── DbConnection.php      # Koneksi database
└── login.php             # Halaman login
```

## 🚀 Instalasi dan Setup

### Prasyarat
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web server (Apache/Nginx)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone [repository-url]
   cd warehouse-management-ud-chandra
   ```

2. **Setup Database**
   - Buat database MySQL dengan nama `dbsawmill`
   - Import struktur database (file SQL akan disediakan)

3. **Konfigurasi Database**
   - Edit file `config.php`
   - Sesuaikan konfigurasi database:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'dbsawmill');
   define('DB_USER', 'root'); 
   define('DB_PSWD', '');
   ```

4. **Setup Web Server**
   - Pastikan web server mengarah ke direktori proyek
   - Pastikan mod_rewrite aktif (untuk Apache)

5. **Akses Aplikasi**
   - Buka browser dan akses `http://localhost/[nama-folder]`
   - Login dengan kredensial admin

## 📊 Struktur Database

### Tabel Utama
- **barang**: Data inventaris (bahan baku dan jadi)
- **logbook**: Pencatatan keuangan (income/outcome)
- **shipment**: Data pengiriman
- **employee**: Data karyawan
- **role**: Peran dan akses karyawan
- **keuangan**: Ringkasan keuangan

## 👤 Penggunaan

### Login
1. Akses halaman login
2. Masukkan username dan password
3. Klik tombol login

### Dashboard
- Melihat ringkasan keuangan
- Monitoring stok gudang
- Melihat jadwal pengiriman

### Manajemen Gudang
1. Klik menu "Warehouse"
2. Tambah barang baru
3. Edit informasi barang
4. Hapus barang (soft delete)

### Manajemen Keuangan
1. Klik menu "Logbook"
2. Pilih "Income" atau "Outcome"
3. Tambah pencatatan keuangan
4. Filter berdasarkan bulan/deskripsi

### Manajemen Pengiriman
1. Klik menu "Shipment"
2. Tambah data pengiriman baru
3. Lihat detail pengiriman
4. Filter pengiriman

## 🔧 Maintenance

### Backup Database
```bash
mysqldump -u root -p dbsawmill > backup_warehouse.sql
```

### Update Aplikasi
1. Backup database dan file aplikasi
2. Upload file baru
3. Restore database jika diperlukan
4. Test aplikasi

## 📞 Support

Untuk bantuan teknis atau pertanyaan, silakan hubungi:
- **Email**: [email-support]
- **Phone**: [nomor-telepon]
- **Address**: Kab. Malang, Jawa Timur

## 📄 Lisensi

Aplikasi ini dikembangkan khusus untuk UD Chandra Furniture. Hak cipta dilindungi.

---

**UD Chandra Furniture** - Sistem Manajemen Gudang yang Handal dan Terpercaya 