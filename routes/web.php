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

use Illuminate\Http\Request;

Route::get('/', function () {
    auth()->loginUsingId(1);
    
    return view('welcome');
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => url('auth/callback'),
        'response_type' => 'code',
    ]);

    return redirect('oauth/authorize?'.$query);
});

Route::get('/auth/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post(url('oauth/token'), [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 3,
            'client_secret' => 'Qne5joeqP0EgbJOhHVLC8BvRdcpkc9olEc4uor9x',
            'redirect_uri' => url('auth/callback'),
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});


Route::get('controller', 'TestController@index');