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

	Route::group(['prefix' => 'position'],function(){
		Route::get('/','Controller@getPosition');
		Route::post('/','Controller@createPosition');
	});


	Route::group(['prefix' => 'branches'],function(){
		Route::get('/','BranchController@getBranches');
		Route::post('/','BranchController@createBranch');
		Route::get('/{id}', 'BranchController@getBranchByID');
		Route::put('/{id}', 'BranchController@updateBranch');
		Route::get('/{data}', 'BranchController@searchBranch');
		Route::delete('/{id}', 'BranchController@deleteBranch');
	});

	Route::group(['prefix' => 'CDV'],function(){
		Route::get('/','CDVController@getAcctTitles');
		Route::post('/','CDVController@createCDV');
		Route::get('/banks','CDVController@getBanks'); 
		Route::get('/accounts','CDVController@getAccountNo'); 
	});
	
	Route::group(['prefix' => 'JV'],function(){
		Route::get('/','JVController@getAcctTitles');
	});	

	Route::group(['prefix' => 'users'],function(){
		Route::get('/','UserController@getUsers');
		Route::post('/','UserController@createUser');
		Route::get('/getUsers','UserController@getAllUsers');
	});	

	Route::group(['prefix' => 'banks'],function(){
		Route::post('/','BankController@createBank');
	});	
});

