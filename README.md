### Laravel Base Versi 11 + sneat template

composer create-project --prefer-dist laravel/laravel:^11.0 nama-proyek
composer update
php artisan key:generate

### UserSeeder default

php artisan make:seeder UserSeeder
php artisan db:seed
