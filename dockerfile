# Stage 1: Build & install dependencies
FROM php:8.3-cli AS builder

WORKDIR /app

# Installer les dépendances système
RUN apt-get update && apt-get install -y unzip git

# Installer composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier le code et installer les dépendances dev
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

COPY . .
RUN composer dump-autoload --optimize

# Stage 2: Tests
FROM builder AS test
RUN vendor/bin/phpunit --configuration phpunit.xml

# Stage 3: Production
FROM php:8.3-cli AS prod

WORKDIR /app

# Copier uniquement les dépendances de prod
COPY --from=builder /app/vendor /app/vendor
COPY --from=builder /app /app

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
