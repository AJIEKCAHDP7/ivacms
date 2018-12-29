<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


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
    }
}
