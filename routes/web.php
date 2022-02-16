<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\Article;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles', ArticleController::class);

Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->middleware(['auth']);
// Route::resource('comments', CommentController::class);

// Un middleware est une classe qui va s'exécuter avant ou après la requête HTTP. 
// Par exemple, ici on vérifie que le user est connecté
Route::post('/articles/{article}/likes', [LikeController::class, 'store'])->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard', ['articles' => Article::all()->sortByDesc('created_at')]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
