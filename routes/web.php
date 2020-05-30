<?php

Route::livewire('/', 'welcome');

Route::livewire('/home', 'home')->name('home')->middleware('auth');
Route::livewire('/logout', 'logout')->middleware('auth');
Route::group(['middleware'=>'guest'], function () {
    Route::livewire('/login', 'login')->name('login');
    Route::livewire('/register', 'register');
});
