@extends('admin.layouts.master')
@section('title',$title)
@section('content')
	<!--begin::Card-->
<<<<<<< HEAD

  <form action="{{route('notification')}}" method="POST">
    @csrf

    @foreach ($checks as $check)
=======
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
    <div class="card card-custom ">
        <div class="card-header">
          <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-users text-primary"></i>
                </span>
                <h3 class="card-label">Notifications</h3>
          </div>
        </div>
<<<<<<< HEAD
          <div class="card-body">
            <div class="card-toolbar">
              <div style="float: left">
                <h4>
                  High Temperature Alert
                </h4> 
              </div>
              <div style="float: right">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" name="hing_temperature" type="checkbox" id="flexSwitchCheckDefault"  {{ $check->hing_temperature == "on" ? 'checked' : ''}}  >
                  
                 
                </div>
              </div>
            </div>
          </div>
          <button  type="submit" class="btn btn-xs btn-info pull-right">submit</button>
          <div class="card-body">
            <div class="card-toolbar">
              <div style="float: left">
                <h4>
                  Daily Questionnaire Reminder
                </h4>
              </div>
              <div style="float: right">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" name="daily_reminder" id="flexSwitchCheckDefault" {{ $check->daily_reminder == "on" ? 'checked' : ''}}>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-toolbar">
              <div style="float: left">
                <h4>
                  Unauthorized Person Alert
                </h4>
              </div>
              <div style="float: right">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" name="unauthorized_person" id="flexSwitchCheckDefault" {{ $check->unauthorized_person == "on" ? 'checked' : ''}}>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-toolbar">
              <div style="float: left">
                <h4>
                  Temporary Personnel Alert
                </h4>
              </div>
              <div style="float: right">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" name="temporary_person" id="flexSwitchCheckDefault" {{ $check->temporary_person== "on" ? 'checked' : ''}}>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-toolbar">
              <div style="float: left">
                <h4>
                  Stranger Alert
                </h4>
              </div>
              <div style="float: right">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" name="stranger_alert" id="flexSwitchCheckDefault" {{ $check->stranger_alert== "on" ? 'checked' : ''}}>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-toolbar">
              <div style="float: left">
                <h4>
                  Alert for boarding incorrect bus
                </h4>
              </div>
              <div style="float: right">
                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" name="incorrect_bus" id="flexSwitchCheckDefault" {{ $check->incorrect_bus== "on" ? 'checked' : ''}}>
                </div>
              </div>
            </div>
          </div>        
=======
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                High Temperature Alert
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Daily Questionnaire Reminder
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Unauthorized Person Alert
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Temporary Personnel Alert
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Stranger Alert
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Alert for boarding incorrect bus
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Alert when student boards bus
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
<<<<<<< HEAD
                <input class="form-check-input" type="checkbox" name="on_bus" id="flexSwitchCheckDefault" {{ $check->on_bus== "on" ? 'checked' : ''}}>
=======
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Alert when student enters school
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
<<<<<<< HEAD
                <input class="form-check-input" type="checkbox" name="enter_school" id="flexSwitchCheckDefault" {{ $check->enter_school== "on" ? 'checked' : ''}}>
=======
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Alert when student leaves school
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
<<<<<<< HEAD
                <input class="form-check-input" type="checkbox" name="leave_school" id="flexSwitchCheckDefault" {{ $check->leave_school== "on" ? 'checked' : ''}}>
=======
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Alert for absent student
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
<<<<<<< HEAD
                <input class="form-check-input" type="checkbox" name="absent_student" id="flexSwitchCheckDefault" {{ $check->absent_student== "on" ? 'checked' : ''}}>
=======
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
              </div>
            </div>
          </div>
        </div>
    </div>
<<<<<<< HEAD
    @endforeach
  </form>

=======
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
@endsection
@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')
<<<<<<< HEAD
  <script>
    if($check->daily_reminder = null)
      console.log("ao")
  </script>
=======

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
@endsection