<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
}
