FROM ruby:3.1.1
# ベースにするイメージを指定

RUN apt-get update -qq && apt-get install -y build-essential libpq-dev nodejs default-mysql-client vim
# RailsのインストールやMySQLへの接続に必要なパッケージをインストール

RUN mkdir /myapp
# コンテナ内にmyappディレクトリを作成

WORKDIR /myapp
# 作成したmyappディレクトリを作業用ディレクトリとして設定

COPY ../src/Gemfile /myapp/Gemfile
COPY ../src/Gemfile.lock /myapp/Gemfile.lock
# ローカルの Gemfile と Gemfile.lock をコンテナ内のmyapp配下にコピー

RUN gem install bundler:2.3.7
RUN bundle install
# コンテナ内にコピーした Gemfile の bundle install

COPY src/* /myapp
# ローカルのmyapp配下のファイルをコンテナ内のmyapp配下にコピー

COPY docker/entrypoint.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]
EXPOSE 3000

CMD ["rails", "server", "-b", "0.0.0.0"]
