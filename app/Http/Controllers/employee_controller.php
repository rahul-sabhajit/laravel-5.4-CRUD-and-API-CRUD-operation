<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Request;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input, Redirect,Session,Image;
use Illuminate\Support\Facades\Validator;
use App\emp_model;

/**
* 
*/
class employee_controller extends controller
{
	
	
	public function index(){

		$emp_detail= emp_model::orderBy('id')->get();
		return view('welcome')->with('emp_detail', $emp_detail);
	}
	public function store()
    {
            $_emp = new emp_model;
            $_emp->emp_name = Input::get('emp_name'); 
            $fileName="";
            if (Input::file('empphoto')!="")
               {  
                    //echo "hi";
                    $file = Input::file('empphoto');
                    echo json_encode($file);
                    $destinationPath = 'upload/emp/'; // upload path
                    $extension = Input::file('empphoto')->getClientOriginalExtension(); // getting image extension
                    $fileName = date("Y-m-d",time())."_".rand(11111,99999).'.'.$extension; // renameing image
                    $path = $destinationPath. $fileName;
                    Image::make($file->getRealPath())->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio(); })->save($path);

                    $_emp->empphoto= $fileName;
                }
             $_emp->save();
            // redirect
            return Redirect::to('emp');
    }

    public function edit($id)
    {    
    	//echo json_encode($id);
         $emp_edit= emp_model::find($id);
         //echo json_encode($emp_edit);
         $emp_detail= emp_model::orderBy('id')->get();
         return view('welcome')->with('emp_detail', $emp_detail)->with('emp_edit', $emp_edit);
    }

    public function update()
    {       
         $id = Input::get('id');
         $emp_update = emp_model::find($id);
         $emp_update->emp_name = Input::get('emp_name');
         $old_file = $emp_update->empphoto;
            if (Input::file('empphoto')!="")
           {  
                  $category_image = Input::file('empphoto');
                  $destinationPath = 'upload/emp/'; 
                  $extension = Input::file('empphoto')->getClientOriginalExtension(); 
                  $fileName = date("Y-m-d",time())."_".rand(11111,99999).'.'.$extension; 
                  $path = $destinationPath. $fileName;
                  $filepath = $destinationPath.$old_file;
                  Image::make($category_image->getRealPath())->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio(); })->save($path);
                  if(file_exists($filepath))
                  \File::delete($filepath);
                  $emp_update->empphoto = $fileName;
            }
         $emp_update->save();
         return Redirect('emp');
    }

    public function delete($id)
    {
        $emp_image="";
        $destinationPath = "upload/emp/"; 
        $file_detail = emp_model::find($id);
        $emp_image = $file_detail->empphoto;
        $filepath = $destinationPath.$emp_image; 
        if(file_exists($filepath))
           {
            \File::delete($filepath); 
            emp_model::find($id)->delete();
            }
            else
            {
            emp_model::where('id',$id)->delete();
            }
            return back()->withInput(); 
    }


}
?>