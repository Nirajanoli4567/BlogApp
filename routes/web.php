<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {
    $blogs = Blog::where('status', 'approved')->get();
    return view('welcome', ['blogs' => $blogs]);
});
Route::get('/dashboard', function () {

    $totalBlogs = Blog::count();
    $approvedBlogs = Blog::where('status', 'approved')->count();
    $pendingBlogs = Blog::where('status', 'pending')->count();


    return view('dashboard', [
        'totalBlogs' => $totalBlogs,
        'approvedBlogs' => $approvedBlogs,
        'pendingBlogs' => $pendingBlogs
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','IsAdmin'])->name('admin.dashboard');
Route::get('admin/blog',[HomeController::class,'blog'])->middleware(['auth','IsAdmin'])->name('adminblog');
Route::get('/blog/create',[BlogsController::class,'blogscreate'])->name('blog.create');
Route::post('/blog/save',[BlogsController::class,'blogssave'])->name('blog.creates');
Route::get('/blogs',[BlogsController::class,'index'])->name('blog');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'blogedit'])->name('blog.edit');
Route::post('/blogs/edit/{id}', [BlogsController::class, 'blogupdate'])->name('blog.update');
// Route::post('/blogs/edit/{id}', [BlogsController::class, 'blogedit'])->name('blog.adminedit');

Route::post('/blogs/edit', [BlogsController::class, 'updateStatus'])->name('blog.updateStatus');


Route::delete('/blogs/{id}', [BlogsController::class, 'delete'])->name('blog.delete');
