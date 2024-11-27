<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_order extends Model
{
    use HasFactory;

    protected $table = 'item_order';

    protected $fillable = ['name', 'email', 'sum','item','price','orderCode'];

    function fatherOrder(){
        return $this->belongsTo(total_order::class,'orderCode','orderCode');
    }
}