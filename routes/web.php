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

Auth::routes();

Route::get('/', [App\Http\Controllers\CourseController::class, 'index'])->name('courses');
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses');

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/course', [App\Http\Controllers\CourseController::class, 'getCourse'])->name('course');
    
    Route::post('/edit', [App\Http\Controllers\UserController::class, 'store'])->name('edit');
    Route::post('/add', [App\Http\Controllers\CourseController::class, 'store'])->name('add');
    Route::post('/delete', [App\Http\Controllers\CourseController::class, 'delete'])->name('delete');
});

Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    
    return view('courses');
});

Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});




