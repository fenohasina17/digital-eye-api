<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'Library';
	    return view('parent.library.index',compact('title'));
    }
    //
}
