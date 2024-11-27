<?php
use Illuminate\Support\Facades\DB;

if (! function_exists('categories')){
    function categories(){

        $categories = cache()->rememberForever('categories',function(){
            $res=DB::table('categories')->pluck('name','id');
            return $res;
        });

        return $categories;
    }
}