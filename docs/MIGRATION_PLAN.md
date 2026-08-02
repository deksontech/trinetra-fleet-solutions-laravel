# Migration Plan

## Phase 1 - Audit

The existing project was reviewed across `app`, `components`, `lib/data.ts`, API routes, admin pages, and Prisma schema. The source application is a Next.js App Router website with static content data, public enquiry APIs, a lightweight admin lead area, and Prisma models for leads, users, content, media, SEO, and audit records.

## Phase 2 - Laravel Foundation

The Laravel application lives in `trinetra-laravel` and targets PHP 8.2+, Laravel 11, MySQL, Blade, Tailwind CSS, Alpine.js, Vite, Laravel Mail, Laravel filesystem storage, and database-backed sessions.

## Phase 3 - Layout And Components

The global layout, header, footer, cookie notice, hero, content sections, fleet cards, service cards, and quote/contact/career forms have been rebuilt as Blade templates and components.

## Phase 4 - Public Pages

The public route map preserves practical URLs for home, about, fleet, vehicles, services, locations, tours, gallery, blog, careers, contact, quote, legal, HTML sitemap, XML sitemap, robots.txt, and success pages.

## Phase 5 - Forms

Contact, quote, service, vehicle, location, tour, and career enquiries are handled through Laravel form requests, CSRF protection, throttling, database persistence, duplicate-resistant reference numbers, UTM capture, and mail notifications.

## Phase 6 - Admin

The admin panel includes secure login, dashboard statistics, lead management, and a module map for fleet categories, vehicles, services, locations, tours, media, clients, testimonials, gallery, blogs, FAQs, legal pages, SEO settings, website settings, users, roles, permissions, and audit logs.

## Phase 7 - Content Migration

Content from the Next.js data file has been moved into `App\Support\TrinetraData` and seeded into MySQL through `DatabaseSeeder`.

## Phase 8 - SEO, Media, Security, Email

The implementation includes editable SEO columns, sitemap generation, robots.txt, canonical-ready metadata, alt text fields, public storage uploads, SMTP mail configuration, secure sessions, CSRF protection, rate limiting, hashed passwords, mass-assignment guards, and security headers.

## Phase 9 - Validation

Run the documented Composer, Artisan, PHPUnit, npm, Vite, route, config-cache, and view-cache commands on a machine with PHP 8.2+ and Composer installed.
