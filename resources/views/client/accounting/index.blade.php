@extends('admin.layouts.master')
@section('title',$title)
@section('content')

    <div class="container-fluid">
       <div class="row">
           <div class="col-md-10">
            <div style="margin: 20px">
                <ul class="nav nav-pills">
                    <li class="nav-item active">
                      <a class="nav-link"  role="button" href="#">MDTS Selection</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" role="button" href="#">Settings</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        camera view
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">8 camera</a>
                        <a class="dropdown-item" href="#">4 camera</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">1 camera</a>
                      </div>
                    </li>
    
                  </ul>
               </div>
            <div class="row">

                <div class="col-md-6">
                    <video width="600px" height="300px" controls>
                        <source src="" type="video/mp4">
                        <source src="" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-6">
                    <video width="600px" height="300px" controls>
                        <source src="" type="video/mp4">
                        <source src="" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="row">
            
                <div class="col-md-6">
                    <video width="600px" height="300px" controls>
                        <source src="" type="video/mp4">
                        <source src="" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-6">
                    <video width="600px" height="300px" controls>
                        <source src="" type="video/mp4">
                        <source src="" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                </div>
            </div>

           </div>
           <div class="col-md-2"  style="background-color: aliceblue">
                <h6 style="padding: 50px; margin-left:50px">Profile images</h6>
        </div>
       </div>
    </div>
@endsection

@section('scripts')

@endsection
