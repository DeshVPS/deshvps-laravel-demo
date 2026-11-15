# Cha Ghor Guestbook (Laravel)

A Laravel guestbook used to demo the **Laravel** template on
[DeshVPS](https://deshvps.com) Apps. Messages are stored in the app's MySQL
database, which DeshVPS creates and connects for you. The template runs
`composer install`, generates `APP_KEY` and runs the migrations on start.

Run locally: `composer install`, copy `.env.example` to `.env`,
`php artisan key:generate && php artisan migrate && php artisan serve`.
