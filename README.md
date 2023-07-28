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

Install all the dependencies using composer

```bash
composer install
```

Install all the dependencies using npm

```bash
npm install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
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
