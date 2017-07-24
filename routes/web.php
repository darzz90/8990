<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function(){
    return view('User/user');
});

Route::get('/change_password', function(){
    return view('User/change_password');
});

Route::get('/add_user', function(){
    return view('User/add_user');
});

Route::get('/account', function(){
   return view('User/account');
});

Route::get('/add_user', 'UserController@UserType');

Route::get('/user', 'UserController@getUsers');

Route::get('/account', 'UserController@getLoggedUserDetails');

Route::post('/changePassword', 'UserController@loggedInUserChangePassword');

Route::post('/addUser', 'UserController@addUser');

//User Type

Route::get('/user_type', function(){
    return view('UserType/user_type');
});

Route::get('/add_user_type', function(){
    return view('UserType/add_user_type');
});

Route::get('/user_rights/{id}', function($id){
    return view('UserType/user_rights');
});

Route::get('/user_rights/{id}', 'RightsController@userRights');

Route::get('/user_type', 'UserTypeController@GetUserType');

Route::post('/addUserType', 'UserTypeController@addUserType');



//End Uer Type

//Branch Module

Route::get('/branch', function(){
   return view('Branch/branch');
});

Route::get('/add_branch', function(){
    return view('Branch/branch_entry');
});

Route::get('/branch', 'BranchController@getBranches');

Route::post('branchCode', 'BranchController@BranchCode');

Route::post('/addBranch', 'BranchController@addBranch');

//
Route::get('/tax', function(){
   return view('Tax/tax');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
