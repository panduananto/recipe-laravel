<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
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
    public function boot()
    {
        /**
         * Source: https://gist.github.com/iamsajidjaved/4bd59517e4364ecec98436debdc51ecc
         */
        Collection::macro('paginate', function (
            $perPage,
            $pageName = 'page',
            $page = null,
            $total = null,
            $options = []
        ) {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            $results = $this->forPage($page, $perPage);
            $total = $total ?: $this->count();
            $options += [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ];

            return new LengthAwarePaginator($results, $total, $perPage, $page, $options);
        });

        /**
         * Source: https://github.com/spatie/laravel-collection-macros/blob/main/src/Macros/SimplePaginate.php
         */
        Collection::macro('simplePaginate', function (
            $perPage,
            $pageName = 'page',
            $page = null,
            $options = []
        ) {
            $page = $page ?: Paginator::resolveCurrentPage($pageName);
            $results = $this->slice(($page - 1) * $perPage)->take($perPage + 1);
            $options += [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ];

            return new Paginator($results, $perPage, $page, $options);
        });
    }
}
