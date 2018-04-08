<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input, Redirect,Session,Image;
use Illuminate\Support\Facades\Validator;
use App\apimodel;
use App\emp_model;
class apiController extends Controller
{
    public function index()
    {
        $emp_details = apimodel::orderBy('id')->get();
    
    foreach ($emp_details as $key => $emp) {
      # code...
    if($emp->empphoto) 
    $emp->empphoto = "http://localhost/laravel5.6/public/upload/emp/" . $emp->empphoto;
     }  
    return json_encode(array('emp_details' =>  $emp_details)
     );


    }

    public function show($id)
    {
        //echo $id;
         $emp_details = apimodel::where('id', $id)->get();
         return json_encode(array('emp_details' =>  $emp_details));
    }
    public function store()
    {   
        $emp_name = Input::get('emp_name');
        $_emp = new apimodel;
        $_emp->emp_name = $emp_name;    
         if($_emp->save()){

            $status= "Data Stored Successfully";

            $emp_details = apimodel::orderBy('id')->get();
            foreach ($emp_details as $key => $emp) {
            if($emp->empphoto) 
            $emp->empphoto = "http://localhost/laravel5.6/public/upload/emp/" . $emp->empphoto;
             }  
            return json_encode(array('status'=>$status,'emp_details' =>  $emp_details));
            }else{

                echo "Something Went Wrong, Please Try Again";
            }
    }
    public function update($id)
    {
        
        $emp_name = Input::get('emp_name');
        $row_upate_ = apimodel::find($id);
        $row_upate_->emp_name = $emp_name;
        //$row_upate_->save();

        if($row_upate_){
         if($row_upate_->save()){

            $status= "Data Updated Successfully";

            $emp_details = apimodel::orderBy('id')->get();
            foreach ($emp_details as $key => $emp) {
            if($emp->empphoto) 
            $emp->empphoto = "http://localhost/laravel5.6/public/upload/emp/" . $emp->empphoto;
             }  
            return json_encode(array('status'=>$status,'emp_details' =>  $emp_details));
            }}else{

                echo "Not Found";
            }
    }
    public function delete($id)
    {
         $row_upate_ = apimodel::find($id);
         if($row_upate_){
         if($row_upate_->delete()){

            $status= "Data Deleted Successfully";

            $emp_details = apimodel::orderBy('id')->get();
            foreach ($emp_details as $key => $emp) {
            if($emp->empphoto) 
            $emp->empphoto = "http://localhost/laravel5.6/public/upload/emp/" . $emp->empphoto;
             }  
            return json_encode(array('status'=>$status,'emp_details' =>  $emp_details));
            }}else{

                echo "Not Found";
            }}
}