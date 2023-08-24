<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SugarCommunityController;
use App\Http\Controllers\Auth\ChatController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

// Route::get('/', function () {
//     return Inertia::render('Dashboard', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//     ]);
// });

Route::get('/', fn () => Inertia::render('Website'))->name('website');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::get('/comunidades/sugar', [SugarCommunityController::class, 'index'])->name('comunidades.sugar');
Route::get('/usuarios/{nickname}', [UserController::class, 'user'])->name('user.profile');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/chat/rooms', [App\Http\Controllers\ChatController::class, 'rooms']);
Route::get('/chat/room/{roomId}/messages', [App\Http\Controllers\ChatController::class, 'messages']);


Route::post('/chat/room/{roomId}/message', [App\Http\Controllers\ChatController::class, 'newMessage']);
Route::get('/chat', fn () => Inertia::render('Chat/Container'))->name('chat');



Route::get('/contato', fn () => Inertia::render('Contact'))->name('contato');

Route::middleware('auth')->group(function () {
    Route::get('/noticias', fn () => Inertia::render('News'))->name('news');
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::post('/delete/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.delete.avatar');
    Route::post('/upload/gallery', [ProfileController::class, 'updateGallery'])->name('profile.update.gallery');

    Route::put('/comunidades/sugar/subscribre', [SugarCommunityController::class, 'subscribre'])->name('comunidades.sugar.subscribre');
});

require __DIR__ . '/auth.php';
