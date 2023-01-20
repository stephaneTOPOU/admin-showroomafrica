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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category-add', [\App\Http\Controllers\CategoryController::class, 'addCategory'])->name('category.add');
Route::get('/category-edit', [\App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('category.update');

Route::get('/sub-category', [\App\Http\Controllers\SousCategorieController::class, 'index'])->name('subcategory');
Route::get('/sub-category-add', [\App\Http\Controllers\SousCategorieController::class, 'addSubCat'])->name('subcategory.add');
Route::get('/sub-category-edit', [\App\Http\Controllers\SousCategorieController::class, 'updateSubCat'])->name('subcategory.update');

Route::get('/entreprise', [\App\Http\Controllers\EntrepriseController::class, 'index'])->name('entreprise');
Route::get('/entreprise-add', [\App\Http\Controllers\EntrepriseController::class, 'addEntreprise'])->name('entreprise.add');
Route::get('/entreprise-edit', [\App\Http\Controllers\EntrepriseController::class, 'updateEntreprise'])->name('entreprise.update');

Route::get('/service', [\App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/service-add', [\App\Http\Controllers\ServiceController::class, 'addservice'])->name('service.add');
Route::get('/service-edit', [\App\Http\Controllers\ServiceController::class, 'updateservice'])->name('service.update');