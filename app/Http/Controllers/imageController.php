<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;
use Validator;
use File;
use App\Models\product_image;


class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $image = image::select('*')->where('enable',1)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'success show data',
            'image'=>$image
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
         $validator = Validator::make($request->all(),[
            'name' => 'required',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif',
            'enable' => 'required',
        ]);
        if ($validator->fails()) {    
            return response()->json($validator->messages(),);
        }

             $image = image::create([
                 'name' => $request->name,
                 'file'=>$request->file,
                 'enable'=>$request->enable,
             ]);

             if($request->hasFile('file')){
                 $file = $request->file('file');
                 $file_ext = $file->getClientOriginalExtension();
                 $file_name = $image->id.'.'.$file_ext;
                 $file_folder = '/photo/image/';
                 $file_location = $file_folder.$file_name;

                 try{


                     $file->move(public_path($file_folder),$file_name);
                         // return 'Error saving the file.';


                     $image->update([
                         'file'=>$file_location,

                     ]);

                 }catch(\Exception $e){
                     return response()->json([
                         'response'=>'01',
                         'response_message'=>'Fail Add Image',
                     ],200);
                 
                 }    
             
             return response()->json([
                 'response_code'=>'00',
                 'response_message'=>'success creating image',
                 'image'=>$image
             ]);
         }

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
        $image = image::where('id',$id)->get();

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Detail data',
            'image'=>$image
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
            $image = image::find($id);

            $image->update([
                "name"=>$request->name,
                "enable"=>$request->enable,
            ]);

             if($request->hasFile('file')){
                 $file = $request->file('file');
                 $file_ext = $file->getClientOriginalExtension();
                 $file_name = $image->id.'.'.$file_ext;
                 $file_folder = '/photo/image/';
                 $file_location = $file_folder.$file_name;

                 try{


                     $file->move(public_path($file_folder),$file_name);
                         // return 'Error saving the file.';


                     $image->update([
                         'file'=>$file_location,

                     ]);

                 }catch(\Exception $e){
                     return response()->json([
                         'response'=>'01',
                         'response_message'=>'Fail Add Image',
                     ],200);
                 
                 }    
             
             return response()->json([
                 'response_message'=>'success Edit image',
                 'image'=>$image
             ]);
         }

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
        
        $image = image::where('id',$id)->first();
        
        $CheckRelation = product_image::where('image_id',$id)->get();

        $name= $image->name;
        if(count($CheckRelation) != NULL){
            return response()->JSON([
                'response_message'=>'Cannot Delete Data, Because Used in Another Proses'
            ]);
        }else{
            file::delete(public_path($image->file));
            $image->delete();
        
            return response()->json([
                'response_code'=>'00',
                'response_message'=>'Success Delete '.$name,
            ],200);
        }
    

    }
}
