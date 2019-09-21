Laradockの環境構築、vue.jsの勉強の備忘録として立ち上げたリポジトリです。

Laradockの環境構築の手順

１　Laradockのインストール
２　.envファイルの作成、編集
３　コンテナの起動
４  Laravelプロジェクトの作成
５  mysqlに接続

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

      に変更します。

  ブラウザでhttp://localhost:8888/につなぐと例の画面が出てくるとはずです
  （出てこない場合は多分APP_CODE_PATH_HOSTのパス間違い）

     　
 　　
 　　　　
 　　　
