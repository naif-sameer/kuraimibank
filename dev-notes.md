# dev notes and commands

## seeder

```bash
php artisan make:seeder PageSeeder

# re-run all migrations
php artisan migrate:fresh --seed

# single seeder
php artisan db:seed UserSeeder
```

## migration

```php
$table->boolean('is_active')->default(1);
```

```bash
php artisan make:migration create_users_table

# modal with migration
php artisan make:model WebsiteInfo -m
```

## clear cache

```bash
 php artisan optimize:clear
```

## controller

```bash
# api
php artisan make:controller api/NameController
```
