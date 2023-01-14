<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusAccess extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'menu_access';
}
