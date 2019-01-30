FROM php:7.2-apache

ADD src/scripts/ /scripts/
RUN mv /scripts/wait-for-it.sh /usr/local/bin/
WORKDIR /scripts/
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN ./install-ext.sh