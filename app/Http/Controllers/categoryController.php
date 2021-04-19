<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Validator;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = category::select('*')->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success show data',
            'category'=>$category
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
            'enable' => 'required',
        ]);

        $category = category::create([
            'name' => $request->name,
            'enable'=>$request->enable,
        ]);

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success createing category',
            'category'=>$category
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
        $category = category::where('id',$id)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Detail data',
            'category'=>$category
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
        $category =  category::find($id);

        $category->update([
            'name'=>$request->name,
            'enable'=>$request->enable
        ]);
        
        return response()->JSON([
            'response_message'=>'success Edit Category',
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
        $category =  category::find($id);

       $CheckRelation = category_product::where('id',$id);

       $name= $category->name; 
       if($CheckRelation !=NULL){

            return response()->JSON([
                'response_message'=>'Cannot Delete Data, Because Used in Another Proses'
            ]);
       }else{
           $category->delete();

           return response()->JSON([
               'response_message'=>'success delete'.$name,
           ]);
       }

    }
}
