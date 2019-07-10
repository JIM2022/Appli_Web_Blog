FROM php:7.1-fpm

MAINTAINER Claude Khedhiri <claude@khedhiri.com>

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        cron \
        git \
        curl \
        libz-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libssl-dev \
        libicu-dev \
        zlib1g-dev \
        g++

#####################################
# Install default php extension
#####################################
RUN \
    docker-php-ext-configure intl && \
    docker-php-ext-configure gd \
            --enable-gd-native-ttf \
            --with-jpeg-dir=/usr/lib \
            --with-freetype-dir=/usr/include/freetype2 && \
    docker-php-ext-install mbstring intl pdo pdo_mysql gd opcache zip && \
    pecl install apcu && \
    pecl install redis && \
    docker-php-ext-enable apcu redis opcache && \
    php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer

#####################################
# Install NewRelic agent
#####################################
ARG NEWRELIC_LICENSE=false
ARG NEWRELIC_APP_NAME="PHP Application"
RUN if [ ${NEWRELIC_LICENSE} != false ]; then \
    cd ~ && \
    NEWRELIC_VERSION="$(curl -sS https://download.newrelic.com/php_agent/release/ | sed -n 's/.*>\(.*linux\).tar.gz<.*/\1/p')" && \
    curl -sS "https://download.newrelic.com/php_agent/release/${NEWRELIC_VERSION}.tar.gz" | gzip -dc | tar xf - && \
    cd "${NEWRELIC_VERSION}" && \
    NR_INSTALL_SILENT=true ./newrelic-install install && \
    cd .. && \
    unset NEWRELIC_VERSION && \
    sed -i \
        -e "s/newrelic.enabled =.*/newrelic.enabled = 1/" \
        -e "s/newrelic.license =.*/newrelic.license = $NEWRELIC_LICENSE/" \
        -e "s/newrelic.appname =.*/newrelic.appname = $NEWRELIC_APP_NAME/" \
        /usr/local/etc/php/conf.d/newrelic.ini \
;fi

#####################################
# Install blackfire client
# Install blackfire php extension
#####################################
ARG BLACKFIRE_CLIENT_ID=false
ARG BLACKFIRE_CLIENT_TOKEN=false
RUN if [ ${BLACKFIRE_CLIENT_ID} != false -a ${BLACKFIRE_CLIENT_TOKEN} != false ]; then \
    mkdir -p /tmp/blackfire && \
    curl -A "Docker" -L https://blackfire.io/api/v1/releases/client/linux_static/amd64 | tar zxp -C /tmp/blackfire && \
    mv /tmp/blackfire/blackfire /usr/bin/blackfire && \
    rm -Rf /tmp/blackfire && \
    printf "[blackfire]\nclient-id=$BLACKFIRE_CLIENT_ID\nclient-token=$BLACKFIRE_CLIENT_TOKEN\nendpoint=https://blackfire.io\ntimeout=15s\n" > /root/.blackfire.ini && \
    PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") && \
    curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$PHP_VERSION && \
    tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp && \
    mv /tmp/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so && \
    printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > /usr/local/etc/php/conf.d/blackfire.ini \
;fi
