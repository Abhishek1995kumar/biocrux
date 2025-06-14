<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\RescuerController;
use App\Http\Controllers\Frontend\ResourceController;
use App\Http\Controllers\Frontend\CommunityController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\GuidelineController;
use App\Http\Controllers\Frontend\TrackStatusController;
use App\Http\Controllers\Frontend\AnnouncementController;
use App\Http\Controllers\Frontend\RaiseGrievenceController;
use App\Http\Controllers\Frontend\NgoRegistrationController;
use App\Http\Controllers\Frontend\RegisterGrievanceController;
use App\Http\Controllers\Frontend\BreederRegistrationController;
use App\Http\Controllers\Frontend\IncinerationBookingController;
use App\Http\Controllers\Frontend\PetShopRegistrationController;
use App\Http\Controllers\Frontend\PrivateVetPractionerController;
use App\Http\Controllers\Frontend\AmbulanceRegistrationController;

// cronjobs
Route::get('testingcronjob', [Controller::class, 'testingCronJob']);
// cronjobs end

Route::post('checkEmail', [Controller::class, 'checkEmail']);
Route::post('checkPhone', [Controller::class, 'checkPhone']);
Route::post('checkPassword', [Controller::class, 'checkPassword']);


// // fronend routes
// Route::get('lang/{lang}', [LanguageController::class, 'switchLanguage'])->name('switch.lang');
// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
