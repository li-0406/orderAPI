<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller{
    public function addNewStudent(Request $request): RedirectResponse
    {
        $student = new Student; #剛剛建立的資料表Model，透過和Model互動操作資料庫
        
        $student->name = $request->name; #賦值給name attribute
        $student->age = $request->age; #賦值給age attribute
        $student->hobby = $request->hobby; #賦值給hobby attribute
        
        $student->save();
        
        return redirect('/students'); #數據新增完成，回到該路徑
    }
}