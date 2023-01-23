<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Roles;

class Users extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'users';

    public function roles()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }
}
