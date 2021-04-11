<?php

namespace App\Providers;

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
        //para funcionar o service, temos que registrar a clase interface e a classe concreta
        //muito usado quando quer fazer troca de tipo de banco de dados orm, eloquent, etc...
        $this->app->bind(
            'App\Repositories\UsuarioRepositoryInterface','App\Repositories\UsuarioRepositoryEloquent'
        );
    }
}
