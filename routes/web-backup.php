<?php

use Illuminate\Support\Facades\Route;

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

$enableViews = config('fortify.views', true);

$limiter = config('fortify.limiters.login');
$twoFactorLimiter = config('fortify.limiters.two-factor');
$verificationLimiter = config('fortify.limiters.verification', '6,1');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $limiter ? 'throttle:'.$limiter : null,
    ]));

Route::get('/register', [RegisteredUserController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('post_register');

Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
        ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter])
    ->name('verification.send');

// Password Reset...
if (Features::enabled(Features::resetPasswords())) {
    if ($enableViews) {
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('password.request');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('password.reset');
    }

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware(['guest:'.config('fortify.guard')])
        ->name('password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware(['guest:'.config('fortify.guard')])
        ->name('password.update');
}

Route::get('/forgot_password_attempt/{email}', [App\Http\Controllers\HomeController::class, 'forgot_password_attempt'])->name('forgot_password_attempt');

Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
    
        /* Website Pages */
        Route::get('/verification_success/{id}', [App\Http\Controllers\VerificationController::class, 'index'])->name('verification_success');
        
        Route::get('/profiling', [App\Http\Controllers\ProfilingController::class, 'index'])->name('profiling');
        Route::post('/profiling/submit', [App\Http\Controllers\ProfilingController::class, 'submit'])->name('profiling_submit');
    
        /* User Dashboard */
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
        Route::prefix('profile_management')->group(function() {
            Route::get('/', [App\Http\Controllers\ProfileManagementController::class, 'index'])->name('profile_management');
            Route::post('/edit', [App\Http\Controllers\ProfileManagementController::class, 'edit'])->name('edit_profile');
        });
    
        Route::prefix('lab_result')->group(function() {
            Route::get('/', [App\Http\Controllers\LabResultController::class, 'index'])->name('lab_result');
            Route::post('/upload_lab_result', [App\Http\Controllers\LabResultController::class, 'upload'])->name('upload_lab_result');
        });
    
        Route::prefix('recommendation')->group(function() {
            Route::get('/', [App\Http\Controllers\RecommendationController::class, 'index'])->name('recommendation');
            Route::post('/download', [App\Http\Controllers\RecommendationController::class, 'download'])->name('download_recommendation');
        });
        
});
