<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'Shedules';
	    return view('admin.shedules.index',compact('title'));
    }
    //
}
