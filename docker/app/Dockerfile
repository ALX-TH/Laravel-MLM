FROM php:7.1.9-fpm

# Prevent error in terminal
ENV TERM="xterm-256color"
RUN export TERM=xterm-256color

# Installing dependencies
RUN apt-get update && apt-get install -y \
    build-essential automake libtool \
    git \
    mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip gnupg \
    jpegoptim optipng pngquant gifsicle \
    supervisor

# Compile libsass
# Fetch sources
RUN cd /usr/local/src && git clone https://github.com/sass/libsass.git
RUN cd /usr/local/src && git clone https://github.com/sass/sassc.git libsass/sassc

# Create configure script
RUN cd /usr/local/src/libsass && autoreconf --force --install

# Create custom makefiles for **shared library**
RUN cd /usr/local/src/libsass && ./configure --disable-tests --enable-shared --prefix=/usr

# Build the library libSass
RUN cd /usr/local/src && make -C libsass -j4

# Install the library libSass
RUN cd /usr/local/src && make -C libsass -j4 install
# @Compile libsass

# Install NODEJS
RUN apt-get update \
    && curl -sL https://deb.nodesource.com/setup_10.x | bash - \
    && apt-get install -y nodejs \
    && npm install npm -g \
    && npm install yarn -g

#npm install gulp -g && npm install bower -g

# Clear cache
RUN apt-get autoremove -y && apt-get clean all
RUN rm -rf /var/lib/apt/lists/*

# Installing extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Installing composer
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN composer self-update && composer --version

# Add php configuration file & make php logs directory
ADD php.ini /usr/local/etc/php/conf.d/custom.ini
RUN mkdir /var/log/php

# Add configuration file for supervisor
ADD supervisord.conf /etc/supervisor/supervisord.conf

# Allow container to write on host
RUN usermod -u 1000 www-data

WORKDIR /application
VOLUME /application

CMD ["/usr/bin/supervisord", "-n"]
