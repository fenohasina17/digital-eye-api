<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function privacy()
    {
        return view('auth.privacy', ['title' => 'Unit Detail',]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        return view('admin-home');
    }
    public function emailverified(Request $request)
    {
        $user = User::where("email",$request->email)->first();
        if ($user){
            $mytime = Carbon::now();
            $user->email_verified_at = $mytime;
            $user->save();
            dd("email Verified ");
        }else{
            dd("Sorry! No Email Found");
        }
    }
}
