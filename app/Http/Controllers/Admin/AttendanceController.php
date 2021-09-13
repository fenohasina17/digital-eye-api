<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD

class AttendanceController extends Controller
{
=======
use Illuminate\Support\Facades\Http;
use App\Models\Mdt;

class AttendanceController extends Controller
{

>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'Attendance';
<<<<<<< HEAD
	    return view('admin.attendance.index',compact('title'));
=======
        $mdtURL = "http://cmsv6.mobilevideosystems.net/api/v1/face/queryAttendRecord";
        $mdtCountURL = "http://cmsv6.mobilevideosystems.net/api/v1/face/getAttendRecordCount";

        $response = Http::post($mdtURL,[
            'startId' => 0,
            'reqCount' => 908,
            'needImg' => false
        ]);
        $data = array();
        $data = $response->body();

        $json = json_decode($data);

        $attedences = $json->data;

	    return view('admin.attendance.index',compact('title'))->with('attendances', $attedences);
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
    }
}
