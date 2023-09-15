<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SugarCommunityController;
use App\Http\Controllers\BdsmCommunityController;

use App\Http\Controllers\BondageCommunityController;
use App\Http\Controllers\CuckoldCommunityController;
use App\Http\Controllers\PodolatryCommunityController;
use App\Http\Controllers\SubmisionCommunityController;
use App\Http\Controllers\ThresomeCommunityController;
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

Route::get('/', fn () => Inertia::render('Website'))->name('website');

// Route::get('/chat/rooms', [App\Http\Controllers\ChatController::class, 'rooms']);
// Route::get('/chat/room/{roomId}/messages', [App\Http\Controllers\ChatController::class, 'messages']);
// Route::post('/chat/room/{roomId}/message', [App\Http\Controllers\ChatController::class, 'newMessage']);
// Route::get('/chat', fn () => Inertia::render('Chat/Container'))->name('chat');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');
    Route::get('/noticias', fn () => Inertia::render('News'))->name('news');
    Route::get('/contato', fn () => Inertia::render('Contact'))->name('contato');

    // USUARIOS
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
    Route::get('/usuario/{nickname}', [UserController::class, 'user'])->name('user.profile');

    // PROFILE
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/perfil/communities', [ProfileController::class, 'updateCommunities'])->name('profile.communities.update');

    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::post('/delete/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.delete.avatar');
    Route::post('/upload/gallery', [ProfileController::class, 'updateGallery'])->name('profile.update.gallery');

    // COMUNUTIES
    Route::get('/comunidades/bdsm', [BdsmCommunityController::class, 'index'])->name('comunidades.bdsm');
    Route::get('/comunidades/bondage', [BondageCommunityController::class, 'index'])->name('comunidades.bondage');
    Route::get('/comunidades/cuckold', [CuckoldCommunityController::class, 'index'])->name('comunidades.cuckold');
    Route::get('/comunidades/podolatria', [PodolatryCommunityController::class, 'index'])->name('comunidades.podolatry');
    Route::get('/comunidades/submisao', [SubmisionCommunityController::class, 'index'])->name('comunidades.submision');
    Route::get('/comunidades/thresome', [ThresomeCommunityController::class, 'index'])->name('comunidades.thresome');
    Route::get('/comunidades/sugar', [SugarCommunityController::class, 'index'])->name('comunidades.sugar');

    Route::put('/comunidades/sugar/subscribre', [SugarCommunityController::class, 'subscribre'])->name('comunidades.sugar.subscribre');
    Route::put('/comunidades/sugar/unsubscribre', [SugarCommunityController::class, 'unsubscribre'])->name('comunidades.sugar.unsubscribre');
    Route::put('/comunidades/thresome/subscribre', [ThresomeCommunityController::class, 'subscribre'])->name('comunidades.thresome.subscribre');
    Route::put('/comunidades/submision/subscribre', [SubmisionCommunityController::class, 'subscribre'])->name('comunidades.submision.subscribre');
    Route::put('/comunidades/submision/unsubscribre', [SubmisionCommunityController::class, 'unsubscribre'])->name('comunidades.submision.unsubscribre');
    Route::put('/comunidades/podolatry/subscribre', [PodolatryCommunityController::class, 'subscribre'])->name('comunidades.podolatry.subscribre');
    Route::put('/comunidades/cuckold/subscribre', [CuckoldCommunityController::class, 'subscribre'])->name('comunidades.cuckold.subscribre');
    Route::put('/comunidades/bondage/subscribre', [BondageCommunityController::class, 'subscribre'])->name('comunidades.bondage.subscribre');
});



require __DIR__ . '/auth.php';
