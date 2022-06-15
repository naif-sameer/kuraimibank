<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


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

Route::get('/', function () {
  return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

  // register
  Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('register', 'create')->name('register');
    Route::post('register', 'store');
  });


  // login
  Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login',  'store');
  });

  // reset password
  Route::controller(PasswordResetLinkController::class)
    ->name('password.')
    ->group(function () {
      Route::get('forgot-password', 'create')->name('request');
      Route::post('forgot-password', 'store')->name('email');
    });

  // new password
  Route::controller(NewPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'create')->name('password.reset');
    Route::post('reset-password', 'store')->name('password.update');
  });
});

Route::middleware('auth')->group(function () {
  Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->name('verification.notice');

  Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

  Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');


  Route::controller(ConfirmablePasswordController::class)->group(function () {
    Route::get('confirm-password',  'show')->name('password.confirm');
    Route::post('confirm-password',  'store');
  });

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/dashboard')
  ->middleware('auth')
  ->name('dashboard.')
  ->group(function () {

    Route::get('/', function () {
      return view('admin.index');
    })->name('index');
  });


// email verification
// Auth::routes(['verify' => true]);

// TODO only for create tokens
// Route::get('/tokens/create/{token_name}', function (Request $request) {
//   $token = $request->user()->createToken($request->token_name);

//   return ['token' => $token->plainTextToken];
// });
