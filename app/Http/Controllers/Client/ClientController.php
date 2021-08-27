<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Mdt;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'NewsWatch Client Dashboard';
        return view('client.dashboard.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createUserMDT($mdt, $student)
    {
        //test connection
        //https://206.78.36.94:11443/doc/page/login.asp
        /*
        $url = 'https://206.78.36.94:11443/doc/page/login.asp';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err)
        {
            Log::error("cURL test Error #: $err");// \n\n Data: \n$data
        }

        if($httpcode>=200 && $httpcode<300)
        {
            echo 'worked<br>';
        }
        else
        {
            echo "<br>curl didn't work on https://206.78.36.94:11443<br>";
        }

        $host = "206.78.36.94";
        $result = system("ping -c 1 $host" );
        //echo "<br>Your ping is $result ms";
        //test connection end*/

        Log::notice("Adding student: " . $student->full_name . " to MDT at: " . $mdt);
        $path = public_path("uploads/$student->image");
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $mdtURL = "https://$mdt->ip_address:$mdt->https_port/api/v1/face/addPerson";

        //echo "URL: ".$mdtURL."<br><br>";

        //dd($base64);
        if ($student->gender == 1)
        {
            $gender = "male";
        }
        else
        {
            $gender = "female";
        }

        $data = "
        {
            \"groupId\": \"DA640D7CE7544B33A3A1C81CD95D3E66\",

            \"userId\": \"$student->id\",

            \"name\": \"$student->full_name\",

            \"age\": 30,

            \"gender\": \"$gender\",

            \"phone\": \"$student->phone\",

            \"email\": \"$student->email\",

            \"certificateType\": 111,

            \"certificateNumber\": \"$student->student_id\",

            \"updateTime\": \"20200331123025\",

            \"images\":
            [

                {
                    \"data\": \"$base64\"
                }
            ],

            \"accessInfo\":
            {
                \"cardNum\": \"\",
                \"password\": \"\",
                \"authType\": 0,
                \"roleType\": 0
            }
        }";

        $curl = curl_init();
        //Log::notice("Data: \n $data");

        $headers = array
        (
        //"Authorization: Bearer ".$settings['quip_token'],
            'Content-type: multipart/form-data'
        );

        //items added to try to fix connection refused error
        //curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0");
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36 Edg/91.0.864.41");
        //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_REFERER, 'mdtURL');
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);

        curl_setopt($curl, CURLOPT_VERBOSE, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_URL, $mdtURL);
        curl_setopt($curl, CURLOPT_PORT, $mdt->https_port);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//less secure, but needed for self-signed certificate
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//less secure, but needed for self-signed certificate
        curl_setopt($curl, CURLOPT_SSL_VERIFYSTATUS , false);//less secure, but needed for self-signed certificate
        $response= curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err)
        {
            Log::error("cURL Error #: $err \n\n");// \n\n Data: \n$data
        }
        else
        {
            Log::notice("Completed successfully for MDT $mdt \n\n");
        }
        $response = json_decode($response);
        if($response)
        {
            //Log::notice("Response: $response->data");
            if ($response->status == 0)
            {
                $student->upload = 1;
                $student->return_id = $response->data->personId;
                $student->save();
            }
            else
            {
                //echo "Response returned error: ";
                print_r($response);
            }
        }
    }

	//cron job: wget -q -O - http://api.mobilevideosystems.net/upload-assigned >/dev/null 2>&1
	public function uploadDataForAssignedSchoolMDT()//registers user to mdt specific to their school
    {
        Log::notice("Adding all students to their assigned MDT!");
        $mdts  = Mdt::all();

        foreach($mdts as $mdt)
        {
            Log::notice("Searching for students to add to MDT: ' $mdt->name ' @ $mdt->ip_address:$mdt->https_port   for school: $mdt->school" );

            $mdtSchool = $mdt->school;
            //$mdtURL = "https://$mdt->ip_address/api/v1/face/addPerson";
            $students = Student::where("school_name",$mdtSchool)->get();

            if(count($students) > 0)
            {
                Log::notice("Students found to add to the mdt." );
            }
            else
            {
                Log::notice("No students found to add to the mdt. \n\n" );
            }

            foreach ($students as $student)
            {
                try
                {
                    self::createUserMDT($mdt, $student);
                }
                catch (Exception $e)
                {
                    Log::error("Error encountered while creating user:" . $e);
                }
            }
        }
    }


	public function uploadData()//registers user to mdt. Superseeded by uploadDataFOrAssignedSchoolMDT
    {
        $students = Student::where("upload",0)->get();
        foreach ($students as $student)
		{
            $path = public_path("uploads/$student->image");
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			//dd($base64);
            if ($student->gender == 1)
			{
                $gender = "male";
            }
			else
			{
                $gender = "female";
            }

            $data = "
			{
				\"groupId\": \"DA640D7CE7544B33A3A1C81CD95D3E66\",

				\"userId\": \"$student->id\",

				\"name\": \"$student->full_name\",

				\"age\": 30,

				\"gender\": \"$gender\",

				\"phone\": \"$student->phone\",

				\"email\": \"$student->email\",

				\"certificateType\": 111,

				\"certificateNumber\": \"$student->student_id\",

				\"updateTime\": \"20200331123025\",

				\"images\":
				[

					{
						\"data\": \"$base64\"
					}
				],

				\"accessInfo\":
				{
					\"cardNum\": \"\",
					\"password\": \"\",
					\"authType\": 0,
					\"roleType\": 0
				}
			}";

            $curl = curl_init();


            $headers = array
			(
			//"Authorization: Bearer ".$settings['quip_token'],
                'Content-type: multipart/form-data'
            );

            $url = "http://47.180.21.40:80/api/v1/face/addPerson";

            curl_setopt($curl, CURLOPT_VERBOSE, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_URL, $mdtURL);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $response= curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err)
			{
                Log::error("cURL Error #:" . $err);
            }

            $response = json_decode($response);
            if($response)
			{

                if ($response->status == 0)
				{
                    $student->upload = 1;
                    $student->return_id = $response->data->personId;
                    $student->save();
                }
            }
        }
    }


    public function blackList()
    {
        Log::notice("Adding all students to blacklist.");
        $students = Student::where("upload",1)->get();
        $ids = array();

        foreach ($students as $student) {
            array_push($ids,"$student->id");
        }
        $data = json_encode($ids);
        $data = "
		{
		\"data\": $data
		}";

		Log::notice("Data:\n $data");
        $mdts  = Mdt::all();
        foreach ($mdts as $mdt)
		{
            Log::notice("Adding students to blacklist on '$mdt->name' @ $mdt->ip_address:$mdt->https_port.");
            $curl = curl_init();


            $headers = array(
			//"Authorization: Bearer ".$settings['quip_token'],
                'Content-type: multipart/form-data'
            );

            $success = TRUE;

            $url = "https://$mdt->ip_address:$mdt->https_port/api/v1/face/setBlacklist";
            try
            {
                curl_setopt($curl, CURLOPT_VERBOSE, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//less secure, but needed for self-signed certificate
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//less secure, but needed for self-signed certificate
                curl_setopt($curl, CURLOPT_SSL_VERIFYSTATUS , false);//less secure, but needed for self-signed certificate
                $response= curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err)
                {
                    Log::error("cURL Error #:" . $err);
                }
                $response = json_decode($response);

                if($response)
                {
                    if ($response->status != 0)
                    {
                        $success = FALSE;
                    }
                }

            }
            catch (Exception $e)
            {
                Log::error("Error encountered while adding user to blacklist." . $e);
            }
        }

        if($success == TRUE)
        {
            Log::notice("Ran successfully.");
            foreach ($students as $std)
            {
                $student = Student::find($std->id);
                $student->black_list = 1;
                $student->save();
            }
        }
    }

    public function addBlackList($student)//used to add an individual to the blasklist (if they answered survey wrong or other reason)
    {
        Log::notice("Adding $student to blacklist.");

        $data = "
		{
		\"data\": [\"$student->id\"]
		}";
		Log::notice("Data:\n $data");
        $mdts  = Mdt::all();
        foreach ($mdts as $mdt)
		{
            Log::notice("Adding student to blacklist on '$mdt->name' @ $mdt->ip_address:$mdt->https_port.");
            $curl = curl_init();

            $headers = array(
			//"Authorization: Bearer ".$settings['quip_token'],
                'Content-type: multipart/form-data'
            );

            $success = TRUE;

            $url = "https://$mdt->ip_address:$mdt->https_port/api/v1/face/addBlacklist";
            try
            {
                curl_setopt($curl, CURLOPT_VERBOSE, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//less secure, but needed for self-signed certificate
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//less secure, but needed for self-signed certificate
                curl_setopt($curl, CURLOPT_SSL_VERIFYSTATUS , false);//less secure, but needed for self-signed certificate
                $response= curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err)
                {
                    Log::error("cURL Error #:" . $err);
                }
                $response = json_decode($response);

                if($response)
                {
                    if ($response->status != 0)
                    {
                        $success = FALSE;
                    }
                }

            }
            catch (Exception $e)
            {
                Log::error("Error encountered while adding user to blacklist." . $e);
            }
        }

        if($success == TRUE)
        {
            Log::notice("Ran successfully.");
            $student->black_list = 1;
            $student->save();
            /*
            foreach ($students as $std)
            {
                $student = Student::find($std->id);

            }*/
        }
    }

    public function removeFromBlackList($student)//used to remove an individual from the blasklist
    {
        Log::notice("Removing $student from blacklists.");

        $data = "
		{
		\"data\": [\"$student->id\"]
		}";

		Log::notice("Data:\n $data");

        $mdts  = Mdt::all();
        foreach ($mdts as $mdt)
		{
            Log::notice("Removing student '$student->name' from blacklist on '$mdt->name' @ $mdt->ip_address:$mdt->https_port.");
            $curl = curl_init();

            $headers = array(
			//"Authorization: Bearer ".$settings['quip_token'],
                'Content-type: multipart/form-data'
            );

            $success = TRUE;

            $url = "https://$mdt->ip_address:$mdt->https_port/api/v1/face/deleteBlacklist";
            try
            {
                curl_setopt($curl, CURLOPT_VERBOSE, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//less secure, but needed for self-signed certificate
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);//less secure, but needed for self-signed certificate
                curl_setopt($curl, CURLOPT_SSL_VERIFYSTATUS , false);//less secure, but needed for self-signed certificate
                $response= curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err)
                {
                    Log::error("cURL Error #:" . $err);
                }
                $response = json_decode($response);

                if($response)
                {
                    if ($response->status != 0)
                    {
                        $success = FALSE;
                    }
                }

            }
            catch (Exception $e)
            {
                Log::error("Error encountered while removing user from blacklist." . $e);
            }
        }

        if($success == TRUE)
        {
            Log::notice("Ran successfully.");
            $student->black_list = 0;
                $student->save();
            /*
            foreach ($students as $std)
            {
                $student = Student::find($std->id);

            }*/
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('client.settings.edit', ['title' => 'Edit Profile','user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$admin->id,
        ]);
        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = $admin->password;
        } else {
            $input['password'] = bcrypt($input['password']);
        }
        $admin->fill($input)->save();
        Session::flash('success_message', 'Great! Client successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
