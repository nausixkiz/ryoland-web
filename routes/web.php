<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RealEstate\ProjectController;
use App\Http\Controllers\RealEstate\PropertyController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('news', BlogController::class)->only(['index', 'show']);
Route::get('tags/{tag}', [BlogController::class, 'tag'])->name('tags.show');
Route::get('categories/{category}', [BlogController::class, 'category'])->name('categories.show');
Route::resource('agents', AgentController::class)->only(['index', 'show']);

Route::prefix('real-estate')->group(function () {
    Route::resource('properties', PropertyController::class, [
        'as' => 'real-estate',
    ])->only(['index', 'show']);
    Route::resource('projects', ProjectController::class, [
        'as' => 'real-estate',
    ])->only(['index', 'show']);
    Route::resource('categories', ProjectController::class, [
        'as' => 'real-estate',
    ])->only(['index', 'show']);
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
