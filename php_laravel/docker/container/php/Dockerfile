# ベースイメージの指定
FROM php:fpm-buster

# 作成した設定ファイルをコンテナ内にコピー
COPY ./container/php/php.ini /usr/local/etc/php/php.ini

# パッケージのインストール
RUN apt-get update
RUN apt-get -y install git zip unzip vim
RUN docker-php-ext-install pdo_mysql

RUN mkdir -p /var/www/html/storage/framework/cache/data && \
    mkdir -p /var/www/html/storage/framework/sessions && \
    mkdir -p /var/www/html/storage/framework/views && \
    mkdir -p /var/www/html/storage/framework/testing && \
    chmod -R 777 /var/www/html/storage
    
# composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# コンテナ内で作業する際のカレンとディレクトリの指定
WORKDIR /var/www/html