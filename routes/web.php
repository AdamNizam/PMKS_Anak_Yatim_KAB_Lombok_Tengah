<?php

use App\Http\Controllers\AuthController;
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

@include_once('admin_web.php');

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

// Route::view('sample-page', 'admin.pages.sample-page')->name('sample-page');

Route::prefix('auth')->group(function () {

    Route::resource('/', AuthController::class);
    Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('aksilogin');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('activation/{token}', [AuthController::class, 'activation']);
});

// Route::view('default-layout', 'multiple.default-layout')->name('default-layout');
// Route::view('compact-layout', 'multiple.compact-layout')->name('compact-layout');
// Route::view('modern-layout', 'multiple.modern-layout')->name('modern-layout');
