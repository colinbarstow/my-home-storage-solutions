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

//ADMIN

Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/storage-configurator-settings', 'StorageConfiguratorController@index')->name('storage-configurator');
Route::post('/store-material', 'StorageConfiguratorController@storeMaterial')->name('store-material');

Route::resource('blog-categories', 'BlogCategoryController');

Route::resource('blogs', 'BlogController');
Route::get('blogs/pre-delete/{blog}', 'BlogController@preDelete')->name('blogs.predelete');
Route::post('blogs/ckeditor/upload', 'BlogController@uploadImagesFromCKEditor')->name('blogs.ckeditor.upload');

Route::resource('facebook-posts', 'BlogFacebookController');
Route::get('facebook-queued-posts', 'BlogFacebookController@queuedPosts')->name('facebook-posts.queued');
Route::get('facebook-posts/pre-delete/{facebook_post}', 'BlogFacebookController@preDelete')->name('facebook-posts.predelete');
Route::get('facebook-posts/instant-push/{facebook_post}', 'BlogFacebookController@instantPush')->name('facebook-posts.instant-push');

Route::get('campaigns', 'CampaignController@index')->name('campaigns.index');
Route::get('campaigns/create/{blog}', 'CampaignController@create')->name('campaigns.create');
Route::post('campaigns/store', 'CampaignController@store')->name('campaigns.store');
Route::get('campaigns/edit/{campaign}', 'CampaignController@edit')->name('campaigns.edit');
Route::delete('campaigns/destroy/{campaign}', 'CampaignController@destroy')->name('campaigns.destroy');
Route::patch('campaigns/update/{campaign}', 'CampaignController@update')->name('campaigns.update');
Route::post('campaigns/ckeditor/upload', 'CampaignController@uploadImagesFromCKEditor')->name('campaigns.ckeditor.upload');
Route::get('campaigns/predelete', 'CampaignController@preDelete')->name('campaigns.predelete');

//Admin Users
Route::resource('admin-users', 'AdminUserController');
Route::get('admin-users/predelete', 'AdminUserController@preDelete')->name('admin-users.predelete');

//Profile
Route::get('profile/activity', 'AdminProfileController@activity')->name('my-activities');
Route::get('profile/overview', 'AdminProfileController@overview')->name('profile.overview');
Route::get('profile/personal-information', 'AdminProfileController@personalInformation')->name('profile.personal-information');
Route::get('profile/account-information', 'AdminProfileController@accountInformation')->name('profile.account-information');
Route::get('profile/change-password', 'AdminProfileController@changePassword')->name('profile.change-password');
Route::get('profile/email-settings', 'AdminProfileController@emailSettings')->name('profile.email-settings');
Route::patch('profile/update/{adminProfile}', 'AdminProfileController@update')->name('profile.update');
Route::patch('account/update/{adminProfile}', 'AdminProfileController@updateAccount')->name('account.update');
Route::patch('account/update-password/{user}', 'AdminProfileController@updatePassword')->name('account.update-password');
Route::get('download-recovery-codes', 'AdminProfileController@downloadRecoveryCodes')->name('download-recovery-codes');

//Roles
Route::resource('roles', 'RoleController');
Route::post('change-role/{user}', 'AdminUserController@changeRole')->name('change-role');

//Admin Users
Route::resource('users', 'UserController');
Route::get('users/predelete', 'UserController@preDelete')->name('users.predelete');

//Permissions
Route::resource('permissions', 'PermissionController');

//Activity Log
Route::get('activity-log', 'ActivityLogController@index')->name('activity-log');
Route::get('activity-log/{log}', 'ActivityLogController@show')->name('activity-log.show');

//CMS
Route::get('home-page', 'HomePageController@edit')->name('home-page');
Route::patch('home-page/{homePage}', 'HomePageController@update')->name('home-page.update');
Route::get('home-page-carousel-image/create', 'HomePageCarouselImageController@create')->name('home-page-carousel-image.create');
Route::post('home-page-carousel-image', 'HomePageCarouselImageController@store')->name('home-page-carousel-image.store');
Route::patch('home-page-carousel-image/{image}', 'HomePageCarouselImageController@update')->name('home-page-carousel-image.edit');
Route::get('home-page-carousel-image/{image}', 'HomePageCarouselImageController@destroy')->name('home-page-carousel-image.delete');
Route::get('about-page', 'HomePageController@editAbout')->name('about-page');
Route::patch('about-page/{aboutPage}', 'HomePageController@updateAbout')->name('about-page.update');
Route::get('create-team-member', 'TeamController@create')->name('create-team-member');
Route::post('store-team-member', 'TeamController@store')->name('store-team-member');
Route::get('edit-team-member/{team}', 'TeamController@edit')->name('edit-team-member');
Route::patch('update-team-member/{team}', 'TeamController@update')->name('update-team-member');
Route::delete('delete-team-member/{team}', 'TeamController@destroy')->name('delete-team-member');
Route::post('about/ckeditor/upload', 'HomePageController@uploadImagesFromCKEditor')->name('about.ckeditor.upload');

//clients
Route::resource('clients', 'ClientController');

//Site Configurations
Route::get('site-configurations/settings', 'SiteConfigurationController@settings')->name('site-configurations.settings');
Route::patch('site-configurations/settings/update/{configuration}', 'SiteConfigurationController@settingsUpdate')->name('site-configurations.settings.update');
Route::get('site-configurations/branding', 'SiteConfigurationController@branding')->name('site-configurations.branding');
Route::patch('site-configurations/branding/update/{configuration}', 'SiteConfigurationController@brandingUpdate')->name('site-configurations.branding.update');
Route::get('site-configurations/contact-information', 'SiteConfigurationController@contactInformation')->name('site-configurations.contact-information');
Route::patch('site-configurations/contact-information/update/{configuration}', 'SiteConfigurationController@contactInformationUpdate')->name('site-configurations.contact-information.update');

//Product Categories

Route::resource('product-categories', 'ProductCategoryController');
Route::post('product-categories/ckeditor/upload', 'ProductCategoryController@uploadImagesFromCKEditor')->name('product-categories.ckeditor.upload');
Route::get('product-categories/pre-delete/{productCategory}', 'ProductCategoryController@preDelete')->name('product-categories.predelete');

//Products
Route::resource('products', 'ProductController');
Route::get('products/pre-delete/{product}', 'ProductController@preDelete')->name('products.predelete');
Route::get('products/create-sale/{product}', 'ProductController@createASale')->name('products.create-sale');
Route::patch('products/update-sale/{product}', 'ProductController@updateASale')->name('products.update-sale');

//Product Images
Route::resource('product-images', 'ProductImageController');

//Product Attributes
Route::resource('product-attributes', 'ProductAttributeController');

Route::resource('shipping-templates', 'ShippingController');
Route::post('shipping-templates/ckeditor/upload', 'ShippingController@uploadImagesFromCKEditor')->name('shipping-templates.ckeditor.upload');

//Parallax
Route::resource('parallax', 'ParallaxController');
Route::get('parallax/pre-delete/{parallax}', 'ParallaxController@preDelete')->name('parallax.predelete');

//Orders
Route::resource('orders', 'OrderController');
Route::resource('order-notes', 'OrderNoteController');
Route::post('order-accept/{order}', 'OrderController@accept')->name('order.accept');
Route::post('order-prompt/{order}', 'OrderController@prompt')->name('order.prompt');
Route::post('order-reject/{order}', 'OrderController@reject')->name('order.reject');
Route::post('order-complete/{order}', 'OrderController@complete')->name('order.complete');
Route::get('order-cancel/{order}', 'OrderController@cancel')->name('order.cancel');
Route::post('order-refund/{order}', 'OrderController@refund')->name('order.refund');
Route::get('new-orders', 'OrderController@newIndex')->name('new-orders');
Route::get('in-progress-orders', 'OrderController@inProgressIndex')->name('in-progress-orders');
Route::get('complete-orders', 'OrderController@completeIndex')->name('complete-orders');
Route::post('mark-as-in-progress/{order}', 'OrderController@markAsInProgress')->name('mark-as-in-progress');
Route::post('mark-as-complete/{order}', 'OrderController@markAsComplete')->name('mark-as-complete');

//Contact
Route::resource('contacts', 'ContactController');

//Contact
Route::resource('faqs', 'FaqController');

//Counties
Route::resource('counties', 'CountyController');





