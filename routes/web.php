<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public route
Route::get('/', function () {
    return view('index');
});

// Authenticated & Verified Users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashmin');
        } else if ($user->role === 'Lawyer') {
            return redirect()->route('lawyerdash');
        }else if( $user->role === 'user') {
            return redirect('/');
        }

        return view('dashboard');
    })->name('dashboard');

    // Admin dashboard
    Route::get('/dashmin', function () {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return redirect('/');
        }
        return view('dashmin');
    })->name('dashmin');

    // Lawyer dashboard
    Route::get('/lawyerdash', function () {
        $user = Auth::user();
        if ($user->role !== 'Lawyer') {
            return redirect('/');
        }
        return view('lawyerdash');
    })->name('lawyerdash');

    // Become a lawyer
    Route::get('/becomealawyer', function () {
        return view('lawyerform');
    });

    // Lawyer request submission
    Route::post('/lawyerrequest/{id}', [UserController::class, 'sendlawyerrequest']);

    // Show requests for the authenticated lawyer
    Route::get('/lawyer/requests', [UserController::class, 'showRequestsForLawyer'])->name('lawyer.requests');
});

// Admin routes
Route::get('/lawyerrequest', [AdminController::class, 'getlawyersrequest']);
Route::post('/acceptlawyer/{id}', [AdminController::class, 'acceptlawyer']);
Route::post('/rejectlawyer/{id}', [AdminController::class, 'rejectlawyer']);
Route::get('/approvedlawyers', [AdminController::class, 'getapprovedlawyers']);

// Client consultations
Route::get('/clients', [AdminController::class, 'index'])->name('clients');
Route::post('/admin/clients/{id}/accept', [AdminController::class, 'accept']);
Route::post('/admin/clients/{id}/delete', [AdminController::class, 'delete']);
Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export.excel');
Route::get('/export-pdf', [AdminController::class, 'exportPDF'])->name('export.pdf');

// User consultation form submission
Route::post('/requestappointment', [UserController::class, 'getappointmentfromlawyer'])->name('appointment.send');

// Auth Pages
Route::get('/confirm-password', fn() => view('auth.confirm-password'));
Route::get('/forgot-password', fn() => view('auth.forgot-password'))->middleware('guest')->name('password.request');
Route::get('/login', fn() => view('auth.login'))->middleware('guest')->name('login');
Route::get('/register', fn() => view('auth.register'))->middleware('guest')->name('register');
Route::get('/reset-password/{token}', fn($token) => view('auth.reset-password', ['token' => $token]))->middleware('guest')->name('password.reset');
Route::get('/two-factor-challenge', fn() => view('auth.two-factor-challenge'))->middleware('guest')->name('two-factor.login');
Route::get('/verify-email', fn() => view('auth.verify-email'))->middleware('auth')->name('verification.notice');


Route::post('/request/accept/{id}', [UserController::class, 'acceptRequest'])->name('request.accept');
Route::delete('/request/delete/{id}', [UserController::class, 'deleteRequest'])->name('request.delete');
