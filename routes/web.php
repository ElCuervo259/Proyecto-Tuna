<?php
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ApiController;

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
    return view('auth.login');})->middleware('guest');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// USER CONTROLLER
Route::get('/users',[UserController::class,'index'])->name('users.index');

Route::get('users{user}/edit',[UserController::class,'edit'])->name('users.edit');

Route::get('users/filtro',[UserController::class,'filtro'])->name('user.filtro');

Route::put('users/{user}',[UserController::class,'update'])->name('users.update');

Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');


Route::get('/users/config', [UserController::class,'config'])->middleware(['auth'])->name('users.config');

Route::post('/users/updateperfil', [UserController::class,'updateperfil'])->middleware(['auth'])->name('users.updateperfil');


// Teatre CONTROLLER
Route::get('/theatres',[TheatreController::class,'index'])->name('theatres.index');

Route::get('/theatres/create',[TheatreController::class,'create'])->name('theatres.create');

Route::get('theatres/filtro',[TheatreController::class,'filtro'])->name('theatre.filtro');

Route::post('/theatres', [TheatreController::class,'store'])->name('theatres.store');

Route::delete('theatres/{theatre}',[TheatreController::class,'destroy'])->name('theatres.destroy');

Route::get('theatres{theatre}/edit',[TheatreController::class,'edit'])->name('theatres.edit');

Route::put('theatres/{theatre}', [TheatreController::class,'update'])->name('theatres.update');


//GROUPS CONTROLLER
Route::get('/groups',[GroupController::class,'index'])->name('groups.index');

Route::get('/groups/create',[GroupController::class,'create'])->name('groups.create');

Route::post('/groups', [GroupController::class,'store'])->name('groups.store');

Route::delete('/groups{group}', [GroupController::class,'destroy'])->name('groups.destroy');

Route::get('groups/{group}/edit', [GroupController::class,'edit'])->name('groups.edit');

Route::put('groups/{group}', [GroupController::class,'update'])->name('groups.update');


//PRIZES CONTROLLER
Route::get('/prizes',[PrizeController::class,'index'])->name('prizes.index');

Route::get('/prizes/create',[PrizeController::class,'create'])->name('prizes.create');

Route::get('prizes/filtro',[PrizeController::class,'filtro'])->name('prize.filtro');

Route::post('/prizes', [PrizeController::class,'store'])->name('prizes.store');

Route::get('prizes/{prize}/edit', [PrizeController::class,'edit'])->name('prizes.edit');

Route::put('prizes/{prize}', [PrizeController::class,'update'])->name('prizes.update');

Route::delete('/prizes{prize}', [PrizeController::class,'destroy'])->name('prizes.destroy');


//SHOW CONTROLLER
Route::get('/shows',[ShowController::class,'index'])->name('shows.index');

Route::get('/shows/create',[ShowController::class,'create'])->name('shows.create');

Route::post('/shows', [ShowController::class,'store'])->name('shows.store');

Route::get('shows/filtro',[ShowController::class,'filtro'])->name('show.filtro');

Route::get('shows/{show}/edit', [showController::class,'edit'])->name('shows.edit');

Route::put('shows/{show}', [showController::class,'update'])->name('shows.update');

Route::delete('/shows{show}', [ShowController::class,'destroy'])->name('shows.destroy');


// Ruta controlador web.
Route::get('/apis',[ApiController::class,'index'])->name('apis.index');




