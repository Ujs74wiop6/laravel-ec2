<?php

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

use App\Http\Controllers\EventController;

/*
Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
*/

// Route::controller(EventController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::get('/events/create', 'create')->middleware('auth');
//     Route::get('/events/{id}', 'show');
//     Route::post('/events', 'store');
//     Route::delete('/events/{id}', 'destroy')->middleware('auth');
//     Route::get('/events/edit/{id}', 'edit')->middleware('auth');
//     Route::put('/events/update/{id}', 'update'->middleware('auth'));
//     Route::get('/dashboard', 'dashboard')->middleware('auth');
//     Route::get('/events/join/{id}')->middleware('auth');
//     Route::get('/events/leave/{id}')->middleware('auth');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
