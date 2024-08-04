<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CaroselController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;

//frotend controller
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/deatils/{id}', [FrontendController::class, 'details'])->name('frontend.deatils');
Route::get('/events', [FrontendController::class, 'events'])->name('frontend.events');
Route::get('/event/{id}',[FrontendController::class, 'event_show'])->name('frontend.event_show');
Route::get('/notices', [FrontendController::class, 'notices'])->name('frontend.notices');
Route::get('/notice/{id}',[FrontendController::class, 'notice_show'])->name('frontend.notice_show');
Route::get('/contact/create', [ContactController::class, 'create'])->name('frontend.contact');
// Route::get('/google/redirect', [App\Http\Controllers\GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
// Route::get('/google/callback', [App\Http\Controllers\GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

Route::middleware('auth')->group(function () {
    Route::get('/register-member/create', [FrontendController::class, 'create'])->name('frontend.registerMember.create');
});

Route::get('/register-member/{id}', [MemberController::class, 'details'])->name('frontend.registerMember.details');


Route::controller(MemberController::class)->group(function () {
    Route::post('/register-member/store', 'store')->name('frontend.registerMember.store');
});

Route::middleware(['auth', 'checkUserRole:1,2,4'])->group(function () {

    Route::get('/members', [MemberController::class, 'frotnendMembers'])->name('frontend.registerMember.index');
});







/* admin panel */
Route::get('/admin', function () {
    return view('backend.admin.access_system.index');
})->middleware(['auth', 'verified'])->name('access_system.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'checkUserRole:1,2'])->group(function () {
    Route::controller(BackendController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.backend.index');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/admin/users', 'index')->name('users.index');
        Route::get('/admin/user/edit/{id}', 'edit')->name('user.edit');
        Route::put('/users/{id}', 'update')->name('user.update');
    });
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/change-role', [UserController::class, 'changeRole'])->name('changeRole');


    Route::controller(MemberController::class)->group(function () {
        Route::get('/admin/register-members', 'index')->name('backend.registerMember.index');
        Route::get('/admin/register-members/edit/{id}', 'edit')->name('backend.registerMember.edit');
        Route::put('/admin/register-members/update/{id}', 'update')->name('backend.registerMember.update');
    });
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::post('member/change-status', [MemberController::class, 'changeStatus'])->name('member.status');

    Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

    //carosels
    Route::resource('admin/carosels', CaroselController::class);

    //abouts
    Route::resource('admin/abouts', AboutController::class);

    //events
    Route::resource('admin/events', EventController::class);

    //notices
    Route::resource('admin/notices', NoticeController::class);

    //contacts
    Route::resource('admin/contacts', ContactController::class);
});


Route::middleware('auth')->group(function () {
    Route::controller(AboutController::class)->group(function () {
        Route::get('admin/about', 'index')->name('admin.about.index');
        Route::get('admin/about/create', 'create')->name('admin.about.create');
        Route::post('admin/about/store', 'store')->name('admin.about.store');
        Route::get('admin/about/edit', 'edit')->name('admin.about.edit');
        Route::get('admin/about/update', 'update')->name('admin.about.update');
    });
});
