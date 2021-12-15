<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/barry', 'HomeController@baz');

//Cart
Route::get('/cart', 'HomeController@cart')->name('cart');

//Checkout
Route::get('/checkout', 'HomeController@checkout')->name('checkout');

//Complete
Route::get('/order/{order}', 'HomeController@order')->name('order');

//Account
Route::middleware(['auth'])->group(function () {
    Route::get('my-account', 'UserAccountController@show')->name('my-account');
    Route::get('single-order/{order}', 'UserAccountController@singleOrder')->name('single-order');
});
Route::get('login-modal', 'UserAccountController@loginModal')->name('login-modal');
Route::post('login-user', 'UserAccountController@login')->name('login-user');
Route::post('register-new-user', 'UserAccountController@register')->name('register-new-user');
Route::get('registration-error', 'UserAccountController@registerError')->name('registration-error');
Route::post('update-user-account', 'UserAccountController@updateUserAccount')->name('update-user-account');

Route::resource('billing-address', 'BillingAddressController');
Route::resource('shipping-address', 'ShippingAddressController');

Route::prefix('/web-api')->name('web-api.')->group(function()
{
    Route::prefix('/users')->name('users.')->group(function()
    {
        Route::prefix('/account')->name('users.')->group(function()
        {
            Route::get('default-billing-address', 'WebApiController@getDefaultBillingAddress')->name('default-billing-address');
            Route::get('alternative-billing-addresses', 'WebApiController@getAlternativeBillingAddresses')->name('alternative-billing-addresses');
            Route::get('default-shipping-address', 'WebApiController@getDefaultShippingAddress')->name('default-shipping-address');
            Route::get('alternative-shipping-addresses', 'WebApiController@getAlternativeShippingAddresses')->name('alternative-shipping-addresses');
        });
    });
});

//FRONT
Route::get('/', 'HomeController@home')->name('home');
Route::get('/aoc', 'HomeController@aoc')->name('aoc');
Route::get('/storage-configurator', 'StorageConfiguratorController@view')->name('storage-configurator');
Route::get('load-unit-style/{unitStyle}', 'StorageConfiguratorController@loadUnitStyle');
Route::get('/dashboard', 'HomeController@redirectMe');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::post('contact', 'HomeController@contactSubmit')->name('contact-store');
Route::get('about', 'HomeController@about')->name('about');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('blog/{slug}', 'HomeController@singleBlog')->name('single-blog');
Route::get('all-products', 'HomeController@products')->name('products');
Route::get('product/{product}', 'HomeController@singleProduct')->name('single-product');
Route::get('product-categories', 'HomeController@productCategories')->name('front.product-categories');
Route::get('product-category/{productCategory}', 'HomeController@singleProductCategory')->name('single-product-category');
Route::post('subscribe-to-news-letter', 'HomeController@subscribeToNewsletter')->name('subscribe-to-news-letter');
Route::get('faqs', 'HomeController@faqs')->name('faqs');
Route::get('customer-service', 'HomeController@customerService')->name('customer-service');
Route::get('terms-and-conditions', 'HomeController@termsAndConditions')->name('terms-and-conditions');



// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'FallController@quickSearch')->name('quick-search');
