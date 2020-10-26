<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    use HasFactory;
    protected $table = 'cashiers';
    protected $fillable = [
        'branch_id',
        'cashier_role_id',
        'username',
        'firstName',
        'lastName',
        'email',
        'phone',
        'password',
    ];

    public function branch(){
        return $this->belongsTo('App\Models\Cashier');
    }

    public function role(){
        return $this->belongsTo('App\Models\CashierRole');
    }
}
