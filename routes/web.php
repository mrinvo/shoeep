<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Contact;
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
    $blogs = count(Blog::all());
    $contacts = count(Contact::all());
    return view('admin.home',compact('blogs','contacts'));

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
    Route::get('/admin/blog/index',[BlogController::class,'index']);
    Route::get('/admin/blog/create',[BlogController::class,'create']);
    Route::get('/admin/blog/edit/{id}',[BlogController::class,'edit']);
    Route::post('/admin/blog/update',[BlogController::class,'update']);
    Route::get('/admin/blog/delete/{id}',[BlogController::class,'destroy']);
    Route::post('/admin/blog/store',[BlogController::class,'store']);

    //contact

    Route::get('/admin/contact/index',[ContactController::class,'index']);
    Route::get('/admin/contact/show/{id}',[ContactController::class,'show']);

});

// require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
