<?php

Route::get('/', [
    'uses' => 'Common\HomeController@getIndex'
]);

Route::post('/', [
    'uses' => 'Common\HomeController@postIndex'
]);

Route::get('/chat', [
    'uses' => 'Common\HomeController@getChat'
]);

Route::get('/logout', [
    'uses' => 'Common\HomeController@getLogout'
]);

//Route::get('/login', [
//    'uses' => 'Auth\AuthController@getLogin'
//]);
//
//Route::post('/login', [
//    'uses' => 'Auth\AuthController@postLogin'
//]);
//
//Route::get('/registry', [
//    'uses' => 'Auth\AuthController@getRegistry'
//]);
//
//Route::post('/registry', [
//    'uses' => 'Auth\AuthController@postRegistry'
//]);



