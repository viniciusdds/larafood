<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    /*
        obter os perfis
    */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
