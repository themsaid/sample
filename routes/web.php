<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::put('/games', function () {
    return response()->json(123);
});

Route::get('/games/reskin/{idgame}/{tabnr}/savetext', function () {
    return view('welcome');
});