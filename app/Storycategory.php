<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storycategory extends Model
{
     protected $fillable = ['name', 'malname', 'status', 'users_id'
    ];
}
