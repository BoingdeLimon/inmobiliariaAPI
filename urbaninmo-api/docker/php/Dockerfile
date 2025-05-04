FROM php:8.3-fpm

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
    libpq-dev \
    nodejs \
    npm \
    postgresql-client
    
RUN docker-php-ext-install pdo pdo_pgsql

# Instalar Node.js
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs
# RUN apt-get install -y netcat
COPY docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-custom.conf
# Copiar script de entrada
COPY docker/php/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Punto de entrada
ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]

# Instalar extensiones de PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    zip \
    gd \
    mbstring \
    exif \
    pcntl \
    bcmath \
    opcache

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html