# MRL

A Laravel reading platform. Books are organised into categories, collected onto personal
bookshelves, and sit alongside original stories and reader feedback — with profile management
and full authentication on top.

## Stack

| Layer | Choice |
|---|---|
| Backend | PHP 8, Laravel 9 (`laravel/framework ^9.19`) |
| Auth | Laravel auth scaffolding + Sanctum personal access tokens |
| Frontend | Blade + Vite (`vite.config.js`) |

## Features

- **Library** — `Book`, `Category` and `BookShelf` models with matching controllers
  (`BookController`, `CategoryController`, `BookShelfController`).
- **Stories** — original written content alongside the catalogue (`StoryController`).
- **Feedback** — reader responses to books and stories (`FeedbackController`).
- **Profiles** — per-user profile editing (`ProfileController`) and account status handling via
  the `Status` model.
- **Home** — landing and discovery surface (`HomeController`).

## Schema

`users`, `password_resets`, `failed_jobs`, `personal_access_tokens`, `categories`, `statuses`,
`books`, `stories`, `book_shelves`, `feedback`.

## Running it

```bash
composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate
php artisan migrate --seed

php artisan serve
```
