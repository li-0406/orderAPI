<?php

namespace App\Providers;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('hello', function (View $view) {
            $dataToBePassed = [
                'name' => 'JoJo',
                'age' => 23,
                'hobby' => 'swimming',
                'favorite food' => 'chocolate',
                'height' => '170cm',
                'weight' => '50kg'
            ];
            $passedObject = (object) $dataToBePassed;
            $view->with('anotherMessage', $dataToBePassed)
            ->with('objectHere', $passedObject);
        });


        Response::macro('api',function($msg='',$code=200,$data=''){
            $resData=[
                'code'=>$code,
                'message'=>$msg,
                'data'=>$data,
                'time'=>time(),
            ];
            return response()->json($resData);
        });

        Response::macro('caps', function (string $value) {
            return Response::make(strtoupper($value));
        });
    }
}