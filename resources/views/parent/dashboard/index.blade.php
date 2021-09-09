@extends('parent.layouts.master')
@section('title',$title)
@section('content')
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
            @php
                $parents = \App\Models\User::where("is_admin",0)->get()->count();
                $students = \App\Models\Student::all()->count();
                $quizzes = \App\Models\Quiz::all()->count();
            @endphp
            <div class="container">
                <p style="text-align:center; margin-bottom:20px">
                    <img src="{{ asset('assets/media/picture/logo.png') }}" alt="Goldens Plains">
                </p>
            </div>
            <div>
                <h1> I am Parent Role</h1>
            </div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
@endsection
