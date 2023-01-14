<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    use HasFactory;
    
    public $incrementing = false;
    public $keyType = 'string';
	public $timestamps = false;
    protected $table = 'access_token';
}
