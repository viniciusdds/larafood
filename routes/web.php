<?php

use Illuminate\Support\Facades\Route;

Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');
Route::delete('admin/plans{id}', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::get('admin/plans{id}', 'Admin\PlanController@show')->name('plans.show');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});
