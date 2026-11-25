# Envy Studio — Paket Laravel Blade Final (Peran 1 + UI Agensi Lengkap)

## Cara Pasang di VS Code / Laragon (`envy-studio`)
1. Ekstrak seluruh isi ZIP ini ke dalam folder root proyek Laravel kamu (`C:\\laragon\\www\\envy-studio`), lalu pilih **Replace / Timpa** file yang sama.
2. Pastikan konfigurasi database di `.env` sudah sesuai (MySQL Laragon atau SQLite).
3. Jalankan migrasi & seeder akun default di terminal VS Code:
   ```bash
   php artisan migrate:fresh --seed
   php artisan optimize:clear
   php artisan serve
   ```
4. Buka `http://127.0.0.1:8000` di browser.

## Akun Seeder Default
- **Owner (Yafa)**: `owner@envystudio.id` / `owner123`
- **Desainer (Ael)**: `ael@envystudio.id` / `desainer123`
- **Desainer (Farhan)**: `farhan@envystudio.id` / `desainer123`

## Daftar Halaman & Wadah Tim
- `/` — Beranda Publik (Hero + Portofolio 7 Kategori + About Us + Testimoni General)
- `/order` — Wadah Peran 2 (Raditya)
- `/track` — Wadah Peran 5 (Toha)
- `/login` — Autentikasi Tim (Peran 1 - Evan)
- `/owner/dashboard` & `/desainer/dashboard` — Wadah Peran 6 (Elhaq - peran 6)
- `/owner/orders` — Wadah Peran 2 (Raditya)
- `/owner/penugasan` & `/desainer/tugas` — Wadah Peran 3 (Rasya)
- `/owner/pembayaran` — Wadah Peran 4 (Mangaraja)
- `/owner/revisi` & `/desainer/revisi` — Wadah Peran 5 (Toha)
- `/owner/laporan` — Wadah Peran 6 (Farrel)
- `/users` — CRUD Pengguna & Desainer Penuh (Peran 1 - Evan)
