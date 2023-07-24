# Small World API

## Project Setup (please execute all one by one)

```
git clone https://github.com/zohaibtariq/swapi.dev
```
```
cd swapi.dev
```
```
composer install
```
mentioned below command is IMPORTANT - DO NOT SKIP IT
```
php artisan config:clear & php artisan cache:clear && php artisan route:clear && php artisan view:clear
```
#
```
php artisan migrate
```
OR
```
php artisan migrate:fresh
```
#
```
php artisan db:seed
```

#
```
php artisan test
```
OR
```
./vendor/bin/phpunit --configuration phpunit.xml
```
###
## postman collection & environment file has been added respectively
###
****[POSTMAN COLLECTION FILE (Small World API.postman_collection.json)](https://github.com/zohaibtariq/swapi.dev/blob/development/Small%20World%20API%20(LOCAL).postman_environment.json)****

****[POSTMAN ENVIRONMENT FILE (Small World API (LOCAL).postman_environment.json)](https://github.com/zohaibtariq/swapi.dev/blob/development/Small%20World%20API.postman_collection.json)****

#

###### SMALL WORLD DEV API
******[POSTMAN COLLECTION FILE (Small World DEV API.postman_collection.json)](https://github.com/zohaibtariq/swapi.dev/blob/development/Small%20World%20Dev%20API.postman_collection.json)******

## NOTE

strongly suggest to use it with **[docker](https://github.com/zohaibtariq/swdocker)** all endpoints can be seen in postman collection file both of these collections has same environment file

# API DOCS

endpoint for api docs is 
```
http://sw.api.local/api/docs
```
###

Note Authorize bearer token value at api/docs must be in mentioned below format
```
Bearer TOKEN_YOU_HAVE_AFTER_LOGIN
```

```
Bearer 8|331SmKaJdwMosIB02J14ZkgssdEKitUD4IVqDJVi
```

### to generate api docs
```
php artisan l5-swagger:generate
```