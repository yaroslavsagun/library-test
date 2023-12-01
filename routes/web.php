<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MainpageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainpageController::class, 'index']);
Route::get('/paginate', [MainpageController::class, 'paginate']);
