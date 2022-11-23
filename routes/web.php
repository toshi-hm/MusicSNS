<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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

Route::get('/', [CommentController::class, "index"]);
Route::get("/comments/create", [CommentController::class, "create"]);
Route::post("/comments", [CommentController::class, "store"]);
Route::get("/comments/{comment}", [CommentController::class, "show"]);
Route::get("/comments/{comment}/edit", [CommentController::class, "edit"]);
Route::put("/comments/{comment}", [CommentController::class, "update"]);
Route::delete("/comments/{comment}", [CommentController::class, "delete"]);
