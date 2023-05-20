<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\ProfileController;
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



Route::get('/', function () {
    return view('admin.home');
})->middleware(['auth:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/get', function(){
        return view('admin.blog.create');
});

Route::middleware('auth:admin')->group(function () {

    //blog

    Route::get('/admin/blog/create',[BlogController::class,'create']);


});

// require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
