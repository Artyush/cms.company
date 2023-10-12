<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Company\CompanyContract;
use App\Models\Company\CompanyManager;

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
        $this->app->bind(CompanyContract::class, CompanyManager::class);
    }
}
