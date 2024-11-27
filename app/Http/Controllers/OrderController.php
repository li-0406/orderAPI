<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\total_order;
use App\Models\item_order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Request successful',
             'data' => total_order::all(),
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'orderName' =>'required',
            'expirationTime' =>'required']);
            
        $orderCode =rand(100000, 999999);

        total_order::create([
            'name' => $request->name,
            'email' => $request->email,
            'orderName' => $request->orderName,
            'expirationTime'=>$request->expirationTime,
            'orderCode'=>$orderCode
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Request successful',
            'data' => ['orderCode' => $orderCode],
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identifier)
    {
        if(is_numeric($identifier)){
            $order=total_order::where('orderCode',$identifier)->with('childrenOrder')->first();
        }else{
            $order=total_order::where('email',$identifier)->with('childrenOrder')->paginate(10);
        }
        return response()->json([
            'status' => true,
           'message' => 'Request successful',
            'data' => $order,
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $order=total_order::find($request->id);
         $order->update($request->all());
        
        return response()->json([
            'status' => true,
            'message' => 'Request successful',
            'data' => $order,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $orderCode)
    {
        total_order::where('orderCode',$orderCode)->delete();
        item_order::where('orderCode',$orderCode)->delete();
        
        return response()->json([
            'status' => true,
           'message' => 'Request successful',
           'data' => '刪除成功',
        ],200);
    }
}