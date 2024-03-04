# Noted
Noted adalah website pencatatan keuangan dan penyimpanan catatan sebagai tugas akhir mata kuliah RPL Ilmu Komputer IPB University Semester 4. Kelompok kami terdiri dari saya, Muhammad Zahran sebagai penanggung jawab front-end, Salma Nadhira Danuningrat sebagai penanggung jawab back-end, dan Pramudya Oktareza sebagai penanggung jawab UI.

## Instalasi
Pastikan sudah install composer dan mysql. Buatlah user baru dan database baru pada mysql.
```bash
cp .env.example .env
```
Pada file `.env`, ubah nilai `APP_URL` dengan ip atau domain yang akan digunakan. Kemudian, ubah nilai `DB_DATABASE` dengan nama database yang baru dibuat, ubah nilai `DB_USERNAME` dengan nama user yang baru dibuat, dan ubah nilai `DB_PASSWORD` dengan password user tersebut.
```bash
composer install
composer update
php artisan storage:link
php artisan key:generate
php artisan migrate:fresh --seed
```

## Notes to self
### Kalo make Ubuntu
```bash
sudo apt install php-curl
sudo apt install php-mysql
sudo apt install php-xml
```
### Kalo make Apache2
Andaikan webroot ada di `/var/www/html`, maka isi `/var/www/html/.htaccess` adalah:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```
Kalo perlu, install ini abistu aktifin modul rewrite nya:
```bash
sudo apt install libapache2-mod-php
sudo a2enmod rewrite
```
Abistu di `/etc/apache2/apache2.conf` tambahin:
```apache
<Directory /var/www/html>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```
Jangan lupa ubah permission:
```bash
chown -R user:user /var/www/html
chmod -R o+w /var/www/html/storage
```
