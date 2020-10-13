<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','branch_name','branch_street','branch_city','branch_state','branch_post_code','branch_country', 'branch_contact_number','branch_operating_hours','branch_other_info'];
}
