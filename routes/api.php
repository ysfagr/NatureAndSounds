<?php

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', [
    'limit'      => 200,
    'expires'    => 5,
    'middleware' => ['api.throttle', 'client', 'bindings'],
    'namespace'  => 'App\Http\Controllers',
], function (Dingo\Api\Routing\Router $api) {


    $api->post('register', 'RegisterController@store');



    $api->group(['prefix' => 'version'], function (Dingo\Api\Routing\Router $api) {
        $api->get('', 'VersionController@index');
        $api->post('check', 'VersionController@check');
        $api->post('', 'VersionController@store')->middleware(['auth:api', 'admin']);
        $api->delete('{version}', 'VersionController@destroy')->middleware(['auth:api', 'admin']);
    });

    $api->group(['prefix' => 'category'], function (Dingo\Api\Routing\Router $api) {
        $api->get('', 'CategoryController@index');
        $api->get('{category}', 'CategoryController@show');
        $api->put('{category}', 'CategoryController@update');
        $api->post('', 'CategoryController@store')->middleware(['auth:api', 'admin']);
        $api->get('{category}/sound', 'SoundController@indexByCategory');
        $api->delete('{category}', 'CategoryController@destroy')->middleware(['auth:api', 'admin']);
    });


    $api->group(['prefix' => 'sound'], function (\Dingo\Api\Routing\Router $api) {
        $api->get('', 'SoundController@index');
        $api->get('{sound}', 'SoundController@show');
        $api->post('', 'SoundController@store')->middleware(['auth:api', 'admin']);
        $api->put('{sound}', 'SoundController@update')->middleware(['auth:api', 'admin']);
        $api->delete('{sound}', 'SoundController@destroy')->middleware(['auth:api', 'admin']);
        $api->group([
            'namespace'  => 'Self',
            'middleware' => ['auth:api'],
        ], function (\Dingo\Api\Routing\Router $api) {
            $api->post('{sound}/favorite', 'FavoriteSoundController@store');
            $api->delete('{sound}/favorite', 'FavoriteSoundController@destroy');
        });
    });

    $api->group([
        'prefix'     => 'self',
        'middleware' => ['auth:api'],
        'namespace'  => 'Self',
    ], function (\Dingo\Api\Routing\Router $api) {
        $api->get('favorite-sound', 'FavoriteSoundController@index');
    });
});
