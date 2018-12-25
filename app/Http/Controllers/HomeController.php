<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\manufacturer;
use App\carmodel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the manufacture
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addmanufacturer()
    {
        return view('dashboard.manufacturer');
    }

    /**
     * store manufacturer
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function storemanufacturer(Request $request)
    {
        $rules = array( 'manufecturer_name'    => 'required|alpha|min:3|max:12');
        $messages = array( 
            'manufecturer_name.required' => 'please enter manufecturer name ',
            'manufecturer_name.min'  => 'please enter at least 3 character in manufacture name'
            
        );
   
        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return Redirect('manufacturer')
                ->withErrors($validator) 
                ->withInput(); 
        }else{
            $manufacturer = new manufacturer([
            'name' => $request->get('manufecturer_name'),
           ]);

          $resutl=$manufacturer->save();
          
          if( $resutl){
             return redirect('/manufacturer')->with('success', 'Manufacturer has been added');
          }else{
             return redirect('/manufacturer')->with('success', 'some problem occure');
          } 
        }
    
    }

     /**
     * add model view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addmodelview(){
      $manufacturer =  manufacturer::get();
      $manufacturer = json_decode($manufacturer);
      return view('dashboard.model_detail')->with('manufacturer', $manufacturer);   
    }


    public function addmodel(Request $request){
       // dd($request->all()); 
       
        $rules = array( 'model_number'         => 'required|min:3|max:12|unique:model',
                        'manufacturer'         => 'required',
                        'colour'               => 'required',
                        'manufacturer_year'    => 'required|numeric', 
                        'register_number'      => 'required|numeric',
                        'note'                 => 'required',
                        'picture1'             => 'required|image|max:3000',
                        'picture2'             => 'required|image|max:3000',
                        'quantity'                     => 'required|numeric',
        );
        $messages = array( 
            'model_number.required'              => 'Please Enter Model Name ',
            'manufacturer.required'              => 'Please Enter Manufacturer Name ',
            'colour.required'                    => 'Please Enter Colour', 
            'manufacturer_year.required'         => 'Please Enter Manufacturing Year', 
            'register_number.required'           => 'Please Enter Register Number',
            'note.required'                      => 'Please Enter Note',
            'picture1.required'                  => 'Please uploadr First  Picture',
            'picture2.required'                  => 'Please upload  Second  Picture', 
            'quantity.required'                  => 'Please Enter quantity', 
        );
   
        $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()->all()]);
        }else{
        
           /* $picture =  array();
            if(!empty($request->file('picture'))){
                    $files = $request->file('picture');
                    foreach($files as $key => $file){
                     $filenamewithext = $file->getClientOriginalName();
                     $filenameonly    = pathinfo($filenamewithext,PATHINFO_FILENAME);
                     $fileName        =  $filenameonly.time().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path('uploads'), $fileName);
                     $picture[$key] = $fileName ;
                    }
               }else{
                    dd('please enter images');
               }*/
               
               $fileName1 ='';
               $fileName2 ='';
               $file1 = $request->file('picture1');
               $file2 = $request->file('picture2');
                

               if(!empty($file1)){
                 
                  $filenamewithext = $file1->getClientOriginalName();
                  $filenameonly    = pathinfo($filenamewithext,PATHINFO_FILENAME);
                  $fileName1       =  $filenameonly.time().'.'.$file1->getClientOriginalExtension();
                  $file1->move(public_path('uploads'), $fileName1);
               }
             
               if(!empty($file2)){
                
                  $filenamewithext = $file2->getClientOriginalName();
                  $filenameonly    = pathinfo($filenamewithext,PATHINFO_FILENAME);
                  $fileName2       =  $filenameonly.time().'.'.$file2->getClientOriginalExtension();
                  $file2->move(public_path('uploads'), $fileName2);
               }

               $model = new carmodel();
               $result = $model->addmodel($request->all(),$fileName1,$fileName2);
               if($result){
                   return response()->json(['success'=>'Data Uploaded Successfully']);
               }
        }     
    }

    public function carlistview(){
    
        $model_detail  =  carmodel::select("model.*","manufacturer.name")
                          ->where('model.deleted', '<>', '1')
                          ->leftJoin('manufacturer', function($join) {
                         $join->on('model.manufacturer_id', '=', 'manufacturer.id');
                        })->get();
        $model_detail  = json_decode($model_detail);

        return view('dashboard.car_list')->with('model_detail',$model_detail);   
    }


    public function carlistdetailsview($id){
        $model_detail  =  carmodel::select("model.*","manufacturer.name")
                         ->where('model.id', '=',$id)
                         ->where('model.deleted', '<>', '1')
                         ->leftJoin('manufacturer', function($join) {
                         $join->on('model.manufacturer_id', '=', 'manufacturer.id');
                        })->get();

        $model_detail  = json_decode($model_detail);
        $manufacturer =  manufacturer::get();
        $manufacturer = json_decode($manufacturer);
        //dd($model_detail[0]);
        return view('dashboard.model_detail_view')->with('model_detail',$model_detail[0])
                                                  ->with('manufacturer', $manufacturer);  

    }

    public function carupdateview($id){
       $model_detail  =  carmodel::select("model.*","manufacturer.name")
                         ->where('model.id', '=',$id)
                         ->where('model.deleted', '<>', '1')
                         ->leftJoin('manufacturer', function($join) {
                         $join->on('model.manufacturer_id', '=', 'manufacturer.id');
                        })->get();

        $model_detail  = json_decode($model_detail);
        $manufacturer =  manufacturer::get();
        $manufacturer = json_decode($manufacturer);
        return view('dashboard.update_model_view')->with('model_detail',$model_detail[0])
                                   ->with('manufacturer', $manufacturer); 
    }


     public function updatemodel(Request $request,$id){
       // dd($request->all()); 
       
        $rules = array( 
                        'manufacturer'         => 'required',
                        'colour'               => 'required',
                        'manufacturer_year'    => 'required|numeric', 
                        'register_number'      => 'required|numeric',
                        'note'                 => 'required',
                        'picture1'             => 'image|max:3000',
                        'picture2'             => 'image|max:3000',
                        'quantity'             => 'required|numeric',
        );
        $messages = array( 
            'manufacturer.required'              => 'Please Enter Manufacturer Name ',
            'colour.required'                    => 'Please Enter Colour', 
            'manufacturer_year.required'         => 'Please Enter Manufacturing Year', 
            'register_number.required'           => 'Please Enter Register Number',
            'note.required'                      => 'Please Enter Note',
            'quantity.required'                  => 'Please Enter Second Picture', 
        );
   
        $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()->all()]);
        }else{
        
           /* $picture =  array();
            if(!empty($request->file('picture'))){
                    $files = $request->file('picture');
                    foreach($files as $key => $file){
                     $filenamewithext = $file->getClientOriginalName();
                     $filenameonly    = pathinfo($filenamewithext,PATHINFO_FILENAME);
                     $fileName        =  $filenameonly.time().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path('uploads'), $fileName);
                     $picture[$key] = $fileName ;
                    }
               }else{
                    dd('please enter images');
               }*/
               
               $fileName1 ='';
               $fileName2 ='';
               $file1 = $request->file('picture1');
               $file2 = $request->file('picture2');
                
   
               if(!empty($file1)){
                  
                  $filenamewithext = $file1->getClientOriginalName();
                  $filenameonly    = pathinfo($filenamewithext,PATHINFO_FILENAME);
                  $fileName1       =  $filenameonly.time().'.'.$file1->getClientOriginalExtension();
                  $file1->move(public_path('uploads'), $fileName1);
               }
             
               if(!empty($file2)){
                 
                  $filenamewithext = $file2->getClientOriginalName();
                  $filenameonly    = pathinfo($filenamewithext,PATHINFO_FILENAME);
                  $fileName2       =  $filenameonly.time().'.'.$file2->getClientOriginalExtension();
                  $file2->move(public_path('uploads'), $fileName2);
               }
                
               $model = new carmodel();
               $result = $model->updatemodel($request->all(),$fileName1,$fileName2);
               if($result){
                   return response()->json(['success'=>'Data Uploaded Successfully']);
               }
        }     
    }

    public function deletemodel($id){
        $updatedata =array('deleted'=> '1');
        $model_delete  =  carmodel::where('id',$id)->where('model.deleted', '<>', '1')->update($updatedata);
        return redirect()->route('carlist');

    }
}
