# Learning laravel

Learning laravel by creating recipebook application

## Installation

Use [npm](https://nodejs.org/en/) to install js related dependencies

```bash
npm install
```

Use [composer](https://getcomposer.org/) to install laravel related dependencies

```bash
composer install
```

Create mysql database and set .env options accordingly

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[your database name]
DB_USERNAME=[your database username]
DB_PASSWORD=[your database password]
```

Start development server

```bash
php artisan serve
```

Watch for static assets change

```bash
npm run watch
```
