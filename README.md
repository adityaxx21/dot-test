# Requirement
- php: 8.1
- mysql: 8.0.35
- laravel: 10
# How To Install
- clone from repositories
- fill env DATABASE CONNECTION, `RAJAONGKIR_API_KEY`, `RAJAONGKIR_API_URI`
- run `composer install`
- run `php artisan migrate`
- run `php artisan db:seed --class=ProvincesFetchAPISeed`
- run `php artisan db:seed --class=CitiesFetchAPISeed`
# How To Run
- run `php artisan serve`
- open `localhost:8000` if port already used, check terminal for using port
- open any tool for testing API such as Postman, Insomnia and many more
# API Documentation

### Province API
- **URL:** `/api/search/provinces`
- **Docs:**
  
| Method | Parameter | Required | Type   | Description     |
|--------|-----------|----------|--------|-----------------|
| GET    | id        | no       | string | ID Province     |

### Cities API

- **URL:** `/api/search/cities`
- **Docs:**
  
| Method | Parameter | Required | Type   | Description     |
|--------|-----------|----------|--------|-----------------|
| GET    | id        | no       | string | ID City/Regency |
| GET    | province  | no       | string | ID Province     |
