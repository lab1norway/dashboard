<?php
    
Auth::routes();
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');