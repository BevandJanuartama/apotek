# 💊 Apotek Management System

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.40.2-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3.10-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0.30-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

**Sistem Manajemen Apotek Berbasis Web dengan Laravel**

[Demo](#) • [Dokumentasi](#) • [Laporkan Bug](https://github.com/BevandJanuartama/apotek/issues)

</div>

---

## 📋 Daftar Isi

- [Tentang Project](#-tentang-project)
- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Cara Membuat dari Awal](#-cara-membuat-dari-awal)
- [Struktur Database](#-struktur-database)
- [Screenshot](#-screenshot)
- [Dukungan](#-dukungan)
- [Developer](#-developer)
- [Lisensi](#-lisensi)

---

## 🎯 Tentang Project

**Apotek Management System** adalah aplikasi web berbasis Laravel untuk mengelola data apotek dan obat-obatan. Sistem ini menyediakan antarmuka yang modern dan intuitif untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data apotek dan obat, dengan relasi antar tabel yang terstruktur.

### ✨ Highlight

- 🏥 Manajemen data apotek lengkap (nama, alamat, telepon, jam operasional)
- 💊 Manajemen data obat dengan informasi detail
- 🔗 Relasi database yang terstruktur antara apotek dan obat
- 🎨 UI modern dengan Tailwind CSS
- 📱 Responsive design untuk semua device
- 🔍 DataTables untuk pencarian dan sorting data
- ⚡ SweetAlert untuk notifikasi yang menarik

---

## 🚀 Fitur Utama

### 📦 Manajemen Apotek
- ✅ Tambah, Edit, Hapus data apotek
- ✅ Lihat detail apotek dan daftar obat yang tersedia
- ✅ Informasi lengkap: nama, alamat, telepon, jam operasional
- ✅ Validasi data otomatis

### 💊 Manajemen Obat
- ✅ Tambah, Edit, Hapus data obat
- ✅ Informasi obat: nama, kategori, kegunaan, cara minum, waktu minum
- ✅ Relasi dengan apotek tertentu
- ✅ Filter dan pencarian obat

### 🎨 User Interface
- ✅ Modern gradient design
- ✅ Smooth animations dan transitions
- ✅ Interactive hover effects
- ✅ Responsive layout (mobile, tablet, desktop)
- ✅ DataTables integration untuk tabel interaktif
- ✅ SweetAlert untuk konfirmasi hapus data

---

## 🛠 Teknologi

### Backend
- **Laravel** 12.40.2 - PHP Framework
- **PHP** 8.3.10 - Programming Language
- **MySQL** 8.0.30 - Database Management

### Frontend
- **Tailwind CSS** 3.x - CSS Framework
- **Blade Template** - Laravel Templating Engine
- **DataTables** - jQuery Plugin untuk tabel interaktif
- **SweetAlert2** - Beautiful popup boxes
- **Node.js** 22.15.1 & npm 10.9.2

---

## 💻 Persyaratan Sistem

Sebelum memulai instalasi, pastikan sistem Anda memenuhi persyaratan berikut:

- **PHP** >= 8.3.10
- **Composer** >= 2.x
- **Node.js** >= 22.x
- **npm** >= 10.x
- **MySQL** >= 8.0
- **Git** (untuk clone repository)

---

## 📥 Instalasi

Ikuti langkah-langkah berikut untuk menginstall project:

### 1️⃣ Clone Repository
```bash
git clone https://github.com/BevandJanuartama/apotek.git
cd apotek
```

### 2️⃣ Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3️⃣ Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4️⃣ Configure Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:
```env
APP_NAME="Apotek Management System"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5️⃣ Database Migration & Seeding
```bash
# Run migrations
php artisan migrate

# Seed initial data (optional)
php artisan db:seed
```

### 6️⃣ Frontend Assets & Storage
```bash
# Compile frontend assets (development)
npm run dev

# For production build
# npm run build

# Create storage symbolic link
php artisan storage:link
```

### 7️⃣ Launch Application
```bash
# Start the development server
php artisan serve
```

🎉 **Aplikasi berjalan di:** `http://localhost:8000`

---

## 🔨 Cara Membuat dari Awal

Jika Anda ingin membuat project serupa dari awal, ikuti langkah-langkah berikut:

### Step 1: Create Laravel Project
```bash
laravel new apotek
cd apotek
```

### Step 2: Create Apotek Resource
```bash
# Generate Model, Migration, Controller, dan Resource
php artisan make:model Apotek -mcr
```

Edit file berikut:
- `app/Models/Apotek.php` - Model configuration
- `database/migrations/xxxx_create_apoteks_table.php` - Table structure
- `app/Http/Controllers/ApotekController.php` - Controller logic
- `routes/web.php` - Routes configuration

### Step 3: Create Obat Resource
```bash
# Generate Model, Migration, Controller, dan Resource
php artisan make:model Obat -mcr
```

Edit file berikut:
- `app/Models/Obat.php` - Model configuration dengan relasi ke Apotek
- `database/migrations/xxxx_create_obats_table.php` - Table structure dengan foreign key
- `app/Http/Controllers/ObatController.php` - Controller logic
- `routes/web.php` - Routes configuration

### Step 4: Create Blade Views

Buat struktur folder dan file berikut di `resources/views/`:
```
resources/views/
├── layouts/
│   ├── app.blade.php          # Main layout
│   └── navbar.blade.php       # Navigation component
├── apotek/
│   ├── index.blade.php        # List all apotek
│   ├── create.blade.php       # Add new apotek
│   ├── edit.blade.php         # Edit apotek
│   └── show.blade.php         # Show apotek detail + obat list
└── obat/
    ├── index.blade.php        # List all obat
    ├── create.blade.php       # Add new obat
    ├── edit.blade.php         # Edit obat
    └── show.blade.php         # Show obat detail
```

### Step 5: Setup Tailwind CSS
```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

Configure `tailwind.config.js` dan compile assets dengan `npm run dev`

### Step 6: Run Migration & Start Server
```bash
php artisan migrate
php artisan serve
```

---

## 🗄 Struktur Database

### Tabel: `apoteks`

| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary Key |
| nama_apotek | varchar(255) | Nama apotek |
| alamat | text | Alamat lengkap |
| telepon | varchar(20) | Nomor telepon |
| jam_buka | time | Jam buka operasional |
| jam_tutup | time | Jam tutup operasional |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

### Tabel: `obats`

| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary Key |
| apotek_id | bigint (FK) | Foreign Key ke apoteks |
| nama_obat | varchar(255) | Nama obat |
| kategori | varchar(100) | Kategori obat |
| kegunaan | text | Kegunaan obat |
| cara_minum | varchar(100) | Cara konsumsi |
| waktu_minum | varchar(100) | Waktu konsumsi |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

### Relasi Database
```
apoteks (1) ----< (Many) obats
```

Setiap apotek dapat memiliki banyak obat, dan setiap obat dimiliki oleh satu apotek.

---

## 📞 Dukungan

Jika Anda memiliki pertanyaan atau menemukan bug, jangan ragu untuk menghubungi:

- 📧 **Email:** Contact via GitHub
- 📱 **Instagram:** [@jnrtma](https://instagram.com/jnrtma)
- 🐛 **Issues:** [GitHub Issues](https://github.com/BevandJanuartama/apotek/issues)
- 💬 **Discussions:** [GitHub Discussions](https://github.com/BevandJanuartama/apotek/discussions)

---

## 👨‍💻 Developer

<div align="center">

### **Muhammad Bevand Januartama**

💼 **Software Engineer** (Rekayasa Perangkat Lunak)  
🏫 **SMK Telkom Banjarbaru**, Indonesia  

[![GitHub](https://img.shields.io/badge/GitHub-@BevandJanuartama-181717?style=for-the-badge&logo=github)](https://github.com/BevandJanuartama)
[![Instagram](https://img.shields.io/badge/Instagram-@jnrtma-E4405F?style=for-the-badge&logo=instagram&logoColor=white)](https://instagram.com/jnrtma)

</div>

---

## 📄 Lisensi

This project is **proprietary software**. All rights reserved.

© 2024 Muhammad Bevand Januartama. Unauthorized copying, distribution, or modification of this software is strictly prohibited.

---

<div align="center">

**Made with ❤️ in Banjarbaru, Indonesia**

⭐ **Star this repository if you find it helpful!**

---

### 🙏 Terima Kasih Telah Menggunakan Apotek Management System!

</div>
