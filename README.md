# Portofolio Laravel — Muhammad Taqi Junicio

Paket ini berisi file-file aplikasi yang **ditimpakan ke proyek Laravel baru**.
Kerangka Laravel dan folder `vendor/` tidak disertakan; Composer yang membuatnya.
Tampilan memakai CSS biasa (`public/css/style.css`), tanpa Tailwind dan tanpa JavaScript.

## Kebutuhan
PHP 8.2+, Composer, ekstensi PHP `sqlite3`/`pdo_sqlite`, `mbstring`, `fileinfo`.

## Pemasangan

```bash
# 1. Buat proyek Laravel baru
composer create-project laravel/laravel portofolio
cd portofolio

# 2. Salin isi paket ini ke folder portofolio (timpa jika ditanya):
#    app/, config/, database/, public/, resources/, routes/

# 3. Tambahkan akun admin di file .env (baris paling bawah)
#    ADMIN_EMAIL=emailkamu@gmail.com
#    ADMIN_PASSWORD=passwordkamu

# 4. Database
php artisan migrate
php artisan db:seed --class=AdminSeeder     # membuat akun admin (email+password dari .env)
php artisan db:seed --class=ProjectSeeder   # mengisi 3 proyek awal
php artisan storage:link                    # agar gambar unggahan tampil

# 5. Jalankan
php artisan serve
```
Buka http://127.0.0.1:8000

Jika mengganti email/password di `.env` setelah seeding, jalankan lagi
`php artisan db:seed --class=AdminSeeder`.

## Gambar yang perlu diletakkan sendiri
| File | Fungsi |
|------|--------|
| `public/images/profil.jpg` | Foto profil bundar di hero (jika belum ada, tampil siluet bawaan) |
| `public/images/projects/flashcard.png` | Screenshot FlashCard Game |
| `public/images/projects/zikir.png` | Screenshot Aplikasi Zikir |
| `public/images/projects/login.png` | Screenshot Login Page |

## Cara memakai
1. Klik **Login Admin** di navbar, masuk dengan email + password admin.
2. Setelah login Anda masuk ke **Dashboard**: statistik proyek dan tabel proyek.
3. **+ Tambah Proyek**, **Edit**, dan **Hapus** dilakukan dari dashboard.
4. Tombol di navbar berubah menjadi **Dashboard** saat sedang login; **Logout** ada di dashboard.
5. Halaman portofolio publik hanya menampilkan proyek.

## Struktur
- `routes/web.php` — semua rute
- `app/Http/Controllers/PortfolioController.php` — halaman publik (Read)
- `app/Http/Controllers/LoginController.php` — login/logout (Auth bawaan Laravel)
- `app/Http/Controllers/DashboardController.php` — dashboard admin
- `app/Http/Controllers/ProjectController.php` — Create / Update / Delete
- `app/Models/Project.php` — model
- `database/migrations/…create_projects_table.php`, `database/seeders/AdminSeeder.php`, `ProjectSeeder.php`
- `resources/views/` — `portfolio`, `auth/login`, `dashboard/index`, `projects/form`, `layouts/*`
- `public/css/style.css` — seluruh CSS

## File lama yang boleh dihapus (jika sebelumnya sudah menyalin versi lama)
`app/Http/Controllers/AdminController.php`, `app/Http/Middleware/EnsureAdmin.php`, `resources/views/admin/`
# Portfolio-TaqiJunicio
