<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusAccess extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'menus_access';

    public function menu()
    {
        return $this->belongsTo(Menus::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
