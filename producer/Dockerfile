FROM php:7.2-apache

ADD src/scripts/ /scripts/
WORKDIR /scripts/
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN ./install-ext.sh
RUN ./install-composer.sh
