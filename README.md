# E-commerce-TALL-STACK-template

A ready-to-use e‑commerce starter built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire). Designed by Bruno Rossani, a Laravel/Vue full‑stack developer from Uruguay.

## Tech Stack
[![Laravel](https://img.shields.io/badge/Laravel-v11.x-blue.svg?style=flat&logo=laravel)](https://laravel.com/)
[![Livewire](https://img.shields.io/badge/Livewire-v2.x-green.svg?style=flat&logo=livewire)](https://laravel-livewire.com/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-teal.svg?style=flat&logo=tailwindcss)](https://tailwindcss.com/)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-black.svg?style=flat&logo=alpine.js)](https://alpinejs.dev/)

## Features
- User registration, login, and email verification
- Shopping cart with Stripe payment integration
- Full CRUD for categories, products, tags, and orders
- Like system for products
- Responsive UI powered by Tailwind CSS and Alpine.js

## Installation
1. **Clone the repository**
   `git clone https://github.com/yourusername/E-commerce-TALL-STACK-template.git`
2. **Install PHP dependencies**
   `composer install`
3. **Copy environment file and generate key**
   `cp .env.example .env`
   `php artisan key:generate`
4. **Configure database** in `.env` and run migrations & seeders
   `php artisan migrate --seed`
5. **Install front‑end assets**
   `npm install && npm run dev`
6. **Start the development server**
   `php artisan serve`
