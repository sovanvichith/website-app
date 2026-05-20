<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\articleController;
// use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleImageController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('role-index', [RoleController::class, 'index'])->name('roles.index');
Route::get('role-create', [RoleController::class, 'create'])->name('roles.create');
Route::post('role-store', [RoleController::class, 'store'])->name('roles.store');
Route::get('role-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('role-update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::get('role-destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

Route::resource('users',UserController::class);
Route::resource('banners',BannerController::class);
// Route::resource('menus',MenuController::class);
Route::resource('articles',articleController::class);
Route::resource('article_images', ArticleImageController::class);
Route::resource('settings',settingController::class)->only(['edit','update']);
Route::get('contacts', [ArticleImageController::class, 'index'])->name('contacts.index');
Route::resource('categories',CategoryController::class);
