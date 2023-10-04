<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUpUser extends Model
{
    protected $fillable = ['user_id', 'count']; 
}
