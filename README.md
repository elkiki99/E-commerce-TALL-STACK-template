# E-commerce-TALL-STACK-template

A ready-to-use e‑commerce starter built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire).

## Tech Stack
[![Laravel](https://img.shields.io/badge/Laravel-v11.x-blue.svg?style=flat&logo=laravel)](https://laravel.com/)
[![Livewire](https://img.shields.io/badge/Livewire-v3.x-green.svg?style=flat&logo=livewire)](https://laravel-livewire.com/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-teal.svg?style=flat&logo=tailwindcss)](https://tailwindcss.com/)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-black.svg?style=flat&logo=alpine.js)](https://alpinejs.dev/)
[![SQLite](https://img.shields.io/badge/SQLite-3-003B57?logo=sqlite)](https://www.sqlite.org)

## Features
- User registration, login, and email verification
- Shopping cart with Stripe / Mercado Pago integration
- Product catalog with categories and filters
- Admin panel for managing products and orders
- Responsive UI with Tailwind CSS and Alpine.js

## Installation

1. Clone the repository: `git clone https://github.com/elkiki99/E-commerce-TALL-STACK-template.git`
2. Install dependencies: `composer install && npm install`
3. Copy the environment file: `cp .env.example .env`
4. Generate the application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Start the development server: `php artisan serve`
