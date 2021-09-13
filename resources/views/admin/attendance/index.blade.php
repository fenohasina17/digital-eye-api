@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<<<<<<< HEAD
=======
<div class="container-fluid">

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
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
<<<<<<< HEAD
         <label for="class">GRADE:</label>
        <select class=" class custom-select custom-select-lg mb-3">
            <option selected>Select your grade</option>
=======
         <label for="class">GRADES:</label>
        <select class=" class custom-select custom-select-lg mb-3">
            <option selected>Select your grades</option>
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="1">4</option>
            <option value="2">5</option>
            <option value="3">6</option>
            <option value="1">7</option>
            <option value="2">8</option>
        </select>
<<<<<<< HEAD
          
=======

     </div>
     <div class="col-md-3">
         <label for="class">COUNT:</label>
        <select class=" class custom-select custom-select-lg mb-3">
            <option selected>Select count</option>
            <option value="1">10</option>
            <option value="1">20</option>
            <option value="1">30</option>
            <option value="1">40</option>
            <option value="1">50</option>
        </select>

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
     </div>
     <div class="col-md-3">
         <label for="section">CLASS:</label>
        <select class="section custom-select custom-select-lg mb-3">
            <option selected>Select section</option>
            <option value="1">Class1</option>
            <option value="2">Class2</option>
            <option value="3">Class3</option>
        </select>
<<<<<<< HEAD
          
=======

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
     </div>
     <div class="col-md-2">
        <label for="startDate">START DATE</label>
        <input type="date" name="startDate" id="startDate" class="startDate  form-control" >
<<<<<<< HEAD
          
=======

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
     </div>
     <div class="col-md-2">
        <label for="startDate">END DATE</label>
        <input type="date" name="endDate" id="endDate" class="endDate  form-control" >
        </select>
<<<<<<< HEAD
          
=======

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
     </div>
     <div class="col-md-2" style="padding: 30px">
         <button class="btn btn-primary">VIEW</button>
         <button class="btn btn-success">DOWNLOAD</button>
     </div>
 </div>
<<<<<<< HEAD
 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">USERNAME</th>
      <th scope="col">DATE</th>
      <th scope="col"> TIME IN</th>
      <th scope="col"> TIME OUT</th>    
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
=======

 <table id="example" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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

    <tbody>
            @php
                foreach ($attendances as $attendance){

            @endphp
                <tr>
                    <td>
                        @php
                            echo $attendance->id
                        @endphp
                    </td>
                    <td>
                        @php
                            echo $attendance->name
                        @endphp
                    </td>
                    <td>
                        @php
                            $time = (string) $attendance->timestamp;
                            $date = "";
                            $hours = "";
                            for($i = 0; $i < strlen($time); $i++){
                                if($i <= 10){
                                    $date = $date.$time[$i];
                                }else{
                                    $hours = $hours.$time[$i];
                                }
                            }
                            echo $date;
                        @endphp
                    </td>
                    <td>
                        @php
                            echo $hours
                        @endphp
                    </td>
                    <td></td>
                    <td>
                        @php
                            if($attendance->respirator == 1){
                                echo "With";
                            }else{
                                echo "whithout";
                            }
                        @endphp
                    </td>
                    <td>
                        @php
                            $temperat = (($attendance->bodyTemperature * 9)/5) + 32;
                            echo $temperat;
                        @endphp
                    </td>
                </tr>
            @php
                }
            @endphp
    </tbody>

    </table>
 </div>


@endsection
@section('stylesheets')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
