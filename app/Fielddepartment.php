<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fielddepartment extends Model
{
    protected $fillable = [
        'departments_id', 'name', 'malname','status','users_id'
    ];
}
