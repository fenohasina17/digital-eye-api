<?php

namespace App\Console\Commands;

// require_once '/home/derrick/Documents/digital/api.mobilevideosystems.net/vendor/autoload.php';

use Twilio\Rest\Client;

use App\Models\Student;
use App\Models\User;
use Illuminate\Console\Command;

class sendMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendMessages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

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

        $sid= "ACf846ed59b7a160f19309b5601e1e758b";
        $token= "dac936a030daeabc3882e9fa0677f3fc";

        //$sid    = "AC0d6e82178b1a923986de2d0d37429778";
        //$token  = "3b334f82dcb155e1929c650d94aae411";
        $twilio = new Client($sid, $token);
        // $phone = $phoneNumber[$numero];
        $messageBody = "Good Morning, Please remember to fill out prescreening questionnaire";
        $messagingServiceSid= "MG9569c6cc5e4e276fa1f0bcba0bb51574";
        //$messagingServiceSid = "MG1f138f236f9d50596e11fb3587166cba";
        $message = $twilio->messages
                        ->create($number, // to
                                array(
                                    "messagingServiceSid" => $messagingServiceSid ,
                                    "body" => $messageBody
                                )
                        );
       }


        echo($number);
    }
}
