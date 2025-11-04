<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MailBroadcastController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\ChildRegistrationController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// Public routes
Route::get('/register-child', [ChildRegistrationController::class, 'create'])->name('register.child');
Route::post('/register-child', [ChildRegistrationController::class, 'store'])->name('register.child.store');
Route::get('/register/success', function () {
    return view('public.register-success');
})->name('register.success');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/participants', [ParticipantController::class, 'index'])->name('participants');
    Route::get('/participants/{id}', [ParticipantController::class, 'show'])->name('participants.show');
    Route::delete('/participants/{id}', [ParticipantController::class, 'destroy'])->name('participants.destroy');

    Route::get('/broadcast', [MailBroadcastController::class, 'index'])->name('broadcast');
    Route::post('/broadcast', [MailBroadcastController::class, 'send'])->name('broadcast.send');
});

Route::prefix('portal')->name('portal.')->group(function () {
    Route::get('/dashboard', [PortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/participants', [PortalController::class, 'participants'])->name('participants');
    Route::get('/broadcast', [PortalController::class, 'broadcast'])->name('broadcast');
    Route::post('/broadcast/send', [PortalController::class, 'sendBroadcast'])->name('broadcast.send');
    Route::get('/participants/delete/{id}', [PortalController::class, 'deleteParticipant'])->name('participants.delete');
});


// Admin routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/registrations', [ChildRegistrationController::class, 'index'])->name('admin.registrations');
    Route::post('/admin/registrations/{child}/promote', [ChildRegistrationController::class, 'promote'])->name('admin.promote');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
