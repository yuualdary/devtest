<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_image;
use validator;
class prodimage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product_image = product_image::with('images','products')->get();
            return response()->json([
                'response_code'=>'00',
                'response_message'=>'success show data',
                'product_image'=>$product_image
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
            'image_id'=>'required',
            
        ]);

        $product_image = product_image::create([
            'product_id' => $request->product_id,
            'image_id'=>$request->image_id,
            
        ]);

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success creating category product',
            'product_image'=>$product_image
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        $product_image = product_image::with('images','products')->where('id',$id)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Detail data',
            'product_image'=>$product_image
        ]);
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

        $product_image =  product_image::find($id);

        $product_image->update([
            'product_id' => $request->product_id,
            'image_id'=>$request->image_id,
        ]);
        
        return response()->JSON([
            'response_message'=>'Success Edit Product Image',
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
        $product_image = product_image::find($id);
        $product_image->delete();
        return response()->JSON([
            'response_message'=>'success delete',
        ]);
    }
}
