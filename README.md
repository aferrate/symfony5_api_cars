# Sample API project with Symfony 5 with JWT and Docker
### Install

run docker:
```
cd laradock
docker-compose up -d nginx mysql phpmyadmin
```

install dependencies:
```
docker-compose exec workspace bash
composer install
```

generate keypair:
```
docker-compose exec workspace bash
php bin/console lexik:jwt:generate-keypair
```

create database:
```
docker-compose exec workspace bash
php bin/console doctrine:database:create
```

migrate entities:
```
docker-compose exec workspace bash
php bin/console doctrine:migrations:migrate
```

load fixtures:
```
docker-compose exec workspace bash
php bin/console doctrine:fixtures:load
```


### Run tests:
```
phpunit
```


### Get into the container:
```
docker-compose exec workspace bash
```


### Generate swagger.json

generate swagger.json:
```
docker-compose exec workspace bash
./vendor/bin/openapi --format json --output ./public/swagger/swagger.json ./src/Swagger/swagger.php src
```


### Start application

access phpmyadmin:
- [http://localhost:8081](http://localhost:8081)

credentials:
```
server mysql
user root
password root
```

call localhost in your browser:
- [http://localhost](http://localhost/)

access swagger ui:
- [http://localhost/swagger](http://localhost/swagger)


### Endpoints

login:
```
http://localhost/api/login_check
GET
{
    "username": "test@test.com",
    "password": "test"
}
```

refresh token (you get refresh_token when you access login endpoint):
```
http://localhost/api/token/refresh
GET
{
    "refresh_token":
    "<your-refresh-token>"
}
```

cars:
```
http://localhost/api/v1/cars
GET
set bearer token with login endpoint token received
no params
```
```
http://localhost/api/v1/cars/enabled
GET
set bearer token with login endpoint token received
no params
```
```
http://localhost/api/v1/car/slug/<slug-to-search>
GET
set bearer token with login endpoint token received
```
```
http://localhost/api/v1/car/id/<id-to-search>
GET
set bearer token with login endpoint token received
```
```
http://localhost/api/v1/car/create
POST
set bearer token with login endpoint token received
Example json
{
    "mark" : "test api",
    "model" : "test api",
    "description" : "test api",
    "country" : "test api",
    "city" : "test api",
    "year" : 2002,
    "enabled" : false
}
```
```
http://localhost/api/v1/car/update/<id-to-update>
PUT
set bearer token with login endpoint token received
Example json, can have less parameters
{
    "mark" : "test api22",
    "model" : "test api22",
    "description" : "test api22",
    "country" : "test api22",
    "city" : "test api22",
    "year" : 2003,
    "enabled" : true
}
```
```
http://localhost/api/v1/car/delete/<id-to-delete>
DELETE
set bearer token with login endpoint token received
```
