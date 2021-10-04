<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documenttype extends Model
{
	
    protected $fillable = [
        'name','malname','reviewdays','archivedays','cmap','documentcategories_id','status','users_id'
    ];
}
