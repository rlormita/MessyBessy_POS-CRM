<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cashier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cashiers';
    protected $fillable = [
        'branch_id',
        'username',
        'firstName',
        'lastName',
        'email',
        'phone_no',
        'password',
    ];

    public function role(){
        return $this->belongsTo('App\Models\CashierRole');
    }
    public function branch(){
        return $this->belongsTo('App\Models\branch', 'branch_id')->withTrashed();
    }
}
