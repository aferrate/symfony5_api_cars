# Sample API project with Symfony 5 and Docker
### Install

set your db url (assuming you use mysql on port 3306 and user and pass is root):
```
DATABASE_URL="mysql://root:root@mysql:3306/<your-db-name>"
```

run docker:
```
 cd laradock
```
```
 docker-compose up -d nginx mysql phpmyadmin
```
get into the container:
```
 docker-compose exec workspace bash
```
install dependencies:
```
 composer install
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


### Endpoints

```
http://localhost/api/v1/cars
GET
no params
```
```
http://localhost/api/v1/cars/enabled
GET
no params
```
```
http://localhost/api/v1/car/slug/<slug-to-search>
GET
```
```
http://localhost/api/v1/car/id/<id-to-search>
GET
```
```
http://localhost/api/v1/car/create
POST
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
Example json, can be less parameters
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
```