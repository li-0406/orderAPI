<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function infopage(){

    }
    public function infoUpdate(Request $request):JsonResponse{
        $name=$request->input('name');
        $email=$request->input('email');

        if(empty($name)||empty($email)){
            return response()->json(['error'=>'不得為空'], 400);
        }

        $id=$request->input('id');
        $res=DB::table('student.users')
            ->where('id',$id)
            ->update(['name'=>$name,'email'=>$email]);

        if($res){
            return response()->json(['success'=>'更新成功'], 200);
        }else{
            return response()->json(['error'=>'更新失敗'], 400);
        }
        
    }
    public function avatarpage(){

    }
    public function avatarUpdate(Request $request){
        $file=$request->file('file');
        return response()->json([$file], 200);
    }
    public function blog(){

    }
    
}