<?php

use App\resources\views\posts;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/post/{post}', [PostController::class, 'show']);
Route::get('/category/{category}', [CategoryController::class, 'index']);

Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('post/{post}/comments', [PostController::class, 'comment']);
    Route::post('/posts/like', [PostController::class, 'like']);
    Route::post('/posts/unlike', [PostController::class, 'unlike']);
    Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy']);
    Route::get('/mypage',  [MypageController::class, 'index'])->name('mypage');
    Route::post('/post/{post}/complete', [PostController::class, 'complete']);
    Route::post('/post/{post}/uncomplete', [PostController::class, 'uncomplete']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/posts/{post}', [PostController::class ,'show']);

require __DIR__.'/auth.php';
