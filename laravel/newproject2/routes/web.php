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
|
*/


// If we want to go to:
// newproject2.com == /
// newproject2.com/users == /users
Route::get('/', function () {
    return view('welcome');
});

// Route to users



