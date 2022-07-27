<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth;
use App\Http\Controllers\Web;

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

Route::controller(Web\HomeController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/about-us', 'aboutUs')->name('AboutUs');
  Route::get('/about-us/team', 'aboutTeam')->name('AboutTeam');
  Route::get('/contact-us', 'contactUs')->name('ContactUs');
  Route::get('/our-partners', 'ourPartners')->name('OurPartners');
  Route::get('/financial-reports', 'financialReports')->name('FinancialReports');
});

Route::controller(Web\ServiceController::class)->group(function () {
  Route::get('/services/{service}', 'service')->name('Service');
  Route::get('/services/{service}/{successStory}', 'serviceStory')->name('ServiceStory');
});

// 'Web\ServiceStory@index'
Route::controller(Web\ServicePointsController::class)->group(function () {
  Route::get('/service-points/{id}', 'index')->name('ServicePoints');
});






/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

  // register
  Route::controller(Auth\RegisteredUserController::class)->group(function () {
    Route::get('register', 'create')->name('register');
    Route::post('register', 'store');
  });


  // login
  Route::controller(Auth\AuthenticatedSessionController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login',  'store');
  });

  // reset password
  Route::controller(Auth\PasswordResetLinkController::class)
    ->name('password.')
    ->group(function () {
      Route::get('forgot-password', 'create')->name('request');
      Route::post('forgot-password', 'store')->name('email');
    });

  // new password
  Route::controller(Auth\NewPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'create')->name('password.reset');
    Route::post('reset-password', 'store')->name('password.update');
  });
});

Route::middleware('auth')->group(function () {
  Route::get('verify-email', [Auth\EmailVerificationPromptController::class, '__invoke'])
    ->name('verification.notice');

  Route::get('verify-email/{id}/{hash}', [Auth\VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

  Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');


  Route::controller(Auth\ConfirmablePasswordController::class)->group(function () {
    Route::get('confirm-password',  'show')->name('password.confirm');
    Route::post('confirm-password',  'store');
  });

  Route::post('logout', [Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});


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


Route::get('/test', function () {
  return view('welcome');
});
