FROM php:8.1.1-fpm-alpine AS php-fpm

RUN apk add imap-dev krb5-dev openssl
RUN docker-php-ext-configure imap \
 && docker-php-ext-install imap pdo_mysql \
 && docker-php-ext-enable imap

FROM php:8.1.1-cli-alpine AS php-cli

RUN apk add imap-dev krb5-dev openssl
RUN docker-php-ext-configure imap \
 && docker-php-ext-install imap pdo_mysql \
 && docker-php-ext-enable imap

FROM php-cli AS php-cli-composer

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENTRYPOINT [ "/usr/bin/composer" ]
