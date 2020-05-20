<?php

Auth::routes(['register' => config('dashboard.registration')]);
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
