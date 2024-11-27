<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\File;
use App\Http\Requests\UserRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;
use App\Models\Flight;
use App\Models\User;

class testController extends Controller{
    public function __invoke(Request  $request)
    {
      $user = Blog::find(2);
      $blogs=$user->user()->get();

      // $test=User::find(2);
      // // $blog = new Blog(['title'=>'test blog','content'=>'test content','category_id'=>1]);
      // $user->blogs()->create([
      //   'title'=>'妳好',
      //   'content'=>'這是一個嗨嗨文章',
      //   'category_id'=>1
      // ]);
      return response()->api('success',200,$user);
    }
}