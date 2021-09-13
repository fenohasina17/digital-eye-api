<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountingController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
	    $title = 'Video preview';
=======
	    $title = 'Behavior';
>>>>>>> b97f45bfb816473ce02dc35b9aadd039b70fe1d2
	    return view('admin.accounting.index',compact('title'));
    }
    //

}
