<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CalendarController;

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

// Route::get('/', function () {
//     return view('back.top');
// });
Route::get('/', [EventsController::class, 'backTop'])->middleware(['auth', 'verified'])->name('top');

// イベント
Route::get('/event/create', [EventsController::class, 'eventCreate'])->name('event.create');
Route::resource('events', EventsController::class);

// 予約
Route::resource('reservation', ReservationsController::class)->middleware(['auth']);

// ユーザー管理
Route::resource('user', UsersController::class)->middleware(['auth']);

//　クレジットカード
Route::get('/purchase', [ReservationsController::class, 'purchaseGet'])->middleware(['auth'])->name('purchase');

Route::post('/purchase', [ReservationsController::class, 'purchasePost'])->middleware(['auth'])->name('purchase.post');

// カレンダー
Route::post('/calendar', [CalendarController::class, 'google_calendar'])->middleware(['auth'])->name('calendar');
Route::get('/calendar/del', [CalendarController::class, 'del_google_calendar'])->middleware(['auth'])->name('delCalendar');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
