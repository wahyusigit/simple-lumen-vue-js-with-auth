<?php
use App\User;

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


// Route Test

$router->get('/api', function() use ($router){
	return response()->json(User::all());
});

$router->post('/login','AuthController@login');
$router->post('/register','AuthController@register');
$router->get('/logout','AuthController@logout');
// $router->post('/test','AuthController@test');
$router->post('/test','AuthController@test');

$router->get('/user/{id}',['middleware'=>'auth','uses'=>'UserController@find']);

$router->group(['prefix'=>'dashboard','middleware'=>'auth'], function() use ($router){
	$router->get('','DashboardController@index');
});