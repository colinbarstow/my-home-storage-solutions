<?php

use App\Repositories\Contracts\BasketRepositoryContract;

if(!function_exists('int_to_decimal')){
    function int_to_decimal(int $number){
        return number_format(($number/100), 2);
    }
}

if(!function_exists('basket')){
    function basket(){
        return app(BasketRepositoryContract::class);
    }
}

if (! function_exists('baseUrl')) {
    function baseUrl() {
        return config('app.url');
    }
}

if (! function_exists('adminUrl')) {
    function adminUrl(): string
    {
        return config('app.admin_subdomain') . '.' . baseUrl();
    }
}
