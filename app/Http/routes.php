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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'admin'], function(){

	Route::get('/admin/courselist', ['as' => 'userlist', function(){ 
               return view('admin/courselist');

	//	return "welcome administrator!!!!";
	//	return view('admin/courselist'); 
	}]);

    Route::get('/admin/course/{idedit}', ['as' => 'adminview', function($idedit){
 		return view('admin/adminCourseView', ['idedit' => $idedit]); 
		//return "Hello";
 	}]);


	Route::get('/admin/newuser', ['as' => 'adminnew', function(){ 
                 return "Hello"; 	
 //	return view('admin/adminnewuser'); 
 	}]);

	Route::post('/admin/courselist/executeSearch', array('uses' => 'AdminController@executeSearch'));

});
