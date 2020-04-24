<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAcivity extends Model
{
    protected $table = "user_activity";
    protected $primaryKey = "id";
    public $timestamps = false;
}
