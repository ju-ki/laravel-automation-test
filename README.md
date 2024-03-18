### プロジェクト導入方法

コマンドライン
```
git clone https://github.com/ju-ki/laravel-automation-test.git
```

コマンドライン
##### 初期設定
```
cd laravel-automation-test
composer install
npm install
touch database/database.sqlite
touch database/database.dusk.sqlite
cp .env.example .env
cp .env.example .env.dusk.local
```

##### envファイル修正
before
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=post_app
DB_USERNAME=root
DB_PASSWORD=
```
after
```
DB_CONNECTION=sqlite
```

##### env.dusk.local
before
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=post_app
DB_USERNAME=root
DB_PASSWORD=
```

after
```
APP_NAME=Laravel
APP_ENV=dusk
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite_dusk
```



コマンドライン
```
php artisan config:clear
php artisan migrate
php artisan key:generate
php artisan serve
npm run dev
```
で恐らくサーバーは起動します

##### Dusk設定
```
php artisan migrate --env=dusk.local
php artisan key:generate --env=dusk.local
php artisan dusk:chrome-driver --detect
or
php artisan dusk:install
./vendor/laravel/dusk/bin/chromedriverのexeファイル
(別タブにて)
### ページ遷移テスト
php artisan dusk .\test\Browser/TopPageTest.php
### DBテスト(ajaxテスト)
php artisan dusk .\test\Browser/Pages\BuildingDetailTest.php
```

discordの方法について後ほど記述します
