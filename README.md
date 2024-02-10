# Requirement
- php: 8.1
- mysql: 8.0.35
- laravel: 10
# How To Install
- clone from repositories
- fill env `RAJAONGKIR_API_KEY`, `RAJAONGKIR_API_URI`, `RAJAONGKIR_DATA_SOURCE`
- on `RAJAONGKIR_DATA_SOURCE` fill `api` for using data from fetching api and fill `database` for using data from database
- run `composer install`
- run `php artisan migrate`
- run `php artisan db:seed --class=ProvincesFetchAPISeed`
- run `php artisan db:seed --class=CitiesFetchAPISeed`
# How To Run
- run `php artisan serve`
- open `localhost:8000` if port already used, check terminal for using port
- open any tool for testing API such as Postman, Insomnia and many more
# API Documentation

### SignIn API
- **URL:** `/api/signin`
- **Docs:**
  
| Method | Parameter | Required | Type   | Description             |
|--------|-----------|----------|--------|-------------------------|
| POST   | email     | yes      | string | email user for login    |
| POST   | password  | yes      | string | password user for login |

### SignUp API
- **URL:** `/api/signup`
- **Docs:**
  
| Method | Parameter | Required | Type   | Description            |
|--------|-----------|----------|--------|------------------------|
| POST   | name      | yes      | string | register name user     |
| POST   | email     | yes      | string | register email user    |
| POST   | password  | yes      | string | register password user |

### Province API
- **URL:** `/api/search/province`
- **Docs:**
  
| Method       | Parameter | Required | Type   | Description |
| ------------ | --------- | -------- | ------ | ----------- |
| BEARER TOKEN | -         | yes      | string | token user  |
| GET          | id        | no       | string | ID Province |


### Cities API

- **URL:** `/api/search/city`
- **Docs:**
  
| Method       | Parameter | Required | Type   | Description     |
|--------------|-----------|----------|--------|-----------------|
| BEARER TOKEN | -         | yes      | string | token user      |
| GET          | id        | no       | string | ID City/Regency |
| GET          | province  | no       | string | ID Province     |