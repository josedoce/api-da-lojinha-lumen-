<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Aqui registra-se services da aplicação...
     *
     * @return void
     */
    public function register()
    {

        //para funcionar o service, temos que registrar a classe interface e a classe concreta
        //muito usado quando quer fazer troca de tipo de banco de dados orm, eloquent, etc...
        $this->app->bind('App\Repositories\RepositoryInterface','App\Repositories\UsuarioRepositoryEloquent');
        $this->app->bind('App\Repositories\RepositoryInterfaceNumero','App\Repositories\NumeroRepositoryEloquent');
        $this->app->bind('App\Repositories\interfaces\IUserRepo', 'App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\interfaces\IRankingRepo', 'App\Repositories\RankingRepository');
        $this->app->bind('App\Repositories\interfaces\IProductRepo','App\Repositories\ProductRepository');
    }
}
