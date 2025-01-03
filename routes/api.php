<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BuahController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\Payment_methodController;
use App\Http\Controllers\Api\PaymentController;
use App\Models\Book;
use App\Models\Payment_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api'); // md

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());  // ->id untuk mengambil id saja

    Route::middleware(['role:admin,staff'])->group(function () {
        Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/genres', GenreController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/authors', AuthorController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/payments', PaymentController::class)->only(['index', 'show']);
        Route::apiResource('/payment_methods', Payment_methodController::class);
    });



    Route::middleware(['role:staff'])->group(function () {
        Route::apiResource('/payments', PaymentController::class)->only(['update']);
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('/payments', PaymentController::class)->only(['destroy']);
    });
    Route::middleware(['role:customer'])->group(function () {
        Route::apiResource('/payments', PaymentController::class)->only(['store']);
    });

    Route::apiResource('/payment_methods', Payment_methodController::class)->only(['index', 'show']);
    Route::apiResource('/payments', PaymentController::class)->only(['index', 'show',]);
});


Route::apiResource('/books', BookController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('/orders', OrderController::class);



// membuat kode yang unik dimana setiap kode tidak akan sama
// catatan bahwa return itu tidak boleh 2
// return uniqid(); ini untuk membuat kode unik biasa
// return strtoupper(uniqid());  ini untuk membuat huruf besar semuah
// return "ORD-" . strtoupper(uniqid()); ini agar kode lebih unik dimana di bagian depan kode ada ORD-
Route::get('/tes', function () {
    return "ORD-" . strtoupper(uniqid());
});


Route::apiResource('/orders', OrderController::class);

// ini CRUD Book
// Route::get('/books', [BookController::class, 'index']);
// Route::post('/books', [BookController::class, 'store']);
// Route::get('/books/{id}', [BookController::class, 'show']);
// Route::put('/books/{id}', [BookController::class, 'update']);
// Route::delete('/books/{id}', [BookController::class, 'destroy']);

// Route::get('/genres', [GenreController::class, 'index']);
// Route::post('/genres', [GenreController::class, 'store']);
// Route::get('/genres/{id}', [GenreController::class, 'show']);
// Route::put('/genres/{id}', [GenreController::class, 'update']);
// Route::delete('/genres/{id}', [GenreController::class, 'destroy']);


// Route::get('/authors', [AuthorController::class, 'index']);
// Route::post('/authors', [AuthorController::class, 'store']);
// Route::get('/authors/{id}', [AuthorController::class, 'show']);
// Route::put('/authors/{id}', [AuthorController::class, 'update']);
// Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);



