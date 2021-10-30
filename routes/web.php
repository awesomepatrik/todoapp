<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;


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

Route::get('/',  function(){
    return view('pages.login');
})->name('welcome');

Route::get('/register', function(){
    return view('pages.register');
});

Route::get('/todo-list', function(){
    return view('pages.todo-list');
})->name('todo-list');

Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

