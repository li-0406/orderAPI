<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item_order;

class JoinOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Request successful',
            'data'=>item_order::all()
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
        $list=$request->list;
        foreach($list as $data){
            item_order::create([
                'name' => $request->name,
                'email'=>$request->email,
                'orderCode'=>$request->orderCode,
                'price' => $data['price'],
                'item' => $data['item'],
                'sum' => $data['sum'],
            ]);
        };

        return response()->json([
            'status' => true,
            'message' => '新增成功',
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identifier)
    {
        if(is_numeric($identifier)){
            $order=item_order::where('orderCode',$identifier)->paginate(10);
        }else{
            $order=item_order::where('email',$identifier)
            ->with(['fatherOrder'=>function($query){
                $query->select('orderCode','expirationTime','orderName');
            }])->orderBy('orderCode')->paginate(10);
        }
        return response()->json([
           'status' => true,
           'message' => 'Request successful',
            'data'=>$order,
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
    public function update(Request $request, string $id)
    {
        $order=item_order::find($id);
        $order->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Request successful',
            'data'=>$order
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order=item_order::find($id);
        $order->delete();
        return response()->json([
            'status' => true,
           'message' => 'Request successful',
            'data'=>'刪除成功'
        ],200);
    }
}