<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ItemRetentionController;
use App\Http\Controllers\TestController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/test', [TestController::class, 'ViewTest'])->name('view.test');

Route::get('/', function () {
        return view('welcome');
});

// Home
Route::get('/home', function () {
    return view('home');
})->name('home');

// Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('category/sub/all', [SubController::class, 'AllSub'])->name('all.sub');
Route::post('category/sub/add', [SubController::class, 'AddSub'])->name('store.sub');
// Product Controller
Route::get('product/all', [ProductsController::class, 'AllProd'])->name('all.prod');
Route::post('product/add', [ProductsController::class, 'AddProd'])->name('store.prod');
// Retention Controller
Route::get('retention/items', [ItemRetentionController::class, 'AllRet'])->name('all.itemRet');
Route::post('retention/items/add', [ItemRetentionController::class, 'AddRet'])->name('store.itemRet');











// Route::get('/about', function () {
//     return view('about');
// })->middleware('check')
// ->name('about');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    $users = DB::table('users')->get();

    return view('dashboard', compact('users'));
})->name('dashboard');
