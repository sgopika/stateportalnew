<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footermenu extends Model
{
    protected $fillable = [
        'file','alt','entitle','maltitle','encontent','malcontent','components_id','users_id'
    ];
}
