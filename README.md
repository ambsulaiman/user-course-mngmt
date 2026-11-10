# SchoolHub LMS

A modern school management and course portal built with Laravel. The application helps schools manage academic programs, showcase courses, and enable student enrollment in a clean and professional experience.

## Overview

SchoolHub is designed for educational institutions that want a simple, elegant system to:

- display academic programs and courses
- manage course information from an admin dashboard
- allow authenticated students to enroll and unenroll
- restrict course creation and editing to administrators
- provide a polished school landing page for visitors

## Features

- Public course catalog
- Admin-only course creation, editing, and deletion
- Student enrollment and unenrollment workflows
- Course capacity validation
- Responsive school-themed UI
- Laravel authentication flow for login/logout
- Clean admin and student navigation experience

## Tech Stack

- Laravel 12
- PHP 8.2+
- Tailwind CSS
- MySQL / SQLite-compatible database setup
- Vite for frontend asset compilation

## Project Structure

- `app/Http/Controllers` — controllers for course management and authentication
- `app/Http/Requests` — validation rules
- `app/Models` — Eloquent models
- `database/migrations` — schema definitions
- `resources/views` — Blade templates and UI layouts
- `routes/web.php` — application routes
- `tests/` — feature and validation tests

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- A database (SQLite, MySQL, or PostgreSQL)

## Local Setup

1. Clone the repository
2. Install PHP dependencies:

```bash
composer install
```

3. Install JavaScript dependencies:

```bash
npm install
```

4. Create a local environment file:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database connection in `.env`
6. Run migrations:

```bash
php artisan migrate
```

7. Start the backend:

```bash
php artisan serve
```

8. Start the frontend build watcher in a second terminal:

```bash
npm run dev
```

9. Open the app in your browser:

```text
http://127.0.0.1:8000
```

## Admin Access

This project includes admin authorization checks for course management actions. To use admin features, create a user with `is_admin` set to `true` in the database or via a seeded admin account.

## Testing

Run the test suite with:

```bash
php artisan test
```

## License

This project is open-sourced software licensed under the MIT license.
