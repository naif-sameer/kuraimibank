<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
  ->middleware('auth:sanctum')
  ->group(function () {

    // website info
    Route::controller(api\WebsiteInfoController::class)->group(function () {
      Route::get('/website-info',  'getAll');
      Route::get('/website-info/{table_key}',  'getOne');
      Route::put('/website-info/{table_key}/edit',  'update');
      Route::put('/website-info/{table_key}/toggle',  'activeToggle');
    });

    // jobs
    Route::controller(api\JobController::class)->group(function () {
      Route::get('/jobs',  'getAll');
      Route::get('/jobs/{id}',  'getOne');
      Route::post('/jobs/create',  'save');
      Route::put('/jobs/{id}/edit',  'update');
      Route::put('/jobs/{id}/toggle',  'activeToggle');
    });

    // exchange rates
    Route::controller(api\ExchangeRateController::class)->group(function () {
      Route::get('/exchange-rates',  'getAll');
      Route::get('/exchange-rates/{id}',  'getOne');
      Route::post('/exchange-rates/create',  'save');
      Route::put('/exchange-rates/{id}/edit',  'update');
      Route::put('/exchange-rates/{id}/toggle',  'activeToggle');
    });

    // social media
    Route::controller(api\SocialMediaController::class)->group(function () {
      Route::get('/social-media',  'getAll');
      Route::get('/social-media/{id}',  'getOne');
      Route::post('/social-media/create',  'save');
      Route::put('/social-media/{id}/edit',  'update');
      Route::put('/social-media/{id}/toggle',  'activeToggle');
    });

    // our-partners
    Route::controller(api\OurPartnerController::class)->group(function () {
      Route::get('/our-partners',  'getAll');
      Route::get('/our-partners/{id}',  'getOne');
      Route::post('/our-partners/create',  'save');
      Route::put('/our-partners/{id}/edit',  'update');
      Route::put('/our-partners/{id}/toggle',  'activeToggle');
    });
  });





// TODO only for create tokens
Route::post('v1/tokens/create/{username}', function (Request $request) {
  $request->validate([
    'email' => 'required|email',
    'password' => 'required',
  ]);

  $user = User::where('email', $request->email)->first();

  if (!$user || !Hash::check($request->password, $user->password)) {
    throw ValidationException::withMessages([
      'email' => ['The provided credentials are incorrect.'],
    ]);
  }

  $user->tokens()->where('name', $request->username)->delete();

  return $user->createToken($request->username)->plainTextToken;
});
