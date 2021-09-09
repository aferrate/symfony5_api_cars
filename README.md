# Sample API project with Symfony 5 and Docker
### Install

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


### Run tests

```
 docker-compose exec workspace bash
 phpunit
```