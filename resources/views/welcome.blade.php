<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
       
          <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    </head>

<body>
<div class="row">
<? if(isset($emp_edit))
   {  
      $emp_edit_row = App\emp_model::find($emp_edit->id);
      $emp_name=$emp_edit_row->emp_name;
      $emp_details=$emp_edit_row->emp_details;
     
    
?>    
{!! Form::open(array('method' => 'PUT', 'action' => 'employee_controller@update', 'class' => 'form-horizontal', 'enctype'=>"multipart/form-data"))  !!}
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
<input type="hidden" value="{!! $emp_edit->id !!}"  id="id" name="id">
<? }else
    {
    $emp_name="";
    $emp_details="";
?>
{!! Form::open(array('method' => 'post', 'class' => 'form-horizontal', 'enctype'=>"multipart/form-data"))  !!}

<? } ?>
<div class="col-md-6 col-md-offset-3">
    <div class="" align="center">
      <h3 class="jumbotron" >Employee Entry</h3>
    </div>
              
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label class="control-label col-sm-2">EmpName</label>
              <div class="col-sm-9">
                 <input type="text" name="emp_name" id="emp_name" value="<? echo $emp_name; ?>" placeholder="emp_name" required="required" class="form-control"/>
               </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2">EmpPhoto</label>
              <div class="col-sm-9">
                <input type="file" accept="image/*" name="empphoto" id="empphoto" class="form-control" />
              </div>
            </div>     
        </div>
        <div class="form-group">
            <? if(!isset($emp_edit)){ ?>
                 <center><input type="submit" name="Submit" class="btn btn-primary center-block" id="Submit" value="Submit" /></center>
            <? }else{ ?>

                 <center><input type="submit" name="Submit" class="btn btn-primary center-block" id="Submit" value="Update" /></center>
            <? } ?>
        </div>
    </div>
</div>
{!! Form::close() !!}
</div>

    <?php 
        $emp_details=$emp_detail;
        //echo json_encode($emp_details);
    ?>  
    <div class="container">
      <h3>Employee Table</h3>
      <p></p>            
      <table class="table">
        <thead>
          <tr>
          <th>sr.num</th>
            <th>Emp_name</th>
            <th>Emp_details</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    <?php
    $i=0;
     foreach ($emp_details as $key => $emp) {
    ?>
          <tr>
            <td><?php echo ++$i; ?></td>
            <td><?php echo $emp->emp_name; ?></td>
            <td><?php echo $emp->emp_description; ?></td>
            <td><?php echo date('d/m/Y', strtotime($emp->updated_at)); ?></td>
            <td> 
                <a href="{{ URL::to('emp/edit/'.$emp->id) }}" id="edit" class="">Edit</a>
                <a href="{{ URL::to('emp/delete/'.$emp->id) }}" id="delete" class="">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
