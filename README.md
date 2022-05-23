User Api Based on PHP 8 Lumen 9 micro Framework

Use of micro framework make sens for a small api with lastest php version

to install vendors

composer install 

configure Database in .env

create user Table
php artisan migrate:fresh

Api calls

GET /api/v1/users --> Get all users
GET /api/v1/users/{id} --> Get user by ID
POST /api/v1/users {json data} --> Create  User
PUT /api/v1/users/{id} {json data} --> Update user


{json data} exmaple 
{
  "username": "testuser",
  "fullname": "testfullname",
  "address": "testadress",
  "email": "testemail@test.ts"
}
