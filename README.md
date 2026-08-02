# Trinetra Fleet Solutions Laravel Application

This folder contains the Laravel and MySQL version of the Trinetra Fleet Solutions website. The original Next.js project has been left untouched in the repository root.

## Local Setup

```bash
cd trinetra-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Admin Login

The initial admin account is created by `database/seeders/DatabaseSeeder.php`.

Set these values in `.env` before seeding:

```env
ADMIN_EMAIL=admin@trinetrafleetsolutions.com
ADMIN_PASSWORD=change-this-password
```

Then visit `/admin/login`.

## Required Environment Variables

```env
APP_NAME=
APP_ENV=
APP_KEY=
APP_DEBUG=
APP_URL=
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
TRINETRA_ADMIN_EMAIL=
TRINETRA_PHONE=
TRINETRA_WHATSAPP=
TRINETRA_ADDRESS=
SESSION_DRIVER=database
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public
```

## Validation Commands

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan test
npm install
npm run build
php artisan route:list
php artisan config:cache
php artisan view:cache
```

## Included Functionality

The Laravel app includes Blade public pages, seeded fleet/service/location/tour/blog/career/legal content, secure admin login, lead dashboard, MySQL migrations, Eloquent models, CSRF-protected forms, server-side validation, email notifications, sitemap, robots.txt, security headers, upload validation for CV files, and public storage support.

The admin dashboard currently exposes the same lead-management surface and module map needed for full content operations. Additional CRUD screens can be expanded from the existing Eloquent models without changing the database design.
