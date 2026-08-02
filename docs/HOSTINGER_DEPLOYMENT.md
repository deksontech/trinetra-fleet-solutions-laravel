# Hostinger Deployment Guide

## 1. Create The MySQL Database

In Hostinger hPanel, create a MySQL database and user. Save the database name, username, password, host, and port.

## 2. Upload Files

Upload the contents of `trinetra-laravel` to a private folder outside `public_html` where possible, for example `domains/example.com/trinetra-laravel`.

## 3. Configure `public_html`

Best option: point the domain document root to `trinetra-laravel/public`.

Fallback option: copy the contents of `trinetra-laravel/public` into `public_html`, then update `public_html/index.php` so `$app` points to the real Laravel folder:

```php
require __DIR__.'/../trinetra-laravel/vendor/autoload.php';
$app = require_once __DIR__.'/../trinetra-laravel/bootstrap/app.php';
```

## 4. Configure Laravel Public Directory

Keep only public assets, `index.php`, `.htaccess`, built Vite assets, and uploaded public files web-accessible. Do not expose `.env`, `app`, `database`, `storage`, or `vendor` directly.

## 5. Set `.env`

Copy `.env.example` to `.env` and set production values for `APP_URL`, `APP_KEY`, MySQL, mail, session, filesystem, and Trinetra contact details.

## 6. Install Composer Dependencies

From SSH:

```bash
composer install --no-dev --optimize-autoloader
```

If SSH Composer is unavailable, install dependencies locally with the same PHP version and upload `vendor`.

## 7. Run Migrations

```bash
php artisan migrate --force
```

## 8. Run Seeders

```bash
php artisan db:seed --force
```

Set `ADMIN_EMAIL` and `ADMIN_PASSWORD` before running seeders.

## 9. Create Storage Link

```bash
php artisan storage:link
```

If symlinks are disabled, map or copy `storage/app/public` to `public/storage` according to Hostinger support guidance.

## 10. Set Folder Permissions

Ensure these folders are writable by PHP:

```text
storage
bootstrap/cache
```

Typical permissions are `755` for folders and `644` for files, with writable permissions for the PHP user on the two directories above.

## 11. Configure SMTP

Set:

```env
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

Submit a test quote and contact form after deployment.

## 12. Clear And Cache Configuration

```bash
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 13. Set Application URL

Set `APP_URL=https://your-domain.com` and use HTTPS.

## 14. Create First Admin Account

Either seed it:

```bash
php artisan db:seed --force
```

Or create it in Tinker using Laravel password hashing if a custom account is needed.

## 15. Test Forms And Email

Test `/request-a-quote`, `/contact`, `/careers/{slug}`, and `/admin/leads`. Confirm leads are saved, email notifications arrive, and customer acknowledgements are sent.

## 16. Troubleshooting

403 errors usually indicate wrong document root, file permissions, or missing `.htaccess`.

404 errors usually indicate Apache rewrite rules are not active or the domain points outside Laravel `public`.

500 errors usually indicate invalid `.env`, missing `APP_KEY`, missing vendor files, unwritable `storage`, database connection failure, or cached configuration from an old environment.

Run:

```bash
php artisan optimize:clear
tail -n 100 storage/logs/laravel.log
```
