<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentorigin extends Model
{
    protected $fillable = [
       'name','status','users_id'
    ];
}
