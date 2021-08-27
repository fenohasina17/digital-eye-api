<?php

use App\Http\Controllers\SMSController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    return view('auth.login');
});
Route::get('privacy-policy', 'HomeController@privacy')->name('privacy');
Route::get('email-verified', 'HomeController@emailverified')->name('email-verified');
Route::get('/upload-data', 'Client\ClientController@uploadData')->name('upload-data');
Route::get('/upload-assigned', 'Client\ClientController@uploadDataForAssignedSchoolMDT')->name('upload-to-assigned-mdt');
Route::get('/black-list', 'Client\ClientController@blackList')->name('black-list');
Route::get('/clear',
	function(){

		Artisan::call('config:clear');
		Artisan::call('cache:clear');
		Artisan::call('config:cache');
	}
);

Auth::routes();

Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'client',
    'namespace'     => 'Client'
], function ()
{
    Route::get('/dashboard', 'ClientController@index')->name('client.dashboard');
	Route::get('/profile', 'ClientController@edit')->name('client-profile');
	Route::post('/admin-update', 'ClientController@update')->name('client-update');


});

Route::group([
    'middleware'    => ['auth','is_admin'],
    'prefix'        => 'admin',
    'namespace'     => 'Admin'
], function ()
{
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@edit')->name('admin-profile');
    Route::post('/admin-update', 'AdminController@update')->name('admin-update');
    //Setting Routes
    Route::resource('setting','SettingController');

	//User Routes
	Route::resource('clients','ClientController');
	Route::post('get-clients', 'ClientController@getClients')->name('admin.getClients');
	Route::post('get-client', 'ClientController@clientDetail')->name('admin.getClient');
	Route::get('client/delete/{id}', 'ClientController@destroy');
	Route::get('client-students/{id}', 'ClientController@students')->name("client-students");
	Route::get('student-quizzes/{id}', 'ClientController@quizzes')->name("student-quizzes");
	Route::get('quiz-answers/{id}', 'ClientController@answers')->name("quiz-answers");
	Route::post('delete-selected-clients', 'ClientController@deleteSelectedClients')->name('admin.delete-selected-clients');

	//User Routes
	Route::resource('questions','QuestionController');
	Route::post('get-questions', 'QuestionController@getClients')->name('admin.getQuestions');
	Route::post('get-question', 'QuestionController@clientDetail')->name('admin.getQuestion');
	Route::get('question/delete/{id}', 'QuestionController@destroy');
	Route::post('delete-selected-questions', 'QuestionController@deleteSelectedClients')->name('admin.delete-selected-questions');

	//schools Routes
	Route::resource('schools','SchoolController');
	Route::post('get-schools', 'SchoolController@getClients')->name('admin.getSchools');
	Route::post('get-school', 'SchoolController@clientDetail')->name('admin.getSchool');
	Route::get('school/delete/{id}', 'SchoolController@destroy');
	Route::post('delete-selected-schools', 'SchoolController@deleteSelectedClients')->name('admin.delete-selected-schools');

	//Buses Routes
	Route::resource('buses','BussController');
	Route::post('get-buses', 'BussController@getClients')->name('admin.getBuses');
	Route::post('get-buss', 'BussController@clientDetail')->name('admin.getBuss');
	Route::get('buss/delete/{id}', 'BussController@destroy');
	Route::post('delete-selected-buses', 'BussController@deleteSelectedClients')->name('admin.delete-selected-buses');

	//Mdt Routes
	Route::resource('mdts','MdtController');
	Route::post('get-mdts', 'MdtController@getClients')->name('admin.getMdts');
	Route::post('get-mdt', 'MdtController@clientDetail')->name('admin.getMdt');
	Route::get('mdt/delete/{id}', 'MdtController@destroy');
	Route::post('delete-selected-mdts', 'MdtController@deleteSelectedClients')->name('admin.delete-selected-mdts');

	//Message Route


});

	Route::any('send-sms', 'SMSController@dataMDT');
