@extends('parent.layouts.master')
@section('title',$title)
@section('content')
	<!--begin::Card-->
    <div class="card card-custom ">
        <div class="card-header">
          <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-users text-primary"></i>
                </span>
                <h3 class="card-label">Notifications</h3>
          </div>
        </div>
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
        <div class="card-body">
          <div class="card-toolbar">
            <div style="float: left">
              <h4>
                Alert when student boards bus
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
                Alert when student enters school
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
                Alert when student leaves school
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
                Alert for absent student
              </h4>
            </div>
            <div style="float: right">
              <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('scripts')

@endsection