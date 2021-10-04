<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'id','entitle','maltitle','status','users_id'
    ];
}
