<?php

/** @var \Laravel\Lumen\Routing\Router $router */


use App\Models\Usuario;
use App\Routes\Rules;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//pega a variavel de ambiente mermao
//return env("DB_USERNAME");



$router->get('/jose', function(){
    $usuario = Usuario::find(1);
    $usuario->numero;
    return compact('usuario');
});
$router->get('/usuarios','UsuarioController@index');
$router->get('/numeros','NumeroController@index');

$router->post('/registro','UsuarioController@store');

