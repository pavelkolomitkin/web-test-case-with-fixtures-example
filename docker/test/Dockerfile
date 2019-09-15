FROM php:7.3-fpm

RUN apt-get update && apt-get install apt-utils -y

RUN apt-get install git -y \
    && apt-get install zip unzip -y \
    && apt-get install curl -y \
    && docker-php-ext-install pdo pdo_mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --install-dir=/bin \
    && php -r "unlink('composer-setup.php');" \
    && mv /bin/composer.phar /bin/composer \
    && chmod +x /bin/composer

CMD ["php-fpm"]