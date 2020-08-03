# Backend UPJ

Use this command on root folder

php artisan make:migration create_products_table --create=products //create only Migration file

php artisan make:model Product -m //Create Migration, Model file

php artisan make:model Product -mcr //For Create Migration,Model,Controller file

If you want to do it manually then you may set --path as per your folder requirement.

php artisan make:migration filename --path=/app/database/migrations/relations
php artisan make:migration filename --path=/app/database/migrations/translations
If you want to migrate then

php artisan migrate --path= /app/database/migrations/relations
