<?php

use Illuminate\Support\Facades\Route;

Route::get('/balance', 'Itainathaniel\NovaNexmo\Http\Controllers\BalanceController@show');
Route::get('/model/{model_id}', 'Itainathaniel\NovaNexmo\Http\Controllers\ModelController@show');
