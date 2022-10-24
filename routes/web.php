<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;

/*
    GET - Request a resource
    POST - Create a new resource
    PUT - Update a resource
    PATCH - Modify a resource
    Delete - Delete the resource
    OPTIONS - Ask the server which verbs are allowed
*/

// GET
// Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
// Route::get('/blog/{id}', [PostsController::class, 'show'])->whereNumber('id');
// Route::get('/blog/{name}', [PostsController::class, 'show'])->whereAlpha('name');


// // POST
// Route::get('/blog/create', [PostsController::class, 'create']);
// Route::post('/blog', [PostsController::class, 'store']);

// // PUT or PATCH
// Route::get('/blog/edit/{id}', [PostsController::class, 'edit']);
// Route::patch('/blog/{id}', [PostsController::class, 'update']);

// // DELETE
// Route::delete('/blog/{id}', [PostsController::class, 'destroy']);

Route::prefix('/blog')->group(function() {
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');

    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');

    // POST
    Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');

    // PUT or PATCH
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
    Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');

    // DELETE
    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');

});

// Multiple HTTP verbs
// Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
// Route::any('/blog', [PostsController::class, 'index']);

// // Return only a1 view
// Route::view('/blog', 'blog.index', ['name' => 'Jesther Costinar']);


// Route::resource('blog', PostsController::class);

// Route for invoke method
// Route::get('/', HomeController::class);

Route::get('/', [HomeController::class, 'index']);
Route::fallback(FallbackController::class);