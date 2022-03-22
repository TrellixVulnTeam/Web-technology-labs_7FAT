FROM php:7.4-fpm

MAINTAINER Aleksandr Bushuev <aleksandr.bushuev2000@gmail.com>

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --version=1.10.23 \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN yes | pecl install xdebug \
  #  && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
 #   && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.client_port=10000" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo pdo_mysql mysqli

RUN chown a+w /var/www/public/App/Services/guestbook.imc \
    && chown a+r /var/www/public/App/Services/guestbook.imc \
    && chown a+w /var/www/public/assets/blog/res \
    && chown a+r /var/www/public/assets/blog/res

ENV PHP_MEMORY_LIMIT=10000M

STOPSIGNAL SIGQUIT

CMD ["php-fpm"]
