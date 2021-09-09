@extends('admin.layouts.master')
@section('title',$title)
@section('content')
<div class="">
        <ul class="nav nav-pills nav-fill" style="padding: 50px">
            <li class="nav-item">
              <a class="nav-link active" href="#">1st Grade</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">2nd Grade</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">3rd Grade</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">4th Grade</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">5th Grade</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">6th Grade</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">7th Grade</a>
            </li>           
            <li class="nav-item">
                <a class="nav-link " href="#">8th Grade</a>
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
