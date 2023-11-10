composer i
php artisan key:generate
configure .env file (database, JWT_SECRET)
php artisan migrate --seed
php artisan jwt:secret

admin - email admin@gmail.com, pass 12345678
user - email user@gmail.com, pass 12345678
