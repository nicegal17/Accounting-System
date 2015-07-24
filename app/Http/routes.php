<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	// if nakalogin
    return redirect()->to('/main');
    // if wla
    // return view('login');
});

Route::any('/main/{path?}', function(){
	// if nakalogin
	return view("main");
	// else if wla
	// redirect()->to('/');
})->where("path", ".+");


Route::group(['prefix' => 'api/v1'],function(){
	// http://localhost:8000/api
	/*Route::group(['prefix' => 'v1'],function(){ //Include dapat ug version # pra ma trace kung unsay version imong API
		// http://localhost:8000/api/v1
		Route::get('users','Controller@getAllUsers'); // http://localhost:8000/api/v1/users GET
	});*/
	Route::get('employees','Controller@getEmployees'); // http://localhost:8000/api/v1/users GET
 	Route::get('employees/{id}','Controller@getPosID'); // http://localhost:8000/api/v1/users GET
 	Route::post('employees','Controller@createEmployee'); // http://localhost:8000/api/v1/users POST
	// Route::get('users/roles/{id}','Controller@getAllGroups'); // http://localhost:8000/api/v1/users GET
	
	
	// Route::put('users/{id}','Controller@getAllUsers'); // http://localhost:8000/api/v1/users PUT
	// Route::delete('users/{id}','Controller@getAllUsers'); // http://localhost:8000/api/v1/users DELETE

 	Route::post('position','Controller@createPosition'); 
	Route::get('position','Controller@getPosition'); 

	Route::post('branches', 'Controller@createBranch');
	Route::get('branches', 'Controller@getBranches');
	Route::get('branches/{id}', 'Controller@getBranchByID');
	Route::put('branches/{id}', 'Controller@updateBranch');
	Route::get('branches/{data}', 'Controller@searchBranch');
	Route::delete('branches/{id}', 'Controller@deleteBranch');

	Route::get('banks','Controller@getBanks'); 
	Route::get('accounts','Controller@getAccountNo'); 
	Route::get('CDV','Controller@getAcctTitles');


});

