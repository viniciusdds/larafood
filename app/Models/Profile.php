<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    /*
        obter as permissões
    */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
