<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductPostController;





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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->name('verification.verify')->middleware(['auth', 'signed']);


// this route are show verification page
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('resent-email', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Route::get('/deposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('deposite.money')->middleware(['auth', 'verified']);
// Change Password Route
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password'])->name('change.password')->middleware(['auth', 'verified']);
Route::post('/update/password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password')->middleware(['auth', 'verified']);

// class details  Basic SQL //
Route::get('/all/class', [App\Http\Controllers\Admin\ClassController::class, 'index'])->name('all_class')->middleware(['auth', 'verified']);
Route::get('/create/class', [App\Http\Controllers\Admin\ClassController::class, 'create'])->name('create.class')->middleware(['auth', 'verified']);
Route::post('/store/class', [App\Http\Controllers\Admin\ClassController::class, 'store'])->name('store.class')->middleware(['auth', 'verified']);
Route::get('/delete/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('class.delete');
Route::get('/edit/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'edit'])->name('edit');
Route::post('/update/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'update'])->name('update.class');

// About Route Section //
Route::get('/about/info', [AboutController::class, 'index'])->name('about');
Route::get('/create/info', [AboutController::class, 'create'])->name('create');
Route::post('/store/info', [AboutController::class, 'store'])->name('store');
Route::get('/info/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
Route::post('/info/update/{id}', [AboutController::class, 'update'])->name('about.update');
Route::get('/deltet/info/{id}', [AboutController::class, 'destroy'])->name('delete.info');

// Category Route Section //
Route::get('/category/info', [CategoryController::class, 'index'])->name('category.index')->middleware(['auth', 'verified']);
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware(['auth', 'verified']);
Route::post('/category/store', [CategoryController::class, 'store'])->name('cagegory.store')->middleware(['auth', 'verified']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth', 'verified']);
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('cagegory.update')->middleware(['auth', 'verified']);
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete')->middleware(['auth', 'verified']);

// Sub Category Route Section //
Route::get('/sub-category/info', [SubcategoryController::class, 'index'])->name('subcategory.index')->middleware(['auth', 'verified']);
Route::get('/sub-category/create', [SubcategoryController::class, 'create'])->name('subcategory.create')->middleware(['auth', 'verified']);
Route::post('/sub-category/store', [SubcategoryController::class, 'store'])->name('subcategory.store')->middleware(['auth', 'verified']);
Route::get('/sub-category/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit')->middleware(['auth', 'verified']);
Route::post('/sub-category/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update')->middleware(['auth', 'verified']);
Route::get('/sub-category/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete')->middleware(['auth', 'verified']);


// Product Post Route Section //

Route::get('/product/info', [ProductPostController::class, 'index'])->name('post.index')->middleware(['auth', 'verified']);
Route::get('/product/create', [ProductPostController::class, 'create'])->name('post.create')->middleware(['auth', 'verified']);
Route::post('/product/store', [ProductPostController::class, 'store'])->name('post.store')->middleware(['auth', 'verified']);
Route::get('/product/edit/{id}', [ProductPostController::class, 'edit'])->name('post.edit')->middleware(['auth', 'verified']);
Route::post('/product/update{id}', [ProductPostController::class, 'update'])->name('post.update')->middleware(['auth', 'verified']);
Route::get('/product/delete/{id}', [ProductPostController::class, 'destroy'])->name('post.delete')->middleware(['auth', 'verified']);


/// Advance Students Details with resource controller (CRUD)

Route::resource('students', StudentsController::class);
