[![pt-br](https://img.shields.io/badge/lang-pt--br-green.svg)](https://github.com/Peagah-Vieira/Laravel-Admin-Panel/blob/master/README-br.md)

# Laravel Admin Panel

Admin panel built using Laravel and Tailwind

## Features

-   Github and Gitlab login
-   Roles and permission
-   2FA Authentication
-   Application Health
-   Light and dark theme

## Video Demonstration

[![Watch the video](https://gcdnb.pbrd.co/images/0wvz7rsCv1g4.png?o=1)](https://www.youtube.com/watch?v=0qIb5d6CR04)

## Running locally

Clone the project

```bash
git clone https://github.com/Peagah-Vieira/Laravel-Admin-Panel
```

Install the dependencies

```bash
npm install
composer install
```

Change environment variables

```bash
# Laravel Configuration
# APP_NAME="Laravel"
# APP_ENV=local
# APP_KEY="GENERATE A KEY"
# APP_DEBUG=true
# APP_URL=http://localhost

# MySQL Configuration
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE="CHANGE-ME"
# DB_USERNAME="CHANGE-ME"
# DB_PASSWORD="CHANGE-ME"

# Github Socialite Configuration
# GITHUB_ID="CHANGE-ME"
# GITHUB_CLIENT_SECRET="CHANGE-ME"
# GITHUB_REDIRECT="CHANGE-ME"

# Gitlab Socialite Configuration
# GITLAB_CLIENT_ID="CHANGE-ME"
# GITLAB_CLIENT_SECRET="CHANGE-ME"
# GITLAB_REDIRECT="CHANGE-ME"
```

Migrate the database

```bash
php artisan migrate:fresh --seed
```

Start the server

```bash
npm run dev
```

## Documentation

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)

[![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
