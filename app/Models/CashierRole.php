<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashierRole extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cashier_roles';
    protected $fillable = [
        'cashier_role_title',
        'description'
    ];

    public function cashiers(){
        return $this->hasMany('App\Models\Cashiers');
    }
}
