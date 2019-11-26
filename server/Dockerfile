 FROM php:5.4-apache
 RUN docker-php-ext-install mysql mysqli pdo pdo_mysql

 RUN apt-get update && apt-get install -y apt-transport-https
 RUN apt-get install -y libicu-dev
 RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++
 RUN docker-php-ext-configure intl
 RUN docker-php-ext-install intl
 RUN apt-get install php5-mysql -y

 RUN docker-php-ext-install mbstring