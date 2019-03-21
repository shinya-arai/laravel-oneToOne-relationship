<?php

use App\User;
use App\Address;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/insert', function() {
    User::create([
        'name' => 'shinya',
        'email' => 'google@gmail.com',
        'password' => 'secret'
    ]);
}); 

Route::get('/insert', function() {
    $user = User::findOrFail(1);

    $address = new Address(['name' => 'SF 1234 Houston']);

    $user->address()->save($address);
});

Route::get('/update', function() {
    $address = Address::where('user_id', 1)->first();

    $address->name = "update new address";

    $address->save();
});

Route::get('/read', function() {
    $user = User::findOrFail(1);

    echo $user->address->name;
});

Route::get('/delete', function() {
    $user = User::findOrFail(1);

    $user->address()->delete();
});
