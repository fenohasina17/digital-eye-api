@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<ul class="nav nav-pills nav-fill" style="padding: 50px">

    <li class="nav-item" active>
      <a class="nav-link" href="#">Teacher</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">Parents</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#">Students</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#">Settings</a>
    </li>
  </ul>
  <ul class="nav nav-pills nav-fill" style="padding-inline: 45px">
    <li>
        <div>
            <label for="show">SCHOOL:</label>
            <select name="show" id="show" class="form-control">
                <option value="1">CES</option>
                <option value="2">Helm</option>
                <option value="3">Rio del Rey</option>
                <option value="4">SJES</option>
                <option value="5">TES</option>
            </select>
        </div>
    </li>
      <li style="padding-inline: 45px">
        <div>
            <label for="show">GRADES:</label>
            <select name="show" id="show" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>    
            </select>
        </div>
      </li>
      <li style="margin-left:800px; padding:20px;">
          <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
      </li>
     

  </ul>



<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Good</th>
        <th scope="col">Average</th>
        <th scope="col">Poor</th>
        <th scope="col">Suspension</th>
        <th scope="col">Expulsion</th>    

      </tr>
    </thead>
   
  </table>

@endsection

@section('scripts')

@endsection
