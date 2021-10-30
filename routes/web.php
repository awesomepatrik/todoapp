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

Route::get('/',  \App\Http\Livewire\Login::class)->name('welcome');
Route::get('/register', \App\Http\Livewire\Register::class)->name('register');
Route::get('/todo-list', \App\Http\Livewire\TodoList::class)->name('todo-list');

Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

