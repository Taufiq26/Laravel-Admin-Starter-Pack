<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Users;

class Profiles extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'profiles';

    public function users()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }
}
