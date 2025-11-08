# Task Manager

Task Manager is a simple web app for managing projects and tasks seamlessly. Users can create `Projects` and add `Tasks` to projects.

## Technologies used
- PHP 8
- Laravel 12
- Vite
- Javascript
- Sortable (Drag and Drop plugin)

## Local Setup Guide
- Clone the repo from the repository
```
git clone https://github.com/solobarine/task_manager
cd task_manager
```

- Install Dependencies
```
composer install
npm install
```

- Setup Database
```
# Add the following variables to your env file
DB_CONNECTION= **db connection(MYSQL, Postgres, SQLite or MariaDB)**
DB_HOST=
DB_PORT= **db port**
DB_DATABASE= **your db**
DB_USERNAME= **your db username**
DB_PASSWORD= **your db passowrd**

# or just add
DB_URL=**your database connection string**
```

- Migrate models to DB
```
php artisan migrate
```

- Start development server
```
# run each server
php artisan serve
npm run dev

# run command below to run them all at once
composer run dev
```
