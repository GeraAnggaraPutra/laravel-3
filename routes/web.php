<?php

// panggil controller Siswa
use App\Http\Controllers\SiswaController;
// panggil controller Barang
use App\Http\Controllers\BarangController;
// panggil controller Wali
use App\Http\Controllers\WaliController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route backend
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
    Route::get('/', function (){
        return view('admin.index');
    });
    Route::resource('siswa', SiswaController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('wali', WaliController::class);
});


