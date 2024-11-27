# 基於官方 PHP 映像
FROM php:8.2-cli

# 設置工作目錄
WORKDIR /app

# 安裝 MySQL 擴展所需的依賴項
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libxml2-dev \
    libpq-dev \
<<<<<<< HEAD
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip
=======
    && docker-php-ext-install pdo pdo_mysql
>>>>>>> 69126d5 (Initial commit with Dockerfile)

# 複製項目文件到容器中
COPY . /app

# 安裝 Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

<<<<<<< HEAD
# 安裝 Composer 依賴
RUN composer install --no-dev --optimize-autoloader -vv
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
=======
# 安裝項目依賴
# RUN composer install
>>>>>>> 69126d5 (Initial commit with Dockerfile)

# 暴露應用的運行端口
EXPOSE 8000

# 啟動服務
<<<<<<< HEAD
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
=======
CMD php artisan serve --host=0.0.0.0 --port=8000
>>>>>>> 69126d5 (Initial commit with Dockerfile)
