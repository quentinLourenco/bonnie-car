# Utiliser une image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    zip unzip git libicu-dev libzip-dev libpq-dev \
    && docker-php-ext-install intl pdo pdo_mysql pdo_pgsql zip opcache mysqli \
    && a2enmod rewrite

# Copier les fichiers du projet Symfony dans le conteneur
WORKDIR /var/www/html
COPY . /var/www/html

# Configurer les permissions pour Symfony
RUN chown -R www-data:www-data /var/www/html/public 

# Exposer le port 80
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]