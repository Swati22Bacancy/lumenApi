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

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * Routes for accounts
     */

    $router->get('/accounts', 'AccountController@index');
    $router->post('/accounts', 'AccountController@store');
    $router->get('/accounts/{account}', 'AccountController@show');
    $router->post('/updateaccount/{account}', 'AccountController@updateaccount');
    $router->delete('/accounts/{account}', 'AccountController@destroy');
    $router->get('/accountscommon', 'AccountController@accountCommonFunction');

    /**
     * Routes for customers
     */

    $router->get('/customers', 'CustomerController@index');
    $router->post('/customers', 'CustomerController@store');
    $router->get('/customers/{customer}', 'CustomerController@show');
    $router->post('/updatecustomer/{customer}', 'CustomerController@updatecustomer');
    $router->delete('/customers/{customer}', 'CustomerController@destroy');
    $router->get('/customerscommon', 'CustomerController@customerCommonFunction');

    /**
     * Routes for users
     */
    $router->get('/users', 'UserController@index');
    
    $router->get('/users/{user}', 'UserController@show');
    $router->post('/updateuser/{user}', 'UserController@updateuser');
    $router->delete('/users/{user}', 'UserController@destroy');

});

/**
 * User credentials protected routes
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/users/me', 'UserController@me');
});
$router->post('/users', 'UserController@store');