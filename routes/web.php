<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

            /*
                Permission x Profile
            */
            Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
            Route::get('permissions/{id}/profile/{idPermission}/detach', 'ACL\PermissionProfileController@detachProfilePermissions')->name('permissions.profiles.detach');
            Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
            Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
            Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
            Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

            /*
                Rotas de Permissions
            */
            Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
            Route::resource('permissions', 'ACL\PermissionController');

            /*
                Rotas de Perfis
            */
            Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
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
