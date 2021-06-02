@extends('admin.layouts.master')
@section('title',$title)
@section('content')
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader" kt-hidden-height="54" style="">
      <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
          <!--begin::Page Heading-->
          <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
            <!--end::Page Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Answers List</a>
              </li>
              <li class="breadcrumb-item text-muted">
                Quiz
              </li>

            </ul>
            <!--end::Breadcrumb-->
          </div>
          <!--end::Page Heading-->
        </div>
        <!--end::Info-->
      </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Card-->
          <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0">
                  <h3 class="card-title font-weight-bolder text-dark">Quiz [{{$user->created_at}}]</h3>
                  @php
                      $items = array("bg-success","bg-primary","bg-warning","bg-info","bg-danger");
                  @endphp
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body pt-2">
                  <!--begin::Item-->
                  @foreach($user->answers as $answer)
                  <div class="d-flex align-items-center mt-10">
                      <!--begin::Bullet-->
                      <span class="bullet bullet-bar {{$items[array_rand($items)]}} align-self-stretch mr-5"></span>
                      <!--end::Bullet-->
                      <!--begin::Checkbox-->

                      <!--end::Checkbox-->
                      <!--begin::Text-->
                      <div class="d-flex flex-column flex-grow-1">
                          <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{$answer->question->name}}</a>
                          <span class="text-muted font-weight-bold">{{$answer->answer}}</span>
                      </div>
                      <!--end::Text-->
                      <!--begin::Dropdown-->

                      <!--end::Dropdown-->
                  </div>
                  @endforeach
                  <!--end:Item-->
                  <!--begin::Item-->

                  <!--end::Item-->
              </div>
              <!--end::Body-->
          </div>
        <!--end::Card-->

      </div>
      <!--end::Container-->
    </div>
    <!--end::Entry-->
  </div>
@endsection
