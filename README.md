# Library-Test

## Installation

#### 1. Install libraries and migrate/seed db
```
composer install
php artisan migrate
php artisan db:seed
php artisan key:generate
```

#### 2. Install npm and build (to build js/css)
```
npm install
npm run build
```

#### 3. Run server
```
php artisan serve
```

## Logic

This service is made for a library. It shows all books listed in this library. 
Publishing houses can add books via RESTful API.
There is also a pagination on the main page. It was implemented using ajax on the frontend. 
All DB structure was made with migrations, so other developers can easily deploy this project locally, and, 
if something happens - there is an opportunity to rollback
Project also has seeders for generating fake data to properly test functionality.
RESTful api was implemented using Resource Controller with CRUD methodology. It is accessible without token.
Books and authors, as well as publishers are bound with many-to-many relations (using pivot tables).
Publishing house can view, create, update or delete book via API. While creating or updating books, there is an opportunity 
to specify any number of author and publisher ids, just separating it with comma. 
There is also data validation, so publishing houses can not attach book to author or publishing house that does not exist.

