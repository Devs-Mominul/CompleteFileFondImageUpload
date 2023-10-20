<?php

use App\Http\Controllers\PostController;
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

Route::get('/kkk', function () {
    return view('welcome');
});
Route::get('/',[PostController::class,'index']);
Route::post('/temp-upload/post',[PostController::class,'store'])->name('store.upload');
Route::post('/temp-upload',[PostController::class,'Afrin']);
Route::delete('/temp-delete',[PostController::class,'tempdelete']);
