<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carmodel extends Model
{
   protected $table = 'model';
   protected $gurd = [];

    
   public function addmodel($data,$filename1,$filename2){
           $model = new carmodel();
	 	       $model->model_number         =  $data['model_number']?$data['model_number']:'';     
           $model->manufacturer_id      =  $data['manufacturer']?$data['manufacturer']:'';     
           $model->colour               =  $data['colour']?$data['colour']:''; 
           $model->year                 =  $data['manufacturer_year']?$data['manufacturer_year']:''; 
           $model->register_no      =  $data['register_number']?$data['register_number']:''; 
           $model->note                 =  $data['note']?$data['note']:''; 
           $model->quantity             =  $data['quantity']?$data['quantity']:'';
           $model->photo_1              =  $filename1?$filename1:'';              
           $model->photo_2              =  $filename2?$filename2:''; 
           $model->deleted              =  0;  
           $result = $model->save();
           return $result;

   }

   public function updatemodel($data,$filename1,$filename2){
            $updatedata =array(
                'manufacturer_id'=> $data['manufacturer'],
                'colour'         => $data['colour'],
                'year'           => $data['manufacturer_year'],
                'register_no'    => $data['register_number'],
                'note'           => $data['note'],
                'quantity'       => $data['quantity'] 
            );
            
            /*dd($filename2); */
            if(isset($filename1) && !empty($filename1)){
 
             $file1arr = array( 'photo_1'       => $filename1);
             $updatedata = array_merge( $file1arr,$updatedata);
            }
              
            if(isset($filename2) && !empty($filename2)){
              $file2arr = array( 'photo_2'       => $filename2);
              $updatedata = array_merge( $updatedata,$file2arr);
            }   
            
            $model  = new carmodel(); 
            $result = $model->where('id', $data['dataid'])->where('model.deleted', '<>', '1')->update($updatedata);
        
           return $result;

   }
}
