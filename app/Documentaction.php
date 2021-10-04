<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentaction extends Model
{
    protected $fillable = [
         'name','status','users_id'
    ];
}
