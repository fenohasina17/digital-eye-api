@extends('parent.layouts.master')
@section('title',$title)
@section('content')
<ul class="nav nav-pills nav-fill" style="padding: 50px">
    <li class="nav-item">
      <a class="nav-link active" href="#">CLASS ROUTINES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">TEACHER ROUTINES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">EXAM ROUTINES</a>
    </li>
    
  </ul>
  <div class="row">
    <div class="col-md-4">
      
        <select name="class" id="class" class=" form-control">
            <option value="Class 1">Class 1</option>
            <option value="Class 2">Class 2</option>
            <option value="Class 3">Class 3</option>
        </select>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <button class="btn btn-primary">ADD NEW</button>
    </div>
  </div>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">DAY</th>
        <th scope="col">Math</th>
        <th scope="col">Art & Deco</th>
        <th scope="col">Philosophy</th>
        <th scope="col">Culture</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Monday</th>
        <td>08h-9h</td>
        <td>14h-15h</td>
        <td>15h-17h</td>
        <td>9h-11h</td>
      </tr>
      <tr>
        <th scope="row">Tuesday</th>
        <td>08h-9h</td>
        <td>14h-15h</td>
        <td>15h-17h</td>
        <td>9h-11h</td>
      </tr>
      <tr>
        <th scope="row">Wednesday</th>
        <td>08h-9h</td>
        <td>14h-15h</td>
        <td>15h-17h</td>
        <td>9h-11h</td>
      </tr>
      <tr>
        <th scope="row">Thursday</th>
        <td>08h-9h</td>
        <td>14h-15h</td>
        <td>15h-17h</td>
        <td>9h-11h</td>
      </tr>
      <tr>
        <th scope="row">Friday</th>
        <td>08h-9h</td>
        <td>14h-15h</td>
        <td>15h-17h</td>
        <td>9h-11h</td>
      </tr>
    </tbody>
  </table>



 
@endsection
@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')

@endsection