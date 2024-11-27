<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Blog $blog)
    {
         $res=$blog->comments()->create([
             'user_id'=>$request->input('user_id'),
             'content'=>$request->input('content'),
             'blog_id'=>$blog->id,
         ]);

        return response()->api('success',200,$res);
    }
}