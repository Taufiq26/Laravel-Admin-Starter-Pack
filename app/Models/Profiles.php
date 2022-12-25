<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Users;

class Profiles extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'profiles';

    function users()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }
}
