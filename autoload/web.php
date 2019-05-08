<?php

    include('./route.php');


    // Route File
    // Route::method('url/{params}','controller@function');
    // Example:
    // Route::get('/','MainController@index');
    // Route::get('/{id}','MainController@get');

    Route::get('/users', 'UserController@listAll');
    Route::get('/users/{id}', 'UserController@get');
    Route::post('/users', 'UserController@create');
    Route::patch('/users/{id}', 'UserController@update');
    Route::delete('/users/{id}', 'UserController@delete');


