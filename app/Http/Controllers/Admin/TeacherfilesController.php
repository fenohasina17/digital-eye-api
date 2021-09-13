<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherfilesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'Behavior';
<<<<<<< HEAD
	    return view('admin.teacherfiles.index',compact('title'));
=======
	    return view('admin.behavior.index',compact('title'));
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
    }
    //

}
