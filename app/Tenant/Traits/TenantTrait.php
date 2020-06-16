<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait
{
    protected static function boot()
    {
        parent::boot();

        static::observe(TenantObserver::class);

        static::addGlobalScope(new TenantScope);
    }
}