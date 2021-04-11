<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Usuarios;
use Illuminate\Http\Request;

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

$router->get('/{id}','UsuarioController@show');
