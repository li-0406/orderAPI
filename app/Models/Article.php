<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles'; #指定儲存數據的資料表
    protected $fillable = [ #要接收數據的欄位
        'title',
        'content'
    ];
}