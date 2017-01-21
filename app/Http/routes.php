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

 		// Route::post('/','Controller@createEmployee');
	// Route::group(['prefix' => 'employees', 'namespace' => 'Admin', 'middleware' => ['auth', 'acl']],function() use ($router){
	// Route::group(['prefix' => 'employees'],function(){
 // 		Route::get('/', [
 // 			'uses' => ['Controller@getEmployees'],
 // 			'as' => 'admin.employees',
 // 			'permission' => 'manage_employee (add/edit/delete)'
 // 		]);
 			
 // 		Route::post('/', [
	// 		// 'middleware' => ['auth', 'roles'],
	// 		'middleware' => ['auth', 'permissions.required'],
	// 		'permissions' => ['access', 'admin'],
	// 		'uses' => ['Controller@createEmployee'],
	// 		//'roles' => ['super_admin', 'admin']
	// 	]);

 // 		Route::get('/{id}','Controller@getPosID');
 // 		Route::get('/{id}', 'Controller@getEmployeeID');
 // 		// Route::put('/{id}', 'Controller@updateEmployee');
	// });

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
		Route::get('/getEmployees','UserController@getEmployees');
		Route::get('/getUserRoles','UserController@getUserRoles');
		Route::post('/','UserController@createUser');
		// Route::get('/getRolesPermission','UserController@getRolesPermission');
		Route::get('/getUserID/{id}','UserController@getUserID');
		Route::put('/{id}','UserController@updateUser');
		// Route::delete('/{id}','UserController@deleteUser');
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
		// Route::get('/','AssetController@getPeriods');
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
		Route::get('/','CDVController@getCDV');
		Route::get('/getBanks','CDVController@getBanks');  
		Route::get('/getAcctTitles','CDVController@getAcctTitles');
		Route::get('/getCDVByID/{id}', 'CDVController@getCDVByID');
		Route::get('/getCDVDetails/{id}', 'CDVController@getCDVDetails');
		Route::get('/getCDVEntries/{id}','CDVController@getCDVEntries');
		Route::get('/getCDVNum','CDVController@getCDVNum');
		Route::post('/','CDVController@createCDV');	
		Route::get('/previewCDV/{id}','CDVController@previewCDV');
		Route::put('/{id}', 'CDVController@updateCDV');
		Route::put('/approveCDV/{id}','CDVController@approveCDV');
		Route::put('/auditCDV/{id}', 'CDVController@auditCDV');
		Route::put('/cancelCDV/{id}', 'CDVController@cancelCDV');
		Route::get('/getCDVInfo','CDVController@getCDVInfo');	
	});
	
	Route::group(['prefix' => 'JV'],function(){
		Route::get('/','JVController@getAcctTitles');
		Route::post('/','JVController@createJV');
		Route::get('/getJVs', 'JVController@getJVs');
		// Route::put('/{id}', 'JVController@updateJV');
		Route::get('/getJVDetails/{id}', 'JVController@getJVDetails');
		Route::put('/updateJVEntries/{id}', 'JVController@updateJVEntries');
		Route::put('/approveJV/{id}', 'JVController@approveJV');
		Route::put('/cancelJV/{id}', 'JVController@cancelJV');
		Route::put('/auditJV/{id}', 'JVController@auditJV');
		Route::get('/previewJV/{id}', 'JVController@previewJV');
		Route::get('/getJVPK/{id}', 'JVController@getJVPK');
	});	

	Route::group(['prefix' => 'APV'],function(){
		Route::get('/','APVController@getAPV');
		Route::get('/getAcctTitles', 'APVController@getAcctTitles');
		Route::post('/','APVController@createAPV');
		Route::get('/getAPVDetails/{id}', 'APVController@getAPVDetails');
		Route::put('/{id}', 'APVController@updateAPV');
		Route::put('/approveAPV/{id}', 'APVController@approveAPV');
		Route::get('/previewAPV/{id}', 'APVController@previewAPV');
		Route::put('/cancelAPV/{id}', 'APVController@cancelAPV');
		Route::put('/auditAPV/{id}', 'APVController@auditAPV');
		// Route::post('/getAPVEntries','APVController@getAPVEntries'); 
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

