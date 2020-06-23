<?php

use Illuminate\Routing\Route;

Route::get('/tenants/{uuid}', 'TenantApiController@show');
Route::get('/tenants', 'TenantApiController@index');             