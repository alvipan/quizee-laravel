<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;

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

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::post('/login', 'loginHandler');
    Route::get('/register', 'register')->middleware('guest')->name('register');
    Route::post('/register', 'registerHandler');
    Route::get('/logout', 'logout');
});

Route::controller(MaterialController::class)->group(function() {
    Route::post('/materials/save', 'save');
    Route::post('/materials/question', 'addQuestion');
    Route::get('/materials/create', 'editor');
    Route::get('/materials/{material_id}/edit', 'editor');
    Route::get('/materials/{material_id}/questions', 'questions');
})->middleware('auth');

Route::get('/{page?}', function(string $page = 'home') {
    $data = [
        'page' => $page
    ];
    return View::exists($page) ? view($page, $data) : view('error.404');
})->middleware('auth');