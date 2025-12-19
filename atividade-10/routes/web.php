<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\BookController;

Route::get('/', fn () => view('welcome'));

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    /*
    |--------------------------------------------------------------------------
    | BOOKS – ROTAS FIXAS PRIMEIRO (SEM {book})
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:bibliotecario,admin')->group(function () {

        // CREATE COM SELECT
        Route::get('/books/create-select', [BookController::class, 'createWithSelect'])
            ->name('books.create.select');

        Route::post('/books/create-select', [BookController::class, 'storeWithSelect'])
            ->name('books.store.select');

        // CREATE COM ID
        Route::get('/books/create-id-number', [BookController::class, 'createWithId'])
            ->name('books.create.id');

        Route::post('/books/create-id-number', [BookController::class, 'storeWithId'])
            ->name('books.store.id');

        // CRUD (exceto index e show)
        Route::resource('books', BookController::class)
            ->except(['index', 'show']);

        // Outros CRUDs
        Route::resource('authors', AuthorController::class);
        Route::resource('publishers', PublisherController::class);
        Route::resource('categories', CategoryController::class);

        Route::patch('/borrowings/{borrowing}/return',
            [BorrowingController::class, 'returnBook']
        )->name('borrowings.return');
    });

    /*
    |--------------------------------------------------------------------------
    | BOOKS – ROTAS DINÂMICAS POR ÚLTIMO
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:cliente,bibliotecario,admin')->group(function () {

        Route::get('/books', [BookController::class, 'index'])
            ->name('books.index');

        Route::get('/books/{book}', [BookController::class, 'show'])
            ->name('books.show');

        Route::post('/books/{book}/borrow',
            [BorrowingController::class, 'store']
        )->name('books.borrow');
    });

    /*
    |--------------------------------------------------------------------------
    | USERS – APENAS ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)
            ->except(['create', 'store', 'destroy']);
    });

    Route::get('/users/{user}/borrowings',
        [BorrowingController::class, 'userBorrowings']
    )->name('users.borrowings');
});
