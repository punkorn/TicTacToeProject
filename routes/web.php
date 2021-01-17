<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| php artisan make:controller TicTacToeGameController
*/

Route::get('/', 'TicTacToeGameController@index')->name('main');

Route::group(['prefix' => 'TicTacToe'], function(){
    Route::post('/', 'TicTacToeGameController@SetSizeGame')->name('playNewGame');
    Route::post('/Process', 'TicTacToeGameController@checkForWinOrTie')->name('checkPlayerWin');
});

