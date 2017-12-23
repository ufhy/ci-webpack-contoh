# CodeIgniter Webpack contoh

hanya untuk contoh (capek configurasi di awal project dibuat)

setup paket nodejs dan composer install
```sh
npm install
composer install
```

development:
```sh
npm run dev
```
compress js, css:
```sh
npm run build
```

start php server
```sh
cd public
php -S localhost:8080
```

yang digunakan:
- [Codeigniter composer installer](https://github.com/kenjis/codeigniter-composer-installer)
- [Asset, Template dan Pyrocache dari pyrocms (ci)](https://github.com/pyrocms/pyrocms/tree/2.2/master)
- [Forensics for CodeIgniter](https://github.com/lonnieezell/codeigniter-forensics)
- [Webpack 3](https://webpack.js.org)

Apabila tidak menggunakan webpack anda bisa langsung menyimpan file css dan js di folder public
dapat dilihat struktur folder di file application/config/application.php:
```php
$config['assets.asset_paths'] = array(
    'core' => 'assets/',
    'module' => 'modules/',
);

$config['assets.asset_js_dir'] = 'js/';
$config['assets.asset_css_dir'] = 'css/';
$config['assets.asset_img_dir'] = 'img/';
```

untuk production, manual configurasi ada pada public/index.php:56   
```php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
```
ubah menjadi
```php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');
```

Asset library sudah memiliki fungsi minify dan mengelompok kan file js dan css berdasarkan kelompok
