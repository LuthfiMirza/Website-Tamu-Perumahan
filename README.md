# Website-Tamu-Perumahan

Sistem pencatatan tamu berbasis Laravel + Filament, dibuat untuk kebutuhan keamanan kompleks.

## Fitur
- Manajemen tamu masuk/keluar
- Dashboard statistik
- Jadwal satpam
- Role-based access

## Instalasi
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
