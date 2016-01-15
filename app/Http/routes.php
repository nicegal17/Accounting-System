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

/*Route::get('/','loginController@getViewLogin');

	
Route::any('/main/{path?}','mainController@getviewMain')->where("path", ".+");

Route::group(['prefix' => 'auth'], function(){
	Route::get('/logout', 'loginController@logoutAuth');
	Route::post('/login', 'loginController@loginAuth');
	Route::get('/login', function(){
		return redirect()->to('/');
	});
});*/

Route::group(['prefix' => 'api/v1'],function(){

	Route::group(['prefix' => 'auth'], function(){
		Route::get('/logout', 'loginController@logoutAuth');
		Route::post('/login', 'loginController@loginAuth');
		Route::get('/user', 'loginController@getCurrentUser');
	});

 	Route::group(['prefix' => 'employees'],function(){
		Route::get('/','Controller@getEmployees');
 		Route::post('/','Controller@createEmployee');
 		Route::get('/{id}','Controller@getPosID');
 		Route::get('/{id}', 'Controller@getEmployeeID');
 		Route::put('/{id}', 'Controller@updateEmployee');
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
	 	Route::get('/{id}', 'BranchController@getBranchByID');
	 	Route::post('/', 'BranchController@createBranch');
	 	Route::PUT('/{id}', 'BranchController@updateBranch');
	 	Route::delete('{id}', 'BranchController@deleteBranch');
	});

	Route::group(['prefix' => 'users'],function(){
		Route::get('/','UserController@getAllUsers');
		Route::post('/','UserController@createUser');
		Route::get('/{id}','UserController@getUserID');
		Route::put('/{id}','UserController@updateUser');
		Route::delete('/{id}','UserController@deleteUser');
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
		Route::post('/','AccountController@createAccount');
	    Route::get('/getAccountChart','AccountController@getAccountChart');
		Route::get('/getAcctChartByID/{id}','AccountController@getAcctChartByID');
		Route::put('/{id}', 'AccountController@updateAccount');
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
		Route::get('/getCategories','AssetController@getCategories');
		Route::get('/','AssetController@getPeriods');
		Route::post('/','AssetController@createAsset');
		Route::get('/','AssetController@getAssets');
		Route::get('/{id}','AssetController@getAssetItem');
		route::put('/{id}', 'AssetController@updateFA');
	});	

	Route::group(['prefix' => 'Balance'],function(){
		Route::get('/','BeginBalController@getAcctTitles');
		Route::post('/','BeginBalController@createBeginBal');
	});	

	Route::group(['prefix' => 'CDV'],function(){
		Route::get('/','CDVController@getAcctTitles');
		Route::post('/','CDVController@createCDV');
		Route::get('/banks','CDVController@getBanks');  
		Route::get('/cdvnum','CDVController@getCDVNum');
		Route::post('/getCDVInfo','CDVController@getCDVInfo'); 
	});

	Route::group(['prefix' => 'AppCDV'],function(){
		Route::get('/','AppCDVController@getCDVNo');
		Route::get('/getAcctEntries/{id}','AppCDVController@getAcctEntries');
		Route::put('/{id}','AppCDVController@appCDV');
		Route::put('/denyCDV/{id}','AppCDVController@denyCDV');
	});	

	Route::group(['prefix' => 'Audit'],function(){
		Route::get('/','AuditCDVController@getCDVNo');
		Route::get('/getAcctEntries/{id}','AuditCDVController@getAcctEntries');
		Route::put('/{id}','AuditCDVController@auditCDV');
	});	

	Route::group(['prefix' => 'Search'],function(){
		Route::get('/','SearchCDVController@getCDVNo');
		Route::get('/getCDVDet/{id}','SearchCDVController@getCDVDet');
		Route::get('/getDBEntries/{id}','SearchCDVController@getDBEntries');
		Route::get('/getCREntries/{id}','SearchCDVController@getCREntries');
		Route::get('/getDBSum/{id}','SearchCDVController@getDBSum');
	});	
	
	Route::group(['prefix' => 'JV'],function(){
		Route::get('/','JVController@getAcctTitles');
		Route::post('/','JVController@createJV');
		Route::post('/getGJEntries','JVController@getGJEntries'); 
	});	

	Route::group(['prefix' => 'approveJV'],function(){
		Route::get('/','AppJVController@getJVNo');
		Route::get('/getAcctEntries/{id}','AppJVController@getAcctEntries');
		Route::put('/{id}','AppJVController@approveJV');
	});	

	Route::group(['prefix' => 'AuditJV'],function(){
		Route::get('/','AuditJVController@getJVNo');
		Route::get('/getAcctEntries/{id}','AuditJVController@getAcctEntries');
		Route::put('/{id}','AuditJVController@auditJV');
	});	

	Route::group(['prefix' => 'SearchJV'],function(){
		Route::get('/','SearchJVController@getJVNo');
		Route::get('/getJVDet/{id}','SearchJVController@getJVDet');
		Route::get('/getDBEntries/{id}','SearchJVController@getDBEntries');
		Route::get('/getCREntries/{id}','SearchJVController@getCREntries');
	});	

	Route::group(['prefix' => 'APV'],function(){
		Route::get('/','APVController@getAcctTitles');
		Route::post('/','APVController@createAPV');
		Route::post('/getAPVEntries','APVController@getAPVEntries'); 
	});	

	Route::group(['prefix' => 'appAPV'],function(){
		Route::get('/','AppAPVController@getAPVNo');
		Route::get('/getAcctEntries/{id}','AppAPVController@getAcctEntries');
		Route::put('/{id}','AppAPVController@approveAPV');
	});	

	Route::group(['prefix' => 'AuditAPV'],function(){
		Route::get('/','AuditAPVController@getAPV');
		Route::get('/getAcctEntries/{id}','AuditAPVController@getAcctEntries');
		Route::put('/{id}','AuditAPVController@auditAPV');
	});	

	Route::group(['prefix' => 'SearchAPV'],function(){
		Route::get('/','SearchAPVController@getAPVNo');
		Route::get('/getAPVDet/{id}','SearchAPVController@getAPVDet');
		Route::get('/getDBEntries/{id}','SearchAPVController@getDBEntries');
		Route::get('/getCREntries/{id}','SearchAPVController@getCREntries');
	});	

	Route::group(['prefix' => 'check'],function(){
		Route::post('/','CheckController@createCheck');
	});	

	Route::group(['prefix' => 'PO'],function(){
		Route::get('/','POController@getSupplier');
		Route::get('/getBranch','POController@getBranch');
		Route::get('/getBank','POController@getBank');
		Route::get('/getBranchNames','POController@getBranchNames');
		Route::get('/getUnit','POController@getUnit');
		Route::get('/getSupplier2','POController@getSupplier2');
		Route::get('/getMOP','POController@getMOP');
		Route::get('/getPOLists','POController@getPOLists');
		Route::post('/','POController@createPO');
	});

	Route::group(['prefix' => 'podetails'],function(){
		Route::get('/{id}','PODetController@getPODetails');
		Route::get('/getPOItems/{id}','PODetController@getPOItems');
		Route::get('/selectSUM/{id}','PODetController@selectSUM');
		Route::put('/{id}', 'PODetController@approvePO');
		Route::get('/getApprovingOfficer/{id}', 'PODetController@getApprovingOfficer');
	});	

	Route::group(['prefix' => 'soa'],function(){
		Route::get('/{id}','SOAController@getInfo');
	});	

	Route::group(['prefix' => 'series'],function(){
		Route::get('/','SeriesController@getSeriesNum');
		Route::get('/getSeriesDet/{id}','SeriesController@getSeriesDet');
		Route::put('/{id}','SeriesController@updateNumSeries');
	});		

	Route::group(['prefix' => 'OR'],function(){
		Route::get('/','ORController@getPayer');
		Route::post('/','ORController@saveOR');
	});	

	Route::group(['prefix' => 'general-journal'],function(){
		Route::post('/{dateParams}', 'GJController@getGJEntries');
	});

});

