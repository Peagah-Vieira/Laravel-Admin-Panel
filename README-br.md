# Laravel Admin Panel

Painel de administração construído usando Laravel e Tailwind

## Features

-   Login no Github e no Gitlab
-   Funções e permissões
-   Autenticação 2FA
-   Saúde do aplicativo
-   Tema claro e escuro

## Demonstração em vídeo

https://www.youtube.com/watch?v=0qIb5d6CR04

## Executando localmente

Clonar o projeto

```bash
git clone https://github.com/Peagah-Vieira/Laravel-Admin-Panel
```

Instale as dependências

```bash
npm install
composer install
```

Alterar variáveis ​​de ambiente

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

Migrar o banco de dados

```bash
php artisan migrate:fresh --seed
```

Iniciar o servidor

```bash
npm run dev
```

## Documentação

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)

[![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
