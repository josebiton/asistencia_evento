FROM php:8.1.0-apache

# Actualización e instalación de paquetes básicos
RUN apt-get update && apt-get install --no-install-recommends -y \
    libzip-dev \
    libxml2-dev \
    mariadb-client \
    zip \
    unzip \
    zlib1g-dev \
    libicu-dev \
    g++ \
    tzdata \
    curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configuración de extensiones PHP
RUN docker-php-ext-configure intl \
    && docker-php-ext-install \
        intl \
        pdo_mysql \
        bcmath \
        soap \
        zip \
        mysqli

# Instalar extensiones PECL
RUN pecl install pcov \
    && docker-php-ext-enable pcov

# Configuración de PHP y Apache
RUN sed -ri -e 's!expose_php = On!expose_php = Off!g' $PHP_INI_DIR/php.ini-production \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && sed -ri -e 's!ServerTokens OS!ServerTokens Prod!g' /etc/apache2/conf-available/security.conf \
    && sed -ri -e 's!ServerSignature On!ServerSignature Off!g' /etc/apache2/conf-available/security.conf \
    && sed -ri -e 's!KeepAliveTimeout .*!KeepAliveTimeout 65!g' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# Configuración de zona horaria
ENV TZ=America/Lima
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo "${TZ}" > /etc/timezone

# Instalar Composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

# Copiar archivos de la aplicación
WORKDIR /var/www/html
COPY . /var/www/html/

# Establecer permisos
RUN chmod -R 755 /var/www/html \
    && chown -R www-data:www-data /var/www/html

# Exponer el puerto por defecto de Apache
EXPOSE 80
