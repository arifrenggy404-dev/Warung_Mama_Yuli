# TODO - Warung Mama Yuli (Laravel)

## Step 1: Audit & perbaikan menu dasar
- [ ] Koreksi `app/Models/Dashboard.php` (typo table: dasboard -> dashboards)
- [ ] Koreksi `app/Http/Controllers/Dashboardcontroller.php` (konsistensi view name & redirect route)
- [ ] Buat views CRUD menu (index/create/edit/show) untuk resource `Dashboard`
- [ ] Update sidebar/menu navigasi agar menuju modul-modul

## Step 2: Setup otorisasi akses admin vs user
- [ ] Buat middleware/authorization logic: admin bisa akses semua modul, user hanya menu
- [ ] Sesuaikan routes modul SDM/stok/kritik/jadwal agar admin only

## Step 3: Modul SDM (biodata karyawan)
- [ ] Buat migration `karyawans`
- [ ] Model `Karyawan`
- [ ] Controller CRUD `KaryawanController`
- [ ] Routes + views

## Step 4: Modul Stok Bahan baku (berdasarkan kategori)
- [ ] Tentukan struktur kategori bahan dari seeder yang ada (cek kolom)
- [ ] Buat migration tabel kategori/bahan/stok (sesuai requirement)
- [ ] Controller: list stok per kategori + update stok
- [ ] Routes + views

## Step 5: Modul Kritik & Saran pelanggan
- [ ] Buat migration `kritik_sarans`
- [ ] Model + Controller (admin CRUD/lihat)
- [ ] Routes + views

## Step 6: Modul Jadwal kerja/shif
- [ ] Buat migration `jadwal_kerjas`
- [ ] Model + Controller
- [ ] Routes + views

## Step 7: Integrasi & testing
- [ ] `php artisan migrate`
- [ ] `php artisan db:seed`
- [ ] Test akses admin vs user
- [ ] Test CRUD tiap modul

