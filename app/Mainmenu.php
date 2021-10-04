<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainmenu extends Model
{
	
     protected $fillable = [ 'file','iconclass','entitle', 'maltitle', 'entooltip', 'maltooltip','menulinktypes_id','pointto','orderno','users_id'
      	];
      	protected $table = "mainmenus";

     public function submenus()
     {
          return $this->hasMany(Submenu::class, 'parentmenu');
     }
}
