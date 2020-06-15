<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Observers\TenantObserver;

class Category extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'url', 'description'];

}
