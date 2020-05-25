<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

            /*
                Rotas de Perfis
            */
            Route::resource('profiles', 'ACL\ProfileController');

            /*
                Rotas do Detalhes do Plano  
            */
            Route::delete('plans/{url}/details/{id}', 'DetailPlanController@destroy')->name('details.plan.destroy');
            Route::get('plans/{url}/details/{id}', 'DetailPlanController@show')->name('details.plan.show');
            Route::put('plans/{url}/details/{id}', 'DetailPlanController@update')->name('details.plan.update');
            Route::get('plans/{url}/details/{id}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
            Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
            Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
            Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

            /*
                Rotas do Plano
            */
            Route::get('plans/create', 'PlanController@create')->name('plans.create');
            Route::put('plans/{id}', 'PlanController@update')->name('plans.update');
            Route::get('plans/{id}/edit', 'PlanController@edit')->name('plans.edit');
            Route::any('plans/search', 'PlanController@search')->name('plans.search');
            Route::delete('plans{id}', 'PlanController@destroy')->name('plans.destroy');
            Route::get('plans{id}', 'PlanController@show')->name('plans.show');
            Route::post('plans', 'PlanController@store')->name('plans.store');
            Route::get('plans', 'PlanController@index')->name('plans.index');

            /*
                Home Dashboard
            */
            Route::get('admin', 'Admin\PlanController@index')->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
