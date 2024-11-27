<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_order extends Model
{
    use HasFactory;

    protected $table = 'total_order';

    protected $fillable = ['name', 'email', 'orderName',  'expirationTime','orderCode'];

    function childrenOrder(){
        return $this->hasMany(item_order::class,'orderCode','orderCode');
    }
}