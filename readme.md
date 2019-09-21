Laradockの環境構築、vue.jsの勉強の備忘録として立ち上げたリポジトリです。

Laradockの環境構築の手順<br>

　※環境構築していく中で<br>
　①　MySQL8.0で構築していくとエラーが出る<br>
　②　MySQLに繋がらない<br>
　といったことがあり、自分なりに悪戦苦闘したものを記録を残しました<br>
　微笑ましい目で見ていただければ幸いです<br>

１　Laradockのインストール<br>
２　.envファイルの作成、編集<br>
３　コンテナの起動<br>
４　Laravelプロジェクトの作成<br>
５　mysqlに接続<br>

１　Laradockのインストール<br>
　　今回のディレクトリの構造は以下のようになっています<br>
　　(root) -- sampleapp -- laradock(laradock本体)<br>
　　　　　　　　　　　　-- dockapp(laravelプロジェクト)<br>

　(1)　あらかじめmkdir sampleappで開発環境を整えるためのディレクトリを作成しておく<br>
　(2)　cd sampleappでカレントディレクトリを変更<br>
　(3)　下記コマンドでLaradockをsampleappディレクトリ内にCloneします<br>
　　　　$ git clone https://github.com/LaraDock/laradock.git<br>
　(4)　cd laradockでクローンしたLaradockに移動<br>

２　.envファイルの作成、編集<br>
　(1)　$ cp env-example .envで .envファイルを作成<br>
　(2)　.envファイルを編集します<br>
 　　①　今回の環境構築はMySQL 5.7で行っています。MySQL8.0にしなかったのはMySQL8.0からセキュ<br>
　　　リティが強化されたため、MySQLでコンテナを立ち上げてマイグレーションするとエラー（The server<br>　
　　　requested authentication method unknown to the client）が発生するからです。<br>
　　　　なので、この段階で、.envのMySQLのバージョンのところを<br>

 　　　MYSQL_VERSION=5.7 // latest → 5.7<br>

　　　 にしました。<br>
　　②　今回、nginxのポート番号を80 → 8888 に変更しました。<br>
　　　 (macのApacheが利用するポートとダブらないように)<br>
　　　NGINX_HOST_HTTP_PORT=8888 // 80 → 8888<br>

３　コンテナの起動<br>
 　 laradock内で実行<br>
 　　$ docker-compose up -d nginx mysql phpmyadmin<br>
　　→　mysqlだけ起動されない?<br>
　　　MySQLを5.7にした場合、DATA_PATH_HOSTで設定したフォルダを綺麗にして、イメージを作成し直<br>
　　　す必要があるらしいです。<br>
　　①　パス確認<br>
　　　　$ cat .env | grep DATA_PATH_HOST<br>
　　　　自分の場合は　DATA_PATH_HOST=~/.laradock/data　が表示されました。<br>
　　②　パス、イメージ、コンテナを消去<br>
　　　　rm -rf ~/.laradock/data/mysql<br>
　　　　docker rmi laradock_mysql -f<br>
　　　　docker rmi mysql -f<br>
　　③　mysqlをビルドし直し<br>
　　　　docker-compose build --no-cache mysql<br>
　　④　docker ps でちゃんと動いているか確認しましょう。<br>

４　Laravelプロジェクトの作成<br>
　(1)　workspaceに入る<br>
　　　$ docker exec -it laradock_workspace_1 bash<br>
　(2)　Laravelプロジェクトの作成<br>
　　　# composer create-project laravel/laravel dockapp(任意のアプリ名)<br>
　(3)　コンテナから出る<br>
 　　　# exit<br>
　(4)　設定変更をするため一時停止<br>
　　　$ docker-compose stop<br>
　(5)　設定変更<br>
 　　　laradockの.envの<br>

 　　　APP_CODE_PATH_HOST=../　を<br>

 　　　APP_CODE_PATH_HOST=../dockapp(自分の作ったディレクトリに対するLaradock起点での<br>
　　　任意のパスを書き込んでください）<br>

　　　に変更します。<br>

　ブラウザでhttp://localhost:8888/ につなぐと例の画面が出てくるはずです<br>
　（出てこない場合は多分APP_CODE_PATH_HOSTのパス間違い）<br>

５　MySQLに接続<br>
　(1)　コンテナを立ち上げてdocker psでworkspaceのIPアドレスを見る<br>
 　　　$ docker-compose up -d nginx mysql<br>
　　　$ docker ps （これでworkspaceのコンテナIDを見られる）<br>
　　　$ docker inspect (workspaceのIPアドレス)<br>
　(2)　mysql内に入る<br>
　　　$ docker-compose exec mysql bash<br>
　　　# mysql -u root -p<br>
　　　# （パスワードはLaradockの.envのMYSQL_ROOT_PASSWORDを見る）<br>
　(3)　データベースを作成<br>
　　　→ create database dockapp(任意の名前);<br>
　(4)　ユーザー作成、権限付与<br>
 　　　→ create user 'root（任意の名前）'@'172.20.0.4（workspaceのIPアドレス）'<br>
　　　identified by 'secret（任意のパスワード）';<br>
　　　→ grant all privileges on *.* to 'root'@'172.20.0.4';<br>
　(5)　mysqlを出る<br>
　　　→ exit<br>
　　　# exit<br>
　(6)　Laradock,Laravelの両方の環境を変更する<br>
　　　①　Laradockの方<br>
　　　　MYSQL_VERSION=5.7<br>
　　　　MYSQL_DATABASE=dockapp（(3)で作ったデータベース）<br>
　　　　MYSQL_USER=root（(4)で作ったユーザー名）<br>
　　　　MYSQL_PASSWORD=secret（(4)で設定したパスワード）<br>
　　　　MYSQL_PORT=3306<br>
　　　　MYSQL_ROOT_PASSWORD=root<br>
　　　　MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d<br>

　　　②　Laravelの方<br>
　　　　DB_CONNECTION=mysql<br>
　　　　DB_HOST=mysql // 127.0.0.1 → mysql<br>
　　　　DB_PORT=3306<br>
　　　　DB_DATABASE=dockapp（Laradockと同じに)<br>
　　　　DB_USERNAME=root（Laradockと同じに）<br>
　　　　DB_PASSWORD=secret（Laradockと同じに）<br>
　(7)　workspaceに入りマイグレーションができるはず<br>
　　　　$ docker-compose up -d nginx mysql<br>
　　　　$ docker exec -it laradock_workspace_1 /bin/bash<br>
　　　　$ php artisan migrate<br>
    　　

 　　
 　　　　
 　　　
