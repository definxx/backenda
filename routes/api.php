<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PropertyController,
    BookingController,
    UserController,
    ProfileController,
    SharespaceController,
    Bookspace,
    Backdoor,
    LogoutController,
    SearchController,
    AdminController,
    ListingController,
    MessageController,
    PreferenceController,
};

// Public Routes
Route::get('/', [Backdoor::class, 'access'])->name('/');
Route::get('/dashboard', [Backdoor::class, 'access'])->name('dashboard');
Route::get('/showlogout', [UserController::class, 'showLogoutView'])->name('showlogout');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('viewspace/{id}', [SharespaceController::class, 'viewspace'])->name('viewspace');

// Authentication Middleware
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Profile Routes
    Route::post('/uploadprofile', [ProfileController::class, 'uploadprofile'])->name('uploadprofile');
    Route::get('/profile', [ProfileController::class, 'showprofile'])->name('profile');

    // Messages Routes
    Route::get('/messages/{receiver_id}', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages/{receiver_id}', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/inbox', [MessageController::class, 'inbox'])->name('inbox');
    Route::post('/message/send/{host_id}', [MessageController::class, 'sendMessage'])->name('message.send');

    // Student-specific Routes
    Route::middleware('role:student')->group(function () {
        Route::get('/chat/{host_id}', [MessageController::class, 'viewChat'])->name('chat.view');
        Route::get('/preference', [PreferenceController::class, 'PreferenceController'])->name('preference');
        Route::get('bookspace/{id}', [SharespaceController::class, 'bookspace'])->name('bookspace');
        Route::post('/book', [Bookspace::class, 'bookApartment'])->name('book.apartment');
        Route::get('/booked', [Bookspace::class, 'booked'])->name('booked');
        Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancelBooking'])->name('bookings.cancel');
    });

    // Host-specific Routes
    Route::middleware('role:host')->group(function () {
        Route::get('/host/chat/{user_id}', [MessageController::class, 'viewHostChat'])->name('host.chat.view');
        Route::get('/host/inbox', [MessageController::class, 'hostInbox'])->name('host.inbox');
        Route::get('/sharespace', [SharespaceController::class, 'sharespace'])->name('sharespace');
        Route::post('/sharespace/post', [SharespaceController::class, 'postsharespace'])->name('sharespace.post');
        Route::get('/myspace', [SharespaceController::class, 'myspace'])->name('myspace');
        Route::resource('sharespaces', SharespaceController::class);
        Route::get('sharespaces/{sharespace}/edit', [SharespaceController::class, 'edit'])->name('host.sharespaces.edit');
        Route::put('sharespaces/{sharespace}', [SharespaceController::class, 'update'])->name('host.sharespaces.update');
        Route::delete('sharespaces/{sharespace}', [SharespaceController::class, 'deletemyspace'])->name('sharespaces.destroy');
        Route::get('listing', [ListingController::class, 'listing'])->name('listing');
        Route::patch('/bookings/{booking}/updateStatus', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
    });

    // Admin Routes
    Route::middleware('check.admin.email')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
        Route::get('/admin/hosts', [AdminController::class, 'viewHosts'])->name('admin.hosts');
        Route::get('/admin/students', [AdminController::class, 'viewStudents'])->name('admin.students');
    });

});

// API Route for Authenticated User Info
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

