<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category_product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = product::select('*')->where('enable',1)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success show data',
            'product'=>$product
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
            'name' => 'required',
            'description'=>'required',
            'enable' => 'required',
        ]);

        $product = product::create([
            'name' => $request->name,
            'description'=>$request->description,
            'enable'=>$request->enable,
        ]);

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success creating product',
            'product'=>$product
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
        $product = product::where('id',$id)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Detail data',
            'product'=>$product
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
        $product =  product::find($id);

        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'enable'=>$request->enable
        ]);
        
        return response()->JSON([
            'response_message'=>'success Edit Product',
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
        $product = product::find($id);

        $CheckRelation = category_product::where('id',$id)->get();
 
        $name= $product->name; 
        if(count($CheckRelation) !=NULL){
 
             return response()->JSON([
                 'response_message'=>'Cannot Delete Data, Because Used in Another Proses'
             ]);
        }else{
            $product->delete();
 
            return response()->JSON([
                'response_message'=>'success delete'.$name,
            ]);
        }
    }
}
