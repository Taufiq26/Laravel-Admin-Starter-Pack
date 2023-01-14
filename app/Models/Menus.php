<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\MenusAccess;

class Menus extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'menus';
   
    function access(){
        return $this->hasOne(MenusAccess::class, 'menu_id', 'id');
    }
}
