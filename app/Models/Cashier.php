<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cashier extends Authenticatable
{
    use Notifiable; use HasFactory;

    protected $guard = "cashier";

    // protected $table = 'cashiers';
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

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function branch(){
        return $this->belongsTo('App\Models\Cashier');
    }

    public function role(){
        return $this->belongsTo('App\Models\CashierRole');
    }
}
