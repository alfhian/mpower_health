<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;


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
Route::post('/force_logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('force_logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/forgot_password_attempt/{email}', [App\Http\Controllers\HomeController::class, 'forgot_password_attempt'])->name('forgot_password_attempt');

Route::get('authenctication', [App\Http\Controllers\TwoFAController::class, 'index'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('2fa_index');

Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa_resend');

Route::get('log', [App\Http\Controllers\LogManagement::class, 'index'])->name('log_management');
Route::get('log/store', [App\Http\Controllers\LogManagement::class, 'store'])->name('store_log');

Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
    
        /* Website Pages */
        Route::get('/verification_success/{id}', [App\Http\Controllers\VerificationController::class, 'index'])->name('verification_success');
        
        /*Route::get('/profiling', [App\Http\Controllers\ProfilingController::class, 'index'])->name('profiling');
        Route::post('/profiling/submit', [App\Http\Controllers\ProfilingController::class, 'submit'])->name('profiling_submit');*/
    
        /* User Dashboard */
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
        Route::prefix('profile_management')->group(function() {
            Route::get('/', [App\Http\Controllers\ProfileManagementController::class, 'index'])->name('profile_management');
            Route::post('/update', [App\Http\Controllers\ProfileManagementController::class, 'edit'])->name('edit_profile');
            Route::post('/change_password', [App\Http\Controllers\ProfileManagementController::class, 'change_password'])->name('change_password');
        });
    
        Route::prefix('lab_result')->group(function() {
            Route::get('/', [App\Http\Controllers\LabResultController::class, 'index'])->name('lab_result');
            Route::post('/upload_lab_result', [App\Http\Controllers\LabResultController::class, 'upload'])->name('upload_lab_result');
            Route::get('/show_file/{file}', [App\Http\Controllers\LabResultController::class, 'showFile'])->name('show_lab_result');
        });
    
        Route::prefix('recommendation')->group(function() {
            Route::get('/', [App\Http\Controllers\RecommendationController::class, 'index'])->name('recommendation');
            Route::post('/download', [App\Http\Controllers\RecommendationController::class, 'download'])->name('download_recommendation');
            Route::get('/show_file/{file}', [App\Http\Controllers\RecommendationController::class, 'showFile'])->name('show_recommendation');
        });
        
});