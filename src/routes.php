<?php

$namespace = 'KapilPaul\LaravelMount\Http\Controllers';

Route::group(['namespace' => $namespace, 'prefix' => 'install', 'middleware' => ['web', 'install']], function () {
    Route::get('/', 'Requirements@show')->name('requirement.show');
    Route::post('database', 'Database@store')->name('install.store');
});
