<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Api;

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
  // ->middleware('auth:sanctum')
  ->group(function () {
    // exchange rates
    Route::apiResource('exchange-rates', Api\ExchangeRateController::class, ['except' => ['destroy']]);
    Route::put('/exchange-rates/{exchangeRate}/toggle', [Api\ExchangeRateController::class, 'activeToggle']);

    // financial-reports
    Route::controller(Api\FinancialReportController::class)->group(function () {
      Route::get('/financial-reports', 'index');
      Route::get('/financial-reports/{financialReport}', 'show');
      Route::post('/financial-reports', 'store');
      Route::post('/financial-reports/{financialReport}', 'update');
      Route::put('/financial-reports/{financialReport}/toggle', 'activeToggle');
    });

    // jobs
    Route::apiResource('jobs', Api\JobController::class, ['except' => ['destroy']]);
    Route::put('/jobs/{job}/toggle', [Api\JobController::class, 'activeToggle']);

    // // main-services
    // Route::controller(Api\MainServiceController::class)->group(function () {
    //   Route::get('/main-services', 'index');
    //   Route::get('/main-services/{mainService}', 'show');
    //   Route::post('/main-services', 'store');
    //   Route::post('/main-services/{mainService}', 'update');
    //   Route::put('/main-services/{mainService}/toggle', 'activeToggle');
    // });

    // news
    Route::controller(Api\NewsController::class)->group(function () {
      Route::get('/news',  'index');
      Route::get('/news/{news}',  'show');
      Route::post('/news',  'store');
      Route::post('/news/{news}',  'update');
      Route::put('/news/{news}/toggle',  'activeToggle');
    });

    // our-partners
    Route::controller(Api\OurPartnerController::class)->group(function () {
      Route::get('/our-partners',  'index');
      Route::get('/our-partners/{ourPartner}',  'show');
      Route::post('/our-partners',  'store');
      Route::post('/our-partners/{ourPartner}',  'update');
      Route::put('/our-partners/{ourPartner}/toggle',  'activeToggle');
    });

    // pages
    Route::controller(Api\PageController::class)->group(function () {
      Route::get('/pages',  'index');
      Route::get('/pages/{table_key}',  'show');
      Route::post('/pages',  'store');
      Route::put('/pages/{table_key}',  'update');
      Route::put('/pages/{table_key}/toggle',  'activeToggle');
    });

    // services
    Route::controller(Api\ServiceController::class)->group(function () {
      Route::get('/services',  'index');
      Route::get('/services/{service}',  'show');
      Route::post('/services',  'store');
      Route::post('/services/{service}',  'update');
      Route::put('/services/{service}/toggle',  'activeToggle');
    });

    // service-advantages
    Route::apiResource('service-advantages', Api\ServiceAdvantageController::class, ['except' => ['destroy']]);
    Route::put('/service-advantages/{serviceAdvantage}/toggle', [Api\ServiceAdvantageController::class, 'activeToggle']);

    // service-points
    Route::apiResource('service-points', Api\ServicePointController::class, ['except' => ['destroy']]);
    Route::put('/service-points/{servicePoint}/toggle', [Api\ServicePointController::class, 'activeToggle']);

    // social media
    Route::controller(Api\SocialMediaController::class)->group(function () {
      Route::get('/social-media',  'index');
      Route::get('/social-media/{socialMedia}',  'show');
      Route::post('/social-media',  'store');
      Route::post('/social-media/{socialMedia}',  'update');
      Route::put('/social-media/{socialMedia}/toggle',  'activeToggle');
    });

    // website info
    Route::controller(Api\WebsiteInfoController::class)->group(function () {
      Route::get('/website-info',  'index');
      Route::get('/website-info/{table_key}',  'show');
      Route::put('/website-info/{table_key}',  'update');
      Route::put('/website-info/{table_key}/toggle',  'activeToggle');
    });

    // countries
    Route::apiResource('countries', Api\CountryController::class, ['except' => ['destroy']]);
    Route::put('/countries/{country}/toggle', [Api\CountryController::class, 'activeToggle']);

    // cities
    Route::apiResource('cities', Api\CityController::class, ['except' => ['destroy']]);
    Route::put('/cities/{city}/toggle', [Api\CityController::class, 'activeToggle']);
  });





// TODO only for create tokens
Route::post('v1/tokens/{username}', function (Request $request) {
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
