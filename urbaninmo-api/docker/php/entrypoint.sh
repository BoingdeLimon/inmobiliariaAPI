#!/bin/sh

# Instalar dependencias
composer install --ignore-platform-reqs --no-interaction
npm install && npm run build

# Configurar Laravel
php artisan key:generate
php artisan storage:link
php artisan cache:clear

# Esperar a PostgreSQL usando pg_isready
until pg_isready -h postgres -U ${POSTGRES_USER} -d ${POSTGRES_DB}; do
    echo "Esperando a PostgreSQL..."
    sleep 1
done

# Ejecutar migraciones
php artisan migrate --seed

# Iniciar PHP-FPM
exec php-fpm