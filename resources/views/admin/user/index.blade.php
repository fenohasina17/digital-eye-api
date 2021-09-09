@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<ul class="nav nav-pills nav-fill" style="padding: 50px">
    <li class="nav-item">
      <a class="nav-link active" href="#">District Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Staff</a>
    </li>
    <li class="nav-item">
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
          <a href="#" class="nav-link active">Admin</a>
      </li>
      <li>
          <a href="#" class="nav-link">ADD NEW</a>
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

 
@endsection

@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')

@endsection