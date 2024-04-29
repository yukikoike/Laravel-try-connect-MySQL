FROM php:8.3-fpm

# Composerをインストール
# composer:latestの/usr/bin/composerをDockerコンテナの/usr/bin/composerにコピーする。
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravelプロジェクトのファイルをコンテナにコピー
COPY . /var/www

# ワーキングディレクトリを設定
WORKDIR /var/www

RUN docker-php-ext-install pdo_mysql

# コンテナがリッスンするポートを指定
EXPOSE 8000

# Laravelサーバーの起動コマンド
CMD php artisan serve --host=0.0.0.0 --port=8000