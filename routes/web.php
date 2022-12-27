<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/comments', 'store')->name('store');
    //Route::get('/comments/create', 'create')->name('create');
    // SpotifyAPIを用いて楽曲を決める部分
    Route::get("/comments/create/search_artists", "searchArtist")->name("searchArtist");
    Route::post("comments/create/artists", "getArtists")->name("getArtists");
    Route::post("/comments/create/artists/albums", "getAlbums")->name("getAlbums");
    Route::post("/comments/create/artists/albums/tracks", "getTracks")->name("getTracks");
    Route::post("comments/create", "getTrack")->name("getTrack");
    // SpotifyAPIを用いて音楽の詳細情報を取得する部分
    Route::post("/music/{id}", "music_dateil")->name("music_dateil");
    Route::get("/music/{id}", "music_detail_error")->name("music_detail_error");
    
    Route::get('/comments/{comment}', 'show')->name('show');
    Route::put('/comments/{comment}', 'update')->name('update');
    Route::delete('/comments/{comment}', 'delete')->name('delete');
    Route::get('/comments/{comment}/edit', 'edit')->name('edit');
});

// いいね機能関連
Route::get("/comments/{comment}/good", [CommentController::class, "good"])->name("comment.good");
Route::get("/comments/{comment}/deletegood",[CommentController::class, "deletegood"])->name("comment.deletegood");
Route::get("/comments/{comment}/goodpeople", [CommentController::class, "goodpeople"])->name("comment.goodpeople");
// リプライ関連
Route::post("/comments/{comment}", [ReplyController::class, "store"])->name("reply.store");
Route::get("/comments/{comment}/{reply}", [ReplyController::class, "show"])->name("reply.show");
    
require __DIR__.'/auth.php';
