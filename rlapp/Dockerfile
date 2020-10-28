FROM php:7.2-fpm
RUN apt-get update && apt-get install -y \
    ssh \
    libssh2-1 \
    libssh2-1-dev \
    wget \
    libssl-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install ssh2 extension
RUN wget -O libssh2.tar.gz https://www.libssh2.org/download/libssh2-1.8.1.tar.gz \
    && wget -O ssh2.tgz https://pecl.php.net/get/ssh2-1.1.2.tgz \
    && mkdir libssh2 && tar vxzf libssh2.tar.gz -C libssh2 --strip-components 1 \
    && mkdir ssh2 && tar vxzf ssh2.tgz -C ssh2 --strip-components 1 \
    && cd libssh2 && ./configure \
    && make && make install \
    && cd ../ssh2 && phpize && ./configure --with-ssh2 \
    && make && make install \
    && echo "extension=ssh2.so" >> /usr/local/etc/php/conf.d/ssh2.ini \
    && cd ../ && rm -rf libssh2.tar.gz ssh2.tgz ssh2 libssh2

RUN mkdir /app
COPY index.php /app
COPY handoff.php /app
COPY main.css /app
COPY pre-copy.php /app
COPY reset.php /app
COPY logo.png /app
RUN chown -R www-data:www-data /tmp
RUN echo "nameserver 8.8.8.8" | tee /etc/resolv.conf > /dev/null
EXPOSE 80
