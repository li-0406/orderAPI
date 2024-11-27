<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // 驗證前端傳來的資料
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 將資料寫入資料庫
        $post = Post::create($validatedData);

        // 回傳成功訊息及新資料
        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post
        ], 201);
    }
}