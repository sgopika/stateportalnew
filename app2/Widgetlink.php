<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widgetlink extends Model
{
    protected $fillable = [
        'fileval','file','alt','entooltip','maltooltip','entitle','maltitle','ensubtitle','malsubtitle','encontent','malcontent','menulinktypes_id','homepagestatus','users_id'	
    ];
}
