<?php

use App\Http\Controllers\ArtikelsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\GaleriDusunController;
use App\Http\Controllers\VillagePottentionsController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();
Route::get('/', [HomeController::class, 'unpayment']);
// Route::get('/', [HomeController::class, 'frontend']);
// Route::get('/profil', [HomeController::class, 'profil']);
// Route::get('/layanan', [HomeController::class, 'layanan']);
// Route::get('/dusun', [HomeController::class, 'dusun']);

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::prefix('/signin')
//     ->middleware('auth')
//     ->group(function () {
//         Route::resource('roles', RoleController::class);
//         Route::resource('permissions', PermissionController::class);

//         Route::resource('dusuns', DusunController::class);
//         Route::resource('galeri-dusuns', GaleriDusunController::class);
//         Route::resource('pelayanans', PelayananController::class);
//         Route::resource('users', UserController::class);
//         Route::resource('artikels', ArtikelsController::class);
//         Route::get('all-village-pottentions', [
//             VillagePottentionsController::class,
//             'index',
//         ])->name('all-village-pottentions.index');
//         Route::post('all-village-pottentions', [
//             VillagePottentionsController::class,
//             'store',
//         ])->name('all-village-pottentions.store');
//         Route::get('all-village-pottentions/create', [
//             VillagePottentionsController::class,
//             'create',
//         ])->name('all-village-pottentions.create');
//         Route::get('all-village-pottentions/{villagePottentions}', [
//             VillagePottentionsController::class,
//             'show',
//         ])->name('all-village-pottentions.show');
//         Route::get('all-village-pottentions/{villagePottentions}/edit', [
//             VillagePottentionsController::class,
//             'edit',
//         ])->name('all-village-pottentions.edit');
//         Route::put('all-village-pottentions/{villagePottentions}', [
//             VillagePottentionsController::class,
//             'update',
//         ])->name('all-village-pottentions.update');
//         Route::delete('all-village-pottentions/{villagePottentions}', [
//             VillagePottentionsController::class,
//             'destroy',
//         ])->name('all-village-pottentions.destroy');
//     });
