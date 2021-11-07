# App -loan
This is an app-loan of a REST API using auth tokens with Laravel Sanctum

## API Token Authentication


Issuing API Tokens

Sanctum allows you to issue API tokens / loan,approve,pay access tokens that may be used to authenticate API requests to your application. When making requests using API tokens, the token should be included in the Authorization header as a Bearer token.
## Usage

Change the *.env.example* to *.env* and add your database info

# Update package by composer

``` 
 comporse update

```
# Run migrate

```
php artian migrate

```

# Run the webserver on port 8000

```
php artisan serve

```
## Routes

The first, you create user by using /api/register then run api/login to get access_token, the access_token for another request api as api/loan,api/approve,api/pay
  the next run api/loan to create loan  and the next run api/show to get id you want to approve and pay and the next run api/approve and the last run api/pay 

```
# Public

POST   /api/register
@body: name, email, password

POST   /api/login
@body: name, password


This data return
{
    "message": "Hi admin, welcome to home",
    "access_token": "3|x5O0Q6WEA808yhELFaetF8NVBfuMQ954hSzZS5SO",
    "token_type": "Bearer"
}



# Protected

 When making requests using API tokens, the token should be included 'access_token' in the Authorization header as a Bearer token.

GET /api/show 

POST /api/loan
@body:amount,loan_term

POST /api/approve
@body id  //the id get from /api/show

POST /api/pay
@body id,pay