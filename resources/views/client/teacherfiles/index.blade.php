@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<div class="">
    <ul class="nav nav-pills nav-fill" style="padding: 50px">
        <li class="nav-item">
          <a class="nav-link active" href="#">Grade 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Grade 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Grade 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Grade 4</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">Grade 5</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">Grade 6</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">Grade 7</a>
        </li>           
        <li class="nav-item">
            <a class="nav-link " href="#">Grade 8</a>
        </li>
      </ul>
      <ul class="nav nav-pills nav-fill" style="padding-inline: 45px">
          <li>
              <a href="#" class="nav-link active">Teacher #</a>
          </li>
          <li>
            <a href="#" class=" btn btn-success nav-link active" style="margin-left: 10px">Upload files </a>
        </li>
      </ul>
</div>
@endsection

@section('scripts')

@endsection
