<?php

use App\Models\Hero;
use App\Models\Price;
use App\Models\Service;
use App\Models\OurStory;
use App\Http\Resources\HeroResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Resources\OurStoryResource;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OurStoryController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\WelcomePageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//welcome page routes
Route::get('/', function () {
   return view('welcome',[
        'heroContent' => new HeroResource(Hero::latest()->first()),
        'services' => Service::latest()->get(),
        'aboutInfo' => new OurStoryResource(OurStory::latest()->first()),
         'prices' => Price::latest()->paginate(3),
    ]);
});

#guest routes
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store']);
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'user']);

#auth middleware
Route::middleware(['auth'])->group(function () {
    #logout route
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    #admin routes
    Route::get('/dashboard', [WelcomePageController::class, 'index'])->name('dashboard');
    Route::resource('/hero-content', HeroSectionController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/about-us', OurStoryController::class);
    Route::resource('/prices', PricingController::class);
});
