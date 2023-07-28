# Laravel Admin Panel

Painel de administração construído usando Laravel e Tailwind

## Features

-   Login no Github e no Gitlab
-   Funções e permissões
-   Autenticação 2FA
-   Saúde do aplicativo
-   Tema claro e escuro

## Demonstração em vídeo

[![Watch the video](https://gcdnb.pbrd.co/images/0wvz7rsCv1g4.png?o=1)](https://www.youtube.com/watch?v=0qIb5d6CR04)

## Executando localmente

Clonar o projeto

```bash
git clone https://github.com/Peagah-Vieira/Laravel-Admin-Panel
```

Instale todas as dependências usando o composer

```bash
composer install
```

Instale todas as dependências usando npm

```bash
npm install
```

Copie o arquivo env de exemplo e faça as alterações de configuração necessárias no arquivo .env

```bash
cp .env.example .env
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
