<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{

    public function attendaceMDT(){



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    // $title = 'Attendance';
        // $mdtURL = "http://cmsv6.mobilevideosystems.net/api/v1/face/queryAttendRecord";

        // $response = Http::post($mdtURL,[
        //     'startId' => 1,
        //     'reqCount' => 200,
        //     'needImg' => false
        // ]);
        // $data = array();
        // $data = $response->body();

        // $json = json_decode($data);

        // $attadences = $json->data;

        // foreach($attadences as $attadence){
        //     dd($attadence->personId);
        // }

            // ->with('attendances', $attadences)

	    return view('admin.attendance.index',compact('title'));
    }
}
