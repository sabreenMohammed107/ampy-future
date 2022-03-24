<?php

namespace App\Providers;

use App\Models\Bank;
use App\Models\Company;
use Illuminate\Support\ServiceProvider;

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
        if (! $this->app->runningInConsole()) {
            // App is not running in CLI context
            // Do HTTP-specific stuff here

            $company=Company::firstorFail();
            $bank = Bank::firstorFail();
            view()->share(['company'=>$company,'bank'=>$bank]);
        }


    }
}
