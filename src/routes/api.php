<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/books", [BookController::class, "GetAllBooks"]);
Route::get("/books/{id}", [BookController::class, "GetBookById"]);
Route::post("/book/create", [BookController::class, "CreateBook"]);
Route::put("/books/update", [BookController::class, "UpdateBook"]);
