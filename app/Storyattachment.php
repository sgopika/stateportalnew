<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storyattachment extends Model
{
	
     protected $fillable = [
       'stories_id', 'file','filetype', 'status', 'users_id'
    ];
}
