<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\LangHelper;
use App;

class LangServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // РЕгистрируем наш фпал для работы с локалью и языками
        require_once app_path() . '/Helpers/LangHelper.php';

        $this->app->singleton(\App\Helpers\LangHelper::class, function ($app) {
            return new \App\Helpers\LangHelper;
        });

        //$this->app->bind('LangHelper', \App\Helpers\LangHelper::class);
    }
}
