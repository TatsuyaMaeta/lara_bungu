### これはLaravelのYoutubeの動画を見て作成したサンプルデモです
### URL: https://www.youtube.com/watch?v=rHf-PYfJ2lU&t
### 参考記事: https://chikaraemon.com/wordpress/2022/08/10/laravel9_20220809/

ID hogehoge@hoge.com
pass qwerty123 



誰が商品登録をしたかのカラムをbunbougusテーブルに追加するためのmigrationファイルを作成する(このファイルで何を追加したいのかをadd_user_id_to_bunbougus.phpのマイグレーションふぁいるのupに記述する)
既存のテーブルに追加したい場合は'--table='と付ける
php artisan make:migration add_user_id_to_bunbougus --table=bunbougus

migrationファイルに記述したらmigrateする
php artisan migrate


php artisan make:migration create_kyakusakis_table


php artisan migrate:refresh --step=1 --path=database/migrations/2023_04_10_094035_create_kyakusakis_table.php

### php artisan migrate:refresh -step
 resetでなく、rollbackを実行し、migrateを実行できる


基本的な流れ
1. テーブル作成するためにmigrationファイル作成
   1. make:migration <migrationファイル名> でmigrateファイル作成
   2. migrateファイルのupメソッドにてカラムの設定をする
   3. テーブルにカラムが設定できたことを確認にて完了
2. 作ったテーブル用にデフォルト設定のデータをseederで設定
   1. 
    make:seederでseeder設定を作る
    ```
    php artisan make:seeder KyakusakisSeeder
    ```
   2. 1で生成したKyakusakisSeeder.phpのrunメソッド内にて詳細を設定
      1. 
      ``` 
      DB::table('kyakusakis')->insert()
      ```
      で初期設定での流し込みたいデータを記述する
      2. 
      作ったseederファイルの設定をDBに反映させる  
      ```
      php artisan db:seed --class=KyakusakisSeeder
      ```
      その際は反映させたいseederファイル名のclass名をオプションで記述する
3. モデルを作成する 
   1. 
   準備できたテーブルに対してロジック部分のmodelを設定する
    ```
    php artisan make:model Kyakusaki
    ```
    ※modelは大文字なので注意(Class名は大文字から始まる)




1. 
    テーブル作成用のmigrationファイル作成
    ```
    php artisan make:migration create_juchus_table
    ```
2.  作成したmigrate用ファイルにカラムの設定をupメソッド内に記述
3.  カラム設定をmigrateしてDBに反映させる
    その場合のmigrateはrefreshさせて反映させるが引数を下記の様に加えて実行すること
    ```
    php artisan migrate:refresh --step=1 --path=database/migrations/2023_04_10_105649_create_juchus_table.php
    ```
4. テーブルの生成を確認して問題なければOK
5. テーブルに初期値としてのデータを入力するseederファイルを作成、登録する
   1. seederファイル作成
   ```
    php artisan make:seeder JuchusSeeder
   ```
   2. seeder用ファイルのrunメソッドに初期設定データを入力する(その際はテーブルのカラム名と相違ない様に注意すること)
   3. seederファイルの初期設定情報をオプションでclass名を指定して反映させる
    ```
    php artisan db:seed --class=JuchusSeeder
    ```
   4. ダミーデータがテーブルに挿入されていればOK
6. コントローラー周り
   1. コントローラーの作成
   ```
   php artisan make:controller JuchuController --resource --model=Juchu
   ```
   (※モデルも同時に生成)
   2. controllerにどんなデータを渡すか書いていく




1. 状態テーブル作成のためのmigration
    ```
    php artisan make:migration create_jotais_table
    ```
2. migrationファイル内のupメソッド編集後、migrate実行
```
php artisan migrate:refresh --step=1 --path=database/migrations/2023_04_10_122119_create_jotais_table.php
```
3. テーブルが作成できたらデフォルト設定データを流し込むためのseederファイルを作成する
```
php artisan make:seeder JotaisSeeder
```
4. 初期値をdatabase/seeders/JotaisSeeder.phpに記述する
5. database/seeders/JotaisSeeder.phpのclassをDBに反映させる
```
php artisan db:seed --class=JotaisSeeder
```
6. modelの作成
```
php artisan make:model Jotai
```


デバッグ用ツール
```
composer require barryvdh/laravel-debugbar --dev
```
URL: 
https://qiita.com/goto_smv/items/b7be0985029ab3d03217
