<?php

namespace App\Http\Controllers\Admin;
require_once '/home/derrick/Documents/digital_api/public_html/vendor/autoload.php';
use Twilio\Rest\Client; 
use App\Models\User;
use App\Models\check;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $checks = check::all();


        
        
	    $title = 'Notifications';
	    return view('admin.notifications.index',compact('title'))->with('checks', $checks);
    }


    public function store(Request $request)
    {
        $check = check::find(1);
        $input = $request->all();
        $check->hing_temperature = $input['hing_temperature'] = $request->input('hing_temperature');
        $check->daily_reminder = $input['daily_reminder'] = $request->input('daily_reminder');
        $check->unauthorized_person = $input['unauthorized_person'] = $request->input('unauthorized_person');
        $check->temporary_person = $input['temporary_person'] = $request->input('temporary_person');
        $check->stranger_alert = $input['stranger_alert'] = $request->input('stranger_alert');
        $check->incorrect_bus = $input['incorrect_bus'] = $request->input('incorrect_bus');
        $check->on_bus = $input['on_bus'] = $request->input('on_bus');
        $check->enter_school = $input['enter_school'] = $request->input('enter_school');
        $check->leave_school = $input['leave_school'] = $request->input('leave_school');
        $check->absent_student = $input['absent_student'] = $request->input('absent_student');
        
        $check->save();

        return redirect()->back();

    
     }

    public function notification(){
        $checks = check::all();
        foreach($checks as $check){
            if($check->daily_reminder== "on"){
                $parents = User::all();
                $phoneNumber = array();
                $validNumber = array();
        
                foreach ($parents as $parent){
                    if($parent->is_parent = 1 ){
                        array_push($phoneNumber, $parent->phone);
                    
                    }
                }
        
                foreach ($phoneNumber as $phone) {
                    if($phone !=  null ){

                        array_push($validNumber, $phone);

                    }
                }

                foreach ($validNumber as $number){
                    $sid    = "AC0d6e82178b1a923986de2d0d37429778"; 
                    $token  = "aee8662e07372c1ef763d93b539cbdf2"; 
                    $messagingServiceSid = "MG1f138f236f9d50596e11fb3587166cba";
                    $messageBody = "Good Morning, Please remember to fill out prescreening questionnaire";
        
                    $twilio = new Client($sid, $token); 
                    
                    $message = $twilio->messages 
                                    ->create("+19518058668", // to 
                                            array(  
                                                "messagingServiceSid" => $messagingServiceSid ,      
                                                "body" => $messageBody 
                                            ) 
                                    ); 
                    
                    print($message->sid);
                }
                echo($number);
        }else{
            echo("not cheked");
        }
        }
        



}
