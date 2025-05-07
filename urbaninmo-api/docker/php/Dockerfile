FROM php:8.3-fpm

# Crear usuario no root (ID 1000 igual que el usuario host)
RUN useradd -m -u 1000 laravel

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    nodejs \
    npm \
    curl \
    postgresql-client && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        pdo_pgsql \
        pgsql \
        zip \
        gd \
        mbstring \
        exif \
        pcntl \
        bcmath \
        opcache && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Node.js v16
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Copiar configuración PHP-FPM y script de entrada
COPY docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-custom.conf
COPY docker/php/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Instalar Composer desde imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo y permisos
WORKDIR /var/www/html
RUN chown -R laravel:laravel /var/www/html

# Cambiar a usuario no root
USER laravel

# Punto de entrada y comando
ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
