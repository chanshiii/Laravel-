<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwipeController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StationController;

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

// ユーザー認証に関連するデフォルトのルートを作成
Auth::routes();

// トップ画面
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ログイン認証後not foundと表示されていたが、以下に/homeページを指定して移行に成功した。
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//station画面(実際はカメラマンの現在位置検索情報を共有できるようにしたい)
Route::get('station', [StationController::class, 'index'])->name('station.index');
Route::get('station/list', [StationController::class, 'list'])->name('station.list');

// ログインしている時に以下のルーティングを許可
Route::group(['middleare' => 'auth'], function(){
    // ユーザー表示 UserController.php
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::post('/swipes', [SwipeController::class, 'store'])->name('swipes.store');

    Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');

    //logout追加 
    Route::get('/logout', [LoginController::class, 'index'])->name('logout.index');

});
