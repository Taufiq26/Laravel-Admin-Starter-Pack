<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'roles';

    public function access()
    {
        return $this->hasMany(MenusAccess::class, 'role_id', 'id');
    }
}
