<?php

namespace App\Tenant\Rules;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueTenant implements Rule
{
    protected $table, $value, $column;

    public function __construct(string $table, $value = null, $column = 'id')
    {
        $this->table = $table;
        $this->value = $value;
        $this->column = $column;
    }

   
    public function passes($attribute, $value)
    {
        $tenantId = app(ManagerTenant::class)->getTenantIdentify();

        $register = DB::table($this->table)
                                    ->where($attribute, $value)
                                    ->where('tenant_id', $tenantId)
                                    ->first();

        if($register && $register->{$this->column} == $this->value){
            return true;
        }

        return is_null($register);
    }

    
    public function message()
    {
        return 'O valor para :attribute já está em uso!';
    }
}
