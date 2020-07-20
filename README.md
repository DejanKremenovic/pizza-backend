## Pizza app

Application backend is built on Laravel framework (7.x) with basic setup just for skills presentation. App contains several endpoints for getting list of products, single product, login, logout, refresh token and checkout order route. Application is covered with PHPUnit tests for all endpoints. Currently endpoints are not documented. 


## Running project locally

### To run locally you need PHP 7.4+ and Composer installed
Clone repository.

Navigate to local repository.

Copy .env.example to .env

For Linux users

```
cp .env.example .env
```

Update database credentials in .env file

Install dependencies

```
composer install
```

Run following artisan commands to generate app key and to setup database

```
php artisan key:gen
php artisan migrate
php artisan db:seed
```

Navigate to [http://localhost:8000] and you should see Laravel welcome page

For running PHPUnit tests run 
```
php artisan test
```

## TODO in next version

- Document all API endpoints - probably using this package:
[https://github.com/DarkaOnLine/L5-Swagger]

- Add endpoints for getting list of orders for authenticated user. Currently it only creates relation order-authenticated user but it should be API for getting that data.

- Setup some storage (eg. S3) to store images.  Currently it is deployed on Heroku and Heroku does not support in app file storage.
- Setup Docker for application.