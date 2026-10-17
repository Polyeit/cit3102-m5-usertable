<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $primaryKey = 'UID';

    protected $fillable = ['UName', 'UAge', 'UCity', 'UEmail'];
}
