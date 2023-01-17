
# Laravel Gym Dashboard

Project using Laravel, Filament and TALL stack.


## Features

- Light/Dark mode toggle
- Application Health
- Roles and permission
- 2FA Authentication
- Github/Gitlab login


## Deployment

1. Clone the repo
   ```sh
    git clone https://github.com/Peagah-Vieira/LaravelGymPanel.git
   ```
2. Install NPM packages
   ```sh
    npm install
   ```
3. Install Composer packages
    ```sh
    composer install
    ```
4. Migrate database
    ```sh
    php artisan migrate:fresh --seed
    ```

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

```env
GITHUB_ID
GITHUB_CLIENT_SECRET
GITHUB_REDIRECT
```
```env
GITLAB_CLIENT_ID
GITLAB_CLIENT_SECRET
GITLAB_REDIRECT
```


## Documentation

 - [Laravel](https://laravel.com)
 - [Tailwind](https://tailwindcss.com)
 - [Filament](https://filamentphp.com)

