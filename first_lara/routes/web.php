<?php

use App\Http\Controllers\BlogController;
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


// index -- show all
// create -- show create form
// store -- store data in to the database
// show -- show single row
// edit -- show edit form
// update -- update edited data


Route::resource('/posts', BlogController::class);

// Route::get('/', [BlogController::class, 'index']);
// Route::get('/create', [BlogController::class, 'create']);
// Route::get('/posts/create', [BlogController::class, 'create']);
// Route::post('/posts/create', [BlogController::class, 'store']);


// Route::any('/', [BlogController::class, 'index']);

// Route::match(['get', 'post'], '/', [BlogController::class, 'index']);

