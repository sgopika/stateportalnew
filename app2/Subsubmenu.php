<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsubmenu extends Model
{
    protected $fillable = [ 'file','iconclass','entitle', 'maltitle', 'entooltip', 'maltooltip','submenu','menulinktypes_id','pointto','users_id'
      	];
}
