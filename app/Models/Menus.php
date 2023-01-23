<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

use App\Models\MenusAccess;

class Menus extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'menus';
   
    public function parent()
    {
        return $this->hasOne(Menus::class, 'id', 'parent_id');
    }

    public function access()
    {
        return $this->hasOne(MenusAccess::class, 'menu_id', 'id')->where('role_id', Session::get('role_id'));
    }
}
