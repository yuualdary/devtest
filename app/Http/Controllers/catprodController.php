<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_product;
class catprodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category_product = category_product::with('categories','products')->get();
        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success show data',
            'category_product'=>$category_product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'product_id' => 'required',
            'category_id'=>'required',
            
        ]);

        $category_product = category_product::create([
            'product_id' => $request->product_id,
            'category_id'=>$request->category_id,
            
        ]);

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success creating category product',
            'category_product'=>$category_product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        $category_product = category_product::with('categories','products')->where('id',$id)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Detail data',
            'category_product'=>$category_product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category_product =  category_product::find($id);

        $category_product->update([
            'product_id' => $request->product_id,
            'category_id'=>$request->category_id,
        ]);
        
        return response()->JSON([
            'response_message'=>'Success Edit Category Product',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category_product = category_product::find($id);
        $category_product->delete();
        return response()->JSON([
            'response_message'=>'success delete'.$name,
        ]);
        
    }

    
}
