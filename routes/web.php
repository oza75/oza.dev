<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PortfolioController::class, 'home']);
Route::view('/projects/happy-closet', 'front.portfolio.projects.happy-closet')->name('projects.happy-closet');
Route::view('/projects/urbateur', 'front.portfolio.projects.urbateur')->name('projects.urbateur');
Route::view('/projects/fink-ma', 'front.portfolio.projects.fink')->name('projects.fink');
Route::view('/projects/123-bain', 'front.portfolio.projects.123bain')->name('projects.123bain');
Route::view('/réalisations', 'front.portfolio.projects.index')->name('projects.index');
Route::view('/contacts', 'front.portfolio.contact')->name('portfolio.contact');
Auth::routes();
