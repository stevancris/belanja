<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;


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

Route::get('/', function () {
    return view('landing');
});

Route::resource('transactions', TransactionController::class);
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{list}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/{list}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::patch('/transactions/{list}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{list}', [TransactionController::class, 'destroy'])->name('books.destroy');