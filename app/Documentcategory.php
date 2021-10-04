<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentcategory extends Model
{
	 
    protected $fillable = [
        'name','remarks','status','users_id'
    ];
}
