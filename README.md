# ABC保育園

## 概要

保育園のウェブサイト

## 環境構築手順

1.GitHubよりダウンロード

 - $　git clone https://github.com/yakushido/preschool.git

2.Dockerのコンテナを作成、起動

 - $ docker compose up -d --build
  
4..envファイルの書き換え

 - $ docker-compose exec app bash
 - $ cp .env.example .env
 - .env内の下記項目を次に書き換え

    DB_CONNECTION=mysql
    
    DB_HOST=db
    
    DB_PORT=3306
    
    DB_DATABASE=preschool
    
    DB_USERNAME=yaku
    
    DB_PASSWORD=yaku

5.storage 以下に書き込み権限を付ける

 - $ chmod 777 -Rf storage

6.APP_KEYの生成

 - $ php artisan key:generate

7.マイグレーションの実行

 - $ docker-compose exec app bash

 - $ php artisan migrate

8.シーダーの実行

 - $ php artisan db:seed

9.シンボリックリンクを設定する

 - $ php artisan storage:link

## 制作目的

- 保育園への欠席などの連絡をボタン一つでできる。
- 園児の写真の購入。
- カレンダーで園児の出欠管理。

## 使用技術

- フロントエンド
  - HTML / CSS
  - jQuery 3.5.1

- バックエンド
  - PHP 8.1.7
  - Laravel 8.83.12

- データベース
  - MySQL 5.7.34

## 機能一覧

1.ユーザー

- メール認証
- ログイン・ログアウト
- ブログの閲覧
- ブログの評価
- イベントの閲覧
- ユーザーの欠席などの連絡
- マイページの月間カレンダーで出欠状況の閲覧
- 写真の購入
- ウェブサイトのQRコード

2.教員

- メール認証
- ユーザーの登録
- ユーザーの出欠の追加・編集・削除
- ユーザーへメールの送信
- ブログの投稿・編集・削除
- 写真の投稿・削除
- イベントの投稿・編集・削除・作成

3.管理者

- 教員の登録
- 管理者の登録

    管理者のログイン

    email:admin@example.com

    password:admin@example.com
