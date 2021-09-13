@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<ul class="nav nav-pills nav-fill" style="padding: 50px">
    <li class="nav-item">
      <a class="nav-link active" href="#">LIBRARY</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">ADD BOOKS</a>
    </li>
  </ul>

<div class="container-fluid">
    <div >
        <label for="show">CLASS:</label>
        <select name="show" id="show" class="form-control">
            <option value="Class 1">Class 1</option>
            <option value="Class 2">Class 2</option>
            <option value="Class 3">Class 3</option>
            <option value="100">100</option>
        </select>
    </div>
</div>


<div class="row" style="padding: 30px">
    <div class="col-md-6">
        <label for="show">Show</label>
        <select name="show" id="show" class="form-control">
            <option value="10">20</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="col-md-6" style="padding: 20px">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">TYPE</th>
            <th scope="col">NAME</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">STATUS</th>
            <th scope="col">DOWNLOAD</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Virtual</th>
            <td>Name of book</td>
            <td>Description of the book</td>
            <td>Avaliable</td>
            <td><button class="btn btn-success">DOWNLOAD</button></td>
          </tr>
          <tr>
            <th scope="row">Normal</th>
            <td>Name of book</td>
            <td>Description of the book</td>
            <td>Avaliable</td>
            <td><button class="btn btn-success">DOWNLOAD</button></td>
          </tr>
          <tr>
            <th scope="row">Virtual</th>
            <td>Name of book</td>
            <td>Description of the book</td>
            <td>Avaliable</td>
            <td><button class="btn btn-success">DOWNLOAD</button></td>
          </tr>
          <tr>
            <th scope="row">Virtual</th>
            <td>Name of book</td>
            <td>Description of the book</td>
            <td>Avaliable</td>
            <td><button class="btn btn-success">DOWNLOAD</button></td>
          </tr>
          <tr>
            <th scope="row">Virtual</th>
            <td>Name of book</td>
            <td>Description of the book</td>
            <td>Avaliable</td>
            <td><button class="btn btn-success">DOWNLOAD</button></td>
          </tr>
        </tbody>
      </table>
    

 
@endsection
@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')

@endsection