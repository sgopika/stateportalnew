<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermodule extends Model
{
    protected $fillable = [
        'users_id', 'documenttypes_id', 'usertypes_id', 'status', 'enteredusers_id'
    ];
}
