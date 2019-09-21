Laradockの環境構築、vue.jsの勉強の備忘録として立ち上げたリポジトリです。

Laradockの環境構築の手順

１　Laradockのインストール<br>
２　.envファイルの作成、編集<br>
３　コンテナの起動<br>
４  Laravelプロジェクトの作成<br>
５  mysqlに接続<br>

１　Laradockのインストール
　　今回のディレクトリの構造は以下のようになっています
　　(root) -- sampleapp -- laradock(laradock本体)
                        -- dockapp(laravelプロジェクト)

 (1)　あらかじめmkdir sampleappで開発環境を整えるためのディレクトリを作成しておく       
 (2)　cd sampleappでカレントディレクトリを変更
 (3) 下記コマンドでLaradockをsampleappディレクトリ内にCloneします
     $ git clone https://github.com/LaraDock/laradock.git
 (4)  cd laradockでクローンしたLaradockに移動

２　.envファイルの作成、編集
 (1)　$ cp env-example .envで .envファイルを作成
 (2)　.envファイルを編集します
 　　①　今回の環境構築はMySQL 5.7で行っています。MySQL8.0にしなかったのはMySQL8.0からセキュリ　　　ティが強化され、MySQLでコンテナを立ち上げてマイグレーションするとエラー（The server 　　　　　requested authentication method unknown to the client）が発生するからです。
 　　　　なので、この段階で、.envのMySQLのバージョンのところを

 　　　MYSQL_VERSION=5.7 // latest → 5.7

　　　 にしました。
　　②　今回、nginxのポート番号を80 → 8888 に変更しました。
　　　 (macのApacheが利用するポートとダブらないように)
　　　　NGINX_HOST_HTTP_PORT=8888 // 80 → 8888

３　コンテナの起動
 　 laradock内で実行
 　　$ docker-compose up -d nginx mysql phpmyadmin
    →　mysqlだけ起動されない?
     MySQLを5.7にした場合、DATA_PATH_HOSTで設定したフォルダを綺麗にして、イメージを作成し直す必要があるらしいです。
   ①　パス確認
      $ cat .env | grep DATA_PATH_HOST
     自分の場合は　DATA_PATH_HOST=~/.laradock/data　が表示されました。
   ②　パス、イメージ、コンテナを消去
      rm -rf ~/.laradock/data/mysql
     docker rmi laradock_mysql -f
     docker rmi mysql -f
   ③　mysqlをビルドし直し
   　  docker-compose build --no-cache mysql
   ④  docker ps でちゃんと動いているか確認しましょう。

４　Laravelプロジェクトの作成
 (1) workspaceに入る
     $ docker exec -it laradock_workspace_1 bash
 (2) Laravelプロジェクトの作成
     # composer create-project laravel/laravel dockapp(任意のアプリ名)
 (3) コンテナから出る
 　　 # exit
 (4) 設定変更をするため一時停止
     $ docker-compose stop
 (5) 設定変更
 　　 laradockの.envの

 　　　APP_CODE_PATH_HOST=../　を

 　　　APP_CODE_PATH_HOST=../dockapp(自分の作ったディレクトリに対するLaradock起点での
    任意のパスを書き込んでください）

　　　変更します。

  ブラウザでhttp://localhost:8888/につなぐと例の画面が出てくるとはずです
  （出てこない場合は多分APP_CODE_PATH_HOSTのパス間違い）

５　MySQLに接続
 (1)　コンテナを立ち上げてdocker psでworkspaceのIPアドレスを見る
 　　  $ docker-compose up -d nginx mysql
      $ docker ps （これでworkspaceのコンテナIDを見られる）
      $ docker inspect (workspaceのIPアドレス)
 (2)  mysql内に入る
      $ docker-compose exec mysql bash
      # mysql -u root -p
      # （パスワードはLaradockの.envのMYSQL_ROOT_PASSWORDを見る）
 (3)  データベースを作成
      → create database dockapp(任意の名前);
 (4)  ユーザー作成、権限付与
 　　　→ create user 'root（任意の名前）'@'172.20.0.4（workspaceのIPアドレス）'
    identified by 'secret（任意のパスワード）';
      → grant all privileges on *.* to 'root'@'172.20.0.4'
 (5)  mysqlを出る
 　　　→ exit
      # exit
 (6)  Laradock,Laravelの両方の環境を変更する
    ①  Laradockの方
        MYSQL_VERSION=5.7
        MYSQL_DATABASE=dockapp（(3)で作ったデータベース）
        MYSQL_USER=root（(4)で作ったユーザー名）
        MYSQL_PASSWORD=secret（(4)で設定したパスワード）
        MYSQL_PORT=3306
        MYSQL_ROOT_PASSWORD=root
        MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d

    ②  Laravelの方
        DB_CONNECTION=mysql
        DB_HOST=mysql // 127.0.0.1 → mysql
        DB_PORT=3306
        DB_DATABASE=dockapp（Laradockと同じに)
        DB_USERNAME=root（Laradockと同じに）
        DB_PASSWORD=secret（Laradockと同じに）
  (7)  workspaceに入りマイグレーションができるはず
　　　　$ docker-compose up -d nginx mysql
       $ docker exec -it laradock_workspace_1 /bin/bash
       $ php artisan migrate
    　　

 　　
 　　　　
 　　　
