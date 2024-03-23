<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/blogs', 'BlogController@getAll');
$router->get('/blogs/{id}', 'BlogController@getOne');
$router->post('/blogs/add', 'BlogController@save');
$router->post('/blogs/edit/{id}', 'BlogController@update');
$router->delete('/blogs/delete/{id}', 'BlogController@delete');

$router->get('/events', 'EventController@getAll');
$router->get('/events/{id}', 'EventController@getOne');
$router->post('/events/add', 'EventController@save');
$router->post('/events/edit/{id}', 'EventController@update');
$router->delete('/events/delete/{id}', 'EventController@delete');

