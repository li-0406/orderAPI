<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword=$request->query('keyword');
        $blogs=Blog::when($keyword,function($query,$keyword){
            $query->where(function($query) use ($keyword){
                $query->where('title','like',"%{$keyword}%")
                ->orWhere('content','like',"%{$keyword}%");
            });
         })
         ->where('status',1)
         ->orderBy('updated_at','desc')
         ->paginate(1);
        return response()->json(["data"=>$blogs],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $res=DB::table('blogs')->insert([
        //     'title' => $request->input('title'),
        //     'content' => $request->input('content'),
        //     'category_id' => $request->input('category_id'),
        //     'user_id'=>$request->input('user_id'),
        // ]);

        // $blog=new Blog();
        // $blog->title=$request->input('title');
        // $blog->content=$request->input('content');
        // $blog->category_id=$request->input('category_id');
        // $blog->user_id=$request->input('user_id');
        // $blog->save();
        $blog=new Blog();
        $blog->fill([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'user_id'=>$request->input('user_id'),
        ]);
        $res=$blog->save();

        return response()->json(["data"=>$res],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return response()->json(["data"=>$blog],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {

        $blog->fill($request->only(['title','content']));
        $blog->save();


        return response()->json(["data"=>$blog],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(string $id)
    {
        return 123;
    }
}