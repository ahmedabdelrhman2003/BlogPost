<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('dashboad');

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    // return Inertia::render('Dashboard');
    // return Inertia::render('home');
    return view('home');
})->middleware('auth')->name('home');


// The route we have created to show all blog posts.
Route::get('/blog', [BlogPostController::class, 'index'])->middleware('auth');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->middleware('auth');
Route::get('/blog/create/post', [BlogPostController::class, 'create'])->middleware('auth');
Route::post('/blog/create/post', [BlogPostController::class, 'store'])->middleware('auth');
Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->middleware('auth');
Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update'])->middleware('auth');
Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->middleware('auth');

