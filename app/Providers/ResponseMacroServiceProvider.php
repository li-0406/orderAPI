<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider{
    public function boot(){
        Response::macro('api',function($msg='',$code=200,$data=''){
            $resData=[
                'code'=>$code,
                'message'=>$msg,
                'data'=>$data,
                'time'=>time(),
            ];
            return response()->json($resData);
        });
    }
}