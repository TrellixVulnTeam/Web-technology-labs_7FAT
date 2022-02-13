MAINTAINER Aleksandr Bushuev <aleksandr.bushuev2000@gmail.com>

FROM php:7.4-fpm

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'baf1608c33254d00611ac1705c1d9958c817a1a33bce370c0595974b342601bd80b92a3f46067da89e3b06bff421f182') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    && php composer-setup.php --version=1.10.23 \
    && php -r "unlink('composer-setup.php');"
    && mv composer.phar /usr/local/bin/composer

COPY php.ini-production "$PHP_INI_DIR"
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN composer require

STOPSIGNAL SIGQUIT

EXPOSE 9000

CMD ["php-fpm"]
