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
		Route::get('/{id}','Controller@getPositionByID');
		Route::put('/{id}','Controller@updatePosition');
		Route::delete('/{id}','Controller@deletePosition');
	});


	Route::group(['prefix' => 'branches'],function(){
		Route::get('/','BranchController@getBranches');
		Route::post('/','BranchController@createBranch');
		Route::get('/{id}', 'BranchController@getBranchByID');
		Route::put('/{id}', 'BranchController@updateBranch');
		Route::get('/{data}', 'BranchController@searchBranch');
		Route::delete('/{id}', 'BranchController@deleteBranch');
	});

	Route::group(['prefix' => 'users'],function(){
		Route::get('/','UserController@getUsers');
		Route::post('/','UserController@createUser');
		Route::get('/getUsers','UserController@getAllUsers');
		Route::get('/{id}','UserController@getUserID');
	});	

	Route::group(['prefix' => 'bank'],function(){
		Route::post('/','BankController@createBank');
		Route::get('/','BankController@getBanks');
		Route::get('/{id}','BankController@getBankByID');
		Route::put('/{id}','BankController@updateBank');
		Route::delete('/{id}','BankController@deleteBank');
	});	

	Route::group(['prefix' => 'account'],function(){
		Route::get('/','AccountController@getFunds');
		Route::get('/getAcctTypes','AccountController@getAcctTypes');
		Route::get('/getNorms','AccountController@getNorms');
		Route::get('/getFS','AccountController@getFS');
		Route::get('/getAccountTitles','AccountController@createAccount');
		Route::post('/','AccountController@createAccount');
	});	

	Route::group(['prefix' => 'SubAccount'],function(){
		Route::get('/','SubAccountController@getAccountTitles');
		Route::get('/getNorms','SubAccountController@getNorms');
		Route::get('/getAcctTypes','SubAccountController@getAcctTypes');
		Route::get('/getFunds','SubAccountController@getFunds');
		Route::get('/getFinStatements','SubAccountController@getFinStatements');
		Route::post('/','SubAccountController@createSubAcct');
	});	

	Route::group(['prefix' => 'Assets'],function(){
		Route::get('/','AssetController@getCategories');
		Route::get('/getPeriods','AssetController@getPeriods');
		Route::post('/','AssetController@createAsset');
	});	

	Route::group(['prefix' => 'Balance'],function(){
		Route::get('/','BeginBalController@getAcctTitles');
		Route::post('/','BeginBalController@createBeginBal');
	});	

	Route::group(['prefix' => 'CDV'],function(){
		Route::get('/','CDVController@getAcctTitles');
		Route::post('/','CDVController@createCDV');
		Route::get('/banks','CDVController@getBanks'); 
		Route::get('/accounts','CDVController@getAccountNo'); 
	});

	Route::group(['prefix' => 'AppCDV'],function(){
		Route::get('/','AppCDVController@getCDVNo');
		Route::get('/getAcctEntries/{id}','AppCDVController@getAcctEntries');
		Route::put('/{id}','AppCDVController@appCDV');
		Route::put('/denyCDV/{id}','AppCDVController@denyCDV');
	});	

	Route::group(['prefix' => 'Search'],function(){
		Route::get('/','SearchCDVController@getCDVNo');
	});	
	
	Route::group(['prefix' => 'JV'],function(){
		Route::get('/','JVController@getAcctTitles');

	});	
});

