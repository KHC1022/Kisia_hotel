FROM php:8.0-apache
COPY . /var/www/html
EXPOSE 80

# MySQL 확장 설치
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache 모듈 활성화
RUN a2enmod rewrite