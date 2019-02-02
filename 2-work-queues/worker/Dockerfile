FROM php:7.2-cli

ADD src/scripts/ /scripts/
RUN /scripts/install-ext.sh
ADD https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh /usr/local/bin/
RUN chmod 755 /usr/local/bin/wait-for-it.sh
