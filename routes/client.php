<?php

use App\Http\Controllers\Auth\Client\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Client\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Client\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\Client\EmailVerificationPromptController;
use App\Http\Controllers\Auth\Client\NewPasswordController;
use App\Http\Controllers\Auth\Client\PasswordResetLinkController;
use App\Http\Controllers\Auth\Client\RegisteredUserController;
use App\Http\Controllers\Auth\Client\VerifyEmailController;

use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware('guest:client')->group(function () {

    Route::get('/', fn() => redirect()->route('client.login'));

    Route::get('register', fn() => redirect()->route('client.login'))
                ->name('client.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('client.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('client.password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('client.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('client.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('client.password.update');
});

Route::prefix('customer')->middleware('auth:client')->group(function () {

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('client.verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('client.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')

                ->name('client.verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('client.password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('client.logout');
});
