<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; #這裡指定資料表的名稱 students
    
    #這裡指定可以賦值的attribute
    protected $filled = ['name', 'age', 'hobby'];

}