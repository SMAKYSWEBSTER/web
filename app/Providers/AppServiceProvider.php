<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('cInput', 'cLayout.cForm.cInput', ['name', 'value', 'attributes', 'label']);
        Form::component('cTextarea', 'cLayout.cForm.cTextarea', ['name', 'value', 'attributes', 'label']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
