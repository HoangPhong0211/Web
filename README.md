# Hoang Gia Viet Nam - Corporate Website

Premium corporate website for a geotechnical engineering company. The platform showcases services, projects, certifications, and news while providing a secure admin workspace for content and client requests.

## Overview

This application delivers a bilingual-ready marketing presence and a streamlined content management workflow. It is designed for credibility, performance, and professional presentation across desktop and mobile.

## Core Capabilities

- Public pages: home, about, services, projects, partners, certificates, news, privacy.
- Service detail pages with SEO-friendly slugs.
- Project portfolio with featured highlights on the homepage.
- News module with pagination and view tracking.
- Contact form that stores inbound requests with status updates.
- Admin dashboard for posts, services, projects, and contacts.
- Role-based access control for admin-only routes.

## Tech Stack

- Laravel 12 (PHP 8.2)
- Tailwind CSS + Vite
- Alpine.js
- Spatie Laravel Permission

## Requirements

- PHP 8.2+
- Composer 2+
- Node.js 18+ and npm
- MySQL or MariaDB

## Quick Start

1. Install dependencies
    ```bash
    composer install
    npm install
    ```
2. Create environment file and app key
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```
3. Configure database credentials in `.env`, then migrate
    ```bash
    php artisan migrate
    ```
4. Build assets and run the app
    ```bash
    npm run build
    php artisan serve
    ```

## Common Commands

| Command               | Purpose                                                         |
| --------------------- | --------------------------------------------------------------- |
| `composer run setup`  | Install dependencies, create `.env`, migrate, and build assets. |
| `composer run dev`    | Full dev stack: server, queue, logs, and Vite.                  |
| `php artisan migrate` | Run database migrations.                                        |
| `npm run dev`         | Start Vite in watch mode.                                       |
| `npm run build`       | Build production assets.                                        |

## Admin Access

Admin routes are protected by authentication and the `admin` role. Assign the role via database or seed data before accessing `/admin`.

## Content Model

- Services: published services with ordered display and detail pages.
- Projects: portfolio entries with year, location, and summary.
- News: posts with categories, author, and view tracking.
- Contacts: inbound requests with status and notes.

## Deployment Notes

- Set `APP_ENV=production` and `APP_DEBUG=false` in production.
- Run `php artisan config:cache` and `php artisan route:cache` after deployment.
- If you store uploaded media, run `php artisan storage:link`.

## License

This project is proprietary and intended for the client listed in the contact section of the site.
