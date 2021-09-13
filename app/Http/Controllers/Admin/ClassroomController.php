<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
	    $title = 'Classroom';
	    return view('admin.classroom.index',compact('title'));
=======
	    $title = 'Behavior';
	    return view('admin.behavior.index',compact('title'));
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
    }
    //

}
