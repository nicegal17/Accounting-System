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

 	Route::group(['prefix' => 'employees'],function(){
		Route::get('/','Controller@getEmployees');
 		Route::post('/','Controller@createEmployee');
 		Route::get('/{id}','Controller@getPosID');
	});

	// Route::get('users/roles/{id}','Controller@getAllGroups'); // http://localhost:8000/api/v1/users GET
	// Route::put('users/{id}','Controller@getAllUsers'); // http://localhost:8000/api/v1/users PUT
	// Route::delete('users/{id}','Controller@getAllUsers'); // http://localhost:8000/api/v1/users DELETE


	Route::group(['prefix' => 'position'],function(){
		Route::get('/','Controller@getPosition');
		Route::post('/','Controller@createPosition');
	});


	Route::group(['prefix' => 'branches'],function(){
		Route::get('/','Controller@getBranches');
		Route::post('/','Controller@createBranch');
		Route::get('/{id}', 'Controller@getBranchByID');
		Route::put('/{id}', 'Controller@updateBranch');
		Route::get('/{data}', 'Controller@searchBranch');
		Route::delete('/{id}', 'Controller@deleteBranch');
	});


	Route::get('banks','Controller@getBanks'); 
	Route::get('accounts','Controller@getAccountNo'); 
	Route::get('CDV','Controller@getAcctTitles');


});

