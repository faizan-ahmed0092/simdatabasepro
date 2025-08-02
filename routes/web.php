<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/admin/file-upload', [PageController::class, 'fileUpload'])->name('admin.file.upload');
Route::get('/' ,[HomeController::class, 'index'])->name('index');
Route::get('services' ,[HomeController::class, 'services'])->name('services');
Route::get('contact-us' ,[HomeController::class, 'contactUs'])->name('contact');
Route::get('/FAQs' ,[HomeController::class, 'faqs'])->name('faqs');
Route::get('/blog' ,[HomeController::class, 'blog'])->name('blog');
Route::post('search-result' ,[HomeController::class, 'result'])->name('result');
Route::get('/{type}', [HomeController::class, 'page'])->name('page');
// Route::get('/about', [HomeController::class, 'page'])->name('about');
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard' ,[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/setting' ,[DashboardController::class, 'whatsApp'])->name('setting.index');
    Route::post('/setting-store' ,[DashboardController::class, 'store'])->name('setting.store');
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('create', [PageController::class, 'create'])->name('create');
        Route::get('edit/{id}', [PageController::class, 'edit'])->name('edit');
        Route::get('design/{id}', [PageController::class, 'pageDesign'])->name('design');
        Route::get('status/{id}', [PageController::class, 'pageStatus'])->name('status');
         Route::delete('destroy/{id}', [PageController::class, 'destroy'])->name('delete');
        Route::post('store', [PageController::class, 'store'])->name('store');
        Route::post('upload', [PageController::class, 'upload'])->name('upload');
        Route::post('update/{id}', [PageController::class, 'update'])->name('update');
        Route::post('design/update/{id}', [PageController::class, 'updateDesign'])->name('design.update');
    });
});


