<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\BookController;

Route::get('/', fn() => view('welcome'));

Route::middleware(['auth'])->group(function () {

    Route::get('/books', [BookController::class,'index'])
        ->middleware('role:cliente,bibliotecario,admin')
        ->name('books.index');

    Route::get('/books/{book}', [BookController::class,'show'])
        ->middleware('role:cliente,bibliotecario,admin')
        ->name('books.show');

    Route::middleware('role:bibliotecario,admin')->group(function () {

        Route::resource('authors', AuthorController::class);
        Route::resource('publishers', PublisherController::class);
        Route::resource('categories', CategoryController::class);

        Route::get('/books/create-id-number', [BookController::class, 'createWithId'])->name('books.create.id');
        Route::post('/books/create-id-number', [BookController::class, 'storeWithId'])->name('books.store.id');

        Route::get('/books/create-select', [BookController::class, 'createWithSelect'])->name('books.create.select');
        Route::post('/books/create-select', [BookController::class, 'storeWithSelect'])->name('books.store.select');

        Route::resource('books', BookController::class)->except(['index','show']);

        Route::post('/books/{book}/borrow', [BorrowingController::class, 'store'])->name('books.borrow');
        Route::get('/users/{user}/borrowings', [BorrowingController::class, 'userBorro  wings'])->name('users.borrowings');
        Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except(['create','store','destroy']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
