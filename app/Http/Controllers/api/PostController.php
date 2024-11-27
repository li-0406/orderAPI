<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    // 获取所有文章
    public function index()
    {
        return Post::all(); // 返回所有文章
    }
}