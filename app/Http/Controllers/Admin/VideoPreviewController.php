<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Quiz;
use App\Models\Student;
use App\Models\User;


class VideoPreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'User';
	    return view('admin.video.index',compact('title'));
    }
}