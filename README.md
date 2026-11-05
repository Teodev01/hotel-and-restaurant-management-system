# Hotel and Restaurant Management System

School project: Hotel and Restaurant Management System.

This application uses Laravel 13, PHP 8.3+, Blade, and Vite.

## Local development with XAMPP

1. Install PHP dependencies with `composer install`.
2. Copy `.env.example` to `.env`, configure your local database, and run `php artisan key:generate`.
3. Run `php artisan migrate`.
4. Install frontend dependencies with `npm install`, then start Vite with `npm run dev`.
5. Start Laravel with `php artisan serve`, or use `composer run dev`.

## Deploying to Vercel

The repository includes a Dockerfile for Vercel's beta Container Runtime. Import this repository into Vercel with the repository root as the project root.

Set these values in Vercel's project environment settings; do not commit secrets:

- `APP_KEY`: generate with `php artisan key:generate --show`.
- `APP_ENV=production` and `APP_DEBUG=false`.
- PostgreSQL connection settings for a hosted database, such as Neon: `DB_CONNECTION=pgsql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, and `DB_SSLMODE=require`.

Run `php artisan migrate --force` against the hosted database before using the deployed app. The Vercel container filesystem is not persistent; use external storage for any future user uploads.
