<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
   protected $fillable = [
        'file','alt','url','entooltip','maltooltip','logotype','users_id'
    ];
}
