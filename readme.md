# Beater

The Modular Laravel template to start projects.

## Install

Clone this repository

```bash
git clone git@github.com:oliverds/beater.git
```

Install the composer dependencies

```bash
composer install
```

Create .env file

```bash
cp .env.example .env
```

Set the application key

```bash
php artisan key:generate
```

Run the migrations

```bash
php artisan module:migrate
```

[Set the admin users](https://github.com/oliverds/beater/blob/master/database/seeds/UserSeeder.php#L20)

Run the seeds

```bash
php artisan db:seed
```