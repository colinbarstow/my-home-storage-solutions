<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SiteConfiguration;
use App\Models\SiteDetail;
use App\Repositories\Contracts\BasketRepositoryContract;
use App\Repositories\Session\BasketRepository;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        BasketRepositoryContract::class => BasketRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\DailyChart::class
        ]);

        Paginator::useBootstrap();

//        $mostPopularBlogs = Blog::mostPopularTwo();
//
//        view()->composer('*', function($view) use($mostPopularBlogs) {
//            $view->with([
//                'mostPopularBlogs' => $mostPopularBlogs,
//            ]);
//        });


    }
}
