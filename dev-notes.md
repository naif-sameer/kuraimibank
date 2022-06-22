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

## Resources

```bash
php artisan make:resource UserResource

# collection
php artisan make:resource UserCollection
```

## Request

```bash
php artisan make:request CreateUserRequest
php artisan make:request UpdateUserRequest


php artisan make:request WebsiteInfoRequest

```

## roles

```
name    =>     'required|max:255'
sale    =>     'required|numeric'
image   =>     "required|image|mimes:jpeg,jpg,png|max:2048",

```

## commits

update: WebsiteInfoController validation roles

update: City Controller RequestFile validation roles

## file upload

```php
# add
$fileName = $this->storeImage($request->file('image'));

# update
$oldFileName = MainService::where('id', $id)->first()->image;

if ($request->file('image')) $fileName = $this->updateImage($request->file('image'), $oldFileName);
else $fileName = $oldFileName;
```
