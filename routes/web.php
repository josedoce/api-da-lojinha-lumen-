<?php

$router->get('/', function(){
    return view('documentation');
});


$router->get('/test', 'ShowcaseController@test');
$router->get('/home', 'ShowcaseController@home');
$router->get('/page[/{category}]', 'ShowcaseController@page');

$router->post('/signup','UserController@signUp');
$router->post('/sign', 'UserController@signIn');

$router->group(['middleware'=>'user'], function () use($router){
    $router->get('/user', 'UserController@getOneUser');
    $router->post('/signout','UserController@signOut');
});

$router->group(['middleware'=>'admin'], function () use($router) {
    $router->get('/users', 'UserController@getAllUsers');
});

$router->group(['middlware'=>'client'], function () use($router){
    $router->get('/client', 'ClienteController@listar');
});
