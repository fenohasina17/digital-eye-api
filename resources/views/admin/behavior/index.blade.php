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

  </ul>

<div class="row" style="padding: 50px">
    <div class="col-md-6">
        <label for="show">Show:</label>
        <select name="show" id="show" class="form-control">
            <option value="10">20</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="col-md-6" style="padding: 17px">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>
    </div>

</div>

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Good</th>
        <th scope="col">Average</th>
        <th scope="col">Bad</th>
        <th scope="col">Suspension</th>
        <th scope="col">Expulsion</th>    

      </tr>
    </thead>
   
  </table>

@endsection

@section('scripts')

@endsection
