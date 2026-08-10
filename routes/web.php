<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kgs', function () {
    return view('ck_editz.kgs');
});
