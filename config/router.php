<?php

use Illuminate\Events\Dispatcher;

$request = \Illuminate\Http\Request::createFromGlobals();
function request() {
    global $request;

    return $request;
}

$dispatcher = new Dispatcher();
$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispatcher, $container);
function router() {
    global $router;

    return $router;
}

//TAG

$router->get('/','\App\Controller\PostController@index');
//
$router->get('/create-post', '\App\Controller\PostController@create');
$router->post('/create-post', '\App\Controller\PostController@store');
//
$router->get('/post/{id}/edit', '\App\Controller\PostController@edit');
$router->post('/post/{id}/edit', '\App\Controller\PostController@update');
//
$router->get('/post/{id}/destroy', '\App\Controller\PostController@destroy');


$router->get('/list-categories','\App\Controller\CategoryController@index');

$router->get('/create-category', '\App\Controller\CategoryController@create');
$router->post('/create-category', '\App\Controller\CategoryController@store');
//
$router->get('/category/{id}/edit', '\App\Controller\CategoryController@edit');
$router->post('/category/{id}/edit', '\App\Controller\CategoryController@update');
//
$router->get('/category/{id}/destroy', '\App\Controller\CategoryController@destroy');

//TAG

$router->get('/list-tags','\App\Controller\TagController@index');
//
$router->get('/create-tag', '\App\Controller\TagController@create');
$router->post('/create-tag', '\App\Controller\TagController@store');
//
$router->get('/tag/{id}/edit', '\App\Controller\TagController@edit');
$router->post('/tag/{id}/edit', '\App\Controller\TagController@update');
//
$router->get('/tag/{id}/destroy', '\App\Controller\TagController@destroy');
$router->get('/test', function(){
    $post = \App\Model\Post::find(47);
    $post->tags()->detach();
});
// Request -> Application -> Response
// HTTP Request -> Server -> HTTP Response