<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MenusAccess;

class Menus extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'menus';
   
    function access(){
        return $this->hasOne(MenusAccess::class, 'menu_id', 'id');
    }
}
