<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/aku', function () {
    return "<h1>AKu anak sehat</h1>";
});
