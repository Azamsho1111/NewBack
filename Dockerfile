# Используем официальный образ PHP с Composer
FROM php:8.2-fpm

# Установить системные зависимости и расширения PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Установить Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Копировать только composer.json и composer.lock для кэширования слоёв
COPY composer.json composer.lock ./

# Установить зависимости
RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader

# Копировать остальные файлы проекта
COPY . .

# Собрать автозагрузчик
RUN composer dump-autoload --optimize

# Открыть порт (если нужно)
EXPOSE 9000

# Команда по умолчанию
CMD ["php-fpm"]
