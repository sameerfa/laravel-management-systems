## Hotel/ Resort Management System

Traditionally, a hotel property management system was defined as a system that enabled a hotel or group of hotels to manage front-office capabilities, such as booking reservations, guest check-in/checkout, room assignment, managing room rates, and billing.

![alt text](https://raw.githubusercontent.com/sameerfa/laravel-management-systems/Hotel/public/hotel.png)

## Deployment

Set DB Credentials on .env file, you can copy the env example file and edit.

```php
composer install
```

```php
php artisan migrate --seed
```

```php
php artisan key:generate
```

```php
php artisan storage:link
```


## Default Credentials


```php
Username: admin@admin.com
Password: password
```


## Other Tools
- [CRM](https://github.com/sameerfa/laravel-management-systems)
- [Hospital](https://github.com/sameerfa/laravel-management-systems/tree/Hospital)
- [Hotel](https://github.com/sameerfa/laravel-management-systems/tree/Hotel)
- [LMS](https://github.com/sameerfa/laravel-management-systems/tree/LMS)
- [Library](https://github.com/sameerfa/laravel-management-systems/tree/Library)
- [Project](https://github.com/sameerfa/laravel-management-systems/tree/Project)