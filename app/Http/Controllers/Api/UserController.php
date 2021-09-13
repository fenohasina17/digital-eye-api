<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Country;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Setting;
use App\Models\Student;
use App\Models\User;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return $this->showOne($user, 200);
    }
    public function getStudents()
    {
        $user = auth()->user();
        $students = Student::where("parent_id",$user->id)->get();
        foreach ($students as $student){
           $survey = Quiz::where("student_id",$student->id)->whereDate('created_at', Carbon::today())->first();
           if ($survey){
               $student->survey = 1;
           }else{
               $student->survey = 0;
            }
        }
        if ($students->isNotEmpty()){
            return $this->showAll($students,200);
        }else{
            return $this->errorResponse('No Records Found', 200);
        }
    }
    public function getQuestions()
    {
        $user = auth()->user();
        $questions = Question::all();
        if ($questions->isNotEmpty()){
            return $this->showAll($questions,200);
        }else{
            return $this->errorResponse('No Records Found', 200);
        }
    }
    public function studentDelete(Request $request)
    {
        $user = auth()->user();
        $students = Student::find($request->id);
        if ($students){
            $students->delete();
            return $this->successMessage('Record Deleted Succuessfully',200);
        }else{
            return $this->errorResponse('No Records Found', 200);
        }
    }
    public function restPassword(Request $request)
    {
        $user = auth()->user();
        $found = User::where("email",$request->email)->first();
        if ($found){
            //create a new token to be sent to the user.
            $token = Str::random(60);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => bcrypt($token), //change 60 to any length you want
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();

            $email = $request->email; // or $email = $tokenData->email;
            $settings = Setting::pluck('value', 'name')->all();
            $link  = url('password/reset/' . $token.'?email='.$email);
            $data = array(
                'name' => $found->name,
                'user_email' => $found->email,
                'subject' => "Reset Password",
                'msg' => "Click the Below Link to Change Password. <br> <a href='$link'>Click Here</a> ",
                'email' => isset($settings['email']) ? $settings['email'] : 'chuckm@mobilevideosystems.net',
                'logo' => isset($settings['admin_logo']) ? $settings['admin_logo'] : '',
                'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'Digital Eye',
            );
            Mail::send('emails.reset-password', $data, function ($message) use ($data) {
                $message->to($data['user_email'], '')
                    ->from($data['email'], $data['site_title'])
                    ->subject('Reset Password');
            });
            return $this->successMessage('We have emailed your password reset link!',200);
        }else{
            return $this->errorResponse('No Email Found', 200);
        }
    }
    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $validatedData = Validator::make(
            $request->all(),
            array(
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return $this->showOne($user, 200);
        }else{
            return $this->errorResponse("Old Password does not match", 200);
        }

    }
    public function addQuiz(Request $request)
    {
        $user = auth()->user();
        $data = $request->input("data");
        $data = json_decode($data);
        $quiz = new Quiz();
        $quiz->student_id = $data->student_id;
        $quiz->save();
        foreach ($data->questions as $r){
            $ans = new Answer();
            $ans->question_id = $r->q_id;
            $ans->quiz_id = $quiz->id;
            $ans->answer = $r->and;
            $ans->save();
        }
        if ($ans){
            return $this->successMessage('Quiz Added Succuessfully',200);
        }else{
            return $this->errorResponse('No Records Inserted', 200);
        }
    }
    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $validatedData = Validator::make(
            $request->all(),
            array(
            'name' => 'required|max:55',
            'phone' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'is_employee' => 'required',
            'is_parent' => 'required',
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $validatedData = $request->all();
        $user->is_parent = $request->is_parent;
        $user->is_employee = $request->is_employee;
        $user->gender = $request->gender;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->is_admin = 0;
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = public_path('/uploads');
                //$extension = $file->getClientOriginalExtension('logo');
                $image = $file->getClientOriginalName('image');
                $image = rand().$image;
                $request->file('image')->move($destinationPath, $image);
                $user->image = $image;

            }
        }
        $user->save();

        return $this->showOne($user, 200);
    }
    public function studentAdd(Request $request)
    {
        $user = auth()->user();
        $validatedData = Validator::make(
            $request->all(),
            array(
            'full_name' => 'required|max:55',
            'email' => 'email|required|unique:students',
            'phone' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'zip' => 'required',
            //'address' => 'required',
            'emergency_phone' => 'required',
            'emergency_contact' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'student_id' => 'required',
            'school_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $save = new  Student();
        $save->full_name = $request->full_name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        // $save->state = $request->state;
        // $save->city = $request->city;
        // $save->zip = $request->zip;
        // $save->address = $request->address; 
        $save->emergency_phone = $request->emergency_phone;
        $save->emergency_contact = $request->emergency_contact;
        $save->first_name = $request->first_name;
        $save->last_name = $request->last_name;
        $save->student_id = $request->student_id;
        $save->gender = $request->gender;
        $save->school_name = $request->school_name;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = public_path('/uploads');
                //$extension = $file->getClientOriginalExtension('logo');
                $image = $file->getClientOriginalName('image');
                $image = rand().$image;
                $request->file('image')->move($destinationPath, $image);
                $save->image = $image;

            }
        }
        $save->parent_id = $user->id;
        $save->save();
        $survey = Quiz::where("student_id",$save->id)->whereDate('created_at', Carbon::today())->first();
        if ($survey){
            $save->survey = 1;
        }else{
            $save->survey = 0;
        }
        return $this->showOne($save);
    }
    public function studentEdit(Request $request)
    {
        $user = auth()->user();
        $validatedData = Validator::make(
            $request->all(),
            array(
            'full_name' => 'required|max:55',
            'email' => 'required|unique:students,email,'.$request->id,
            'phone' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'zip' => 'required',

           // 'address' => 'required',
            'emergency_phone' => 'required',
            'emergency_contact' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'student_id' => 'required',
            'school_name' => 'required',
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $save = Student::find($request->id);
        $save->full_name = $request->full_name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        // $save->state = $request->state;
        // $save->city = $request->city;
        // $save->zip = $request->zip;
        // $save->address = $request->address; 
        $save->emergency_phone = $request->emergency_phone;
        $save->emergency_contact = $request->emergency_contact;
        $save->first_name = $request->first_name;
        $save->last_name = $request->last_name;
        $save->student_id = $request->student_id;
        $save->gender = $request->gender;
        $save->school_name = $request->school_name;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = public_path('/uploads');
                //$extension = $file->getClientOriginalExtension('logo');
                $image = $file->getClientOriginalName('image');
                $image = rand().$image;
                $request->file('image')->move($destinationPath, $image);
                $save->image = $image;

            }
        }
        $save->parent_id = $user->id;
        $save->save();
        $survey = Quiz::where("student_id",$save->id)->whereDate('created_at', Carbon::today())->first();

        dd($save->id);
        
        if ($survey){
            $save->survey = 1;
        }else{
            $save->survey = 0;
        }
        return $this->showOne($save);
    }
    public function getCountries()
    {
        $countries = Country::orderBy('name', 'ASC')->get();
        return $this->showAll($countries);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
