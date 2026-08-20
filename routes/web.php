<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kgs', function () {
    return view('ck_editz.kgs');
});

Route::get('/meta', function () {
    return view('ck_editz.services.metaads');
})->name('meta');

Route::get('/googleads', function () {
    return view('ck_editz.services.googleads');
})->name('googleads');

Route::get('/gmb', function () {
    return view('ck_editz.services.gmb');
})->name('gmb');

Route::get('/socialmediahandling', function () {
    return view('ck_editz.services.socialmediahandling');
})->name('socialmediahandling');

Route::get('/videoediting', function () {
    return view('ck_editz.services.videoediting');
})->name('videoediting');

Route::get('/posterdesign', function () {
    return view('ck_editz.services.posterdesign');
})->name('posterdesign');

Route::get('/websitedesign', function () {
    return view('ck_editz.services.websitedesign');
})->name('websitedesign');

Route::get('/landingpage', function () {
    return view('ck_editz.services.landingpage');
})->name('landingpage');
Route::get('/domainregistration', function () {
    return view('ck_editz.services.domainregistration');
})->name('domainregistration');
Route::get('/hostingsupport', function () {
    return view('ck_editz.services.hostingsupport');
})->name('hostingsupport');
Route::get('/gem', function () {
    return view('ck_editz.services.gem');
})->name('gem');
Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');