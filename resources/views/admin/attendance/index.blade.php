@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="nav-link active" href="#">Student</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Staff</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Student repport</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">Staff report</a>
    </li>
  </ul>

 <div class="row" style="padding-block-start: 80px; padding:50px;">
     <div class="col-md-3">
         <label for="class">GRADES:</label>
        <select class=" class custom-select custom-select-lg mb-3">
            <option selected>Select your grades</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="1">4</option>
            <option value="2">5</option>
            <option value="3">6</option>
            <option value="1">7</option>
            <option value="2">8</option>
        </select>
          
     </div>
     <div class="col-md-3">
         <label for="section">CLASS:</label>
        <select class="section custom-select custom-select-lg mb-3">
            <option selected>Select section</option>
            <option value="1">Class1</option>
            <option value="2">Class2</option>
            <option value="3">Class3</option>
        </select>
          
     </div>
     <div class="col-md-2">
        <label for="startDate">START DATE</label>
        <input type="date" name="startDate" id="startDate" class="startDate  form-control" >
          
     </div>
     <div class="col-md-2">
        <label for="startDate">END DATE</label>
        <input type="date" name="endDate" id="endDate" class="endDate  form-control" >
        </select>
          
     </div>
     <div class="col-md-2" style="padding: 30px">
         <button class="btn btn-primary">VIEW</button>
         <button class="btn btn-success">DOWNLOAD</button>
     </div>
 </div>
 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">USERNAME</th>
      <th scope="col">DATE</th>
      <th scope="col">IN TIME</th>
      <th scope="col">OUT TIME</th>    
      <th scope="col">MASK</th>
      <th scope="col">TEMPERATURE</th>
    </tr>
  </thead>
 
</table>
  
@endsection
@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')

@endsection