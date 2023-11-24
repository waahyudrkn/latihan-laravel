<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/',SiswaController::class,'index');
Route::get('/', function () {
        return view('auth/login');
});

Route::get('/maindashboard', function () {
    return view('maindashboard');
})->middleware(['auth', 'verified'])->name('maindashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::resource('siswa', SiswaController::class);
    Route::get('/search', [SiswaController::class, 'search'])->name('siswa.search');


    Route::resource('mapel', MapelController::class);
    
    Route::resource('nilai', NilaiController::class);
    // Route::get('nilai/search', [NilaiController::class, 'search'])->name('nilai.search');


    Route::post('/logout', [LoginController::class, 'logout']);

}); 




require __DIR__.'/auth.php';
