<?php

namespace App\Http\Controllers;

require_once '/home/derrick/Documents/digital/api.mobilevideosystems.net/vendor/autoload.php'; 

use Twilio\Rest\Client; 

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Setting;
use App\Models\Student;
use App\Models\User;
use Faker\Provider\bg_BG\PhoneNumber;
use LengthException;

class SMSController extends Controller
{
  

    public function send( ){


        $students = User::all();

        
        

        $phoneNumber = array();

        foreach ($students as $student){

            dd($student);
            
            array_push($phoneNumber, $student->phone);
        }

        foreach($phoneNumber as $phone ){
           echo($phone);

        $sid    = "AC0d6e82178b1a923986de2d0d37429778"; 
        $token  = "3b334f82dcb155e1929c650d94aae411"; 
        $twilio = new Client($sid, $token); 
        $messageBody = "Good Morning, Please remember to fill out prescreening questionnaire";
        $messagingServiceSid = "MG1f138f236f9d50596e11fb3587166cba";
        $message = $twilio->messages 
                        ->create($phone, // to 
                                array(  
                                    "messagingServiceSid" => $messagingServiceSid ,      
                                    "body" => $messageBody
                                ) 
                        ); 
        }
        
            
        

       
      
           
            
        

        // $hour = date('H:i');

        // $sid    = "AC0d6e82178b1a923986de2d0d37429778"; 
        // $token  = "3b334f82dcb155e1929c650d94aae411"; 
        // $twilio = new Client($sid, $token); 
        // // $phone = "+19513733351";
        // $messageBody = $hour;
        // $messagingServiceSid = "MG1f138f236f9d50596e11fb3587166cba";
        // $message = $twilio->messages 
        //                 ->create($phone, // to 
        //                         array(  
        //                             "messagingServiceSid" => $messagingServiceSid ,      
        //                             "body" => $messageBody
        //                         ) 
        //                 ); 
        
        // print($message->sid);


        return view("sms.sms");

    }
}
