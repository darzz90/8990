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

Route::get('/user_type/update/{id}', function($id){
    return view('UserType/update_user_type',['id' => $id]);
});

Route::get('/user_type', 'UserTypeController@getUserTypes');

Route::get('/user_type/update/{id}', 'UserTypeController@getUserTypeUpdate');

Route::get('/user_type/{id}', 'UserTypeController@deleteUserType');

Route::get('/view_user_type/{id}', 'UserTypeController@getUserType');

Route::post('/addUserType', 'UserTypeController@addUserType');

Route::post('/updateUser/{id}','UserTypeController@updateUserType');
//End Uer Type

//Branch Module

Route::get('branch', function(){
   return view('Branch/branch');
});

Route::get('/add_branch', function(){
    return view('Branch/branch_entry');
});

Route::get('/view_branch/{id}', function(){
    return view('Branch/view_branch');
});

Route::get('/branch/update/{id}', function(){
    return view('Branch/branch_update');
});

Route::get('/view_branch/{id}', 'BranchController@getBranchById');

Route::get('/branch','BranchController@getBranches');

Route::get('/branch/{id}','BranchController@deleteBranch');

Route::get('/branch/update/{id}', 'BranchController@GetBranchDetails');

Route::post('/addBranch', 'BranchController@addBranch');

Route::post('/updateBranch/{id}', 'BranchController@updateBranch');

//Security Policy
Route::get('/add_security_policy', function(){
    return view('Security/add_security_policy');
});

Route::get('/security_policy', 'SecurityController@checkSecurityPolicy');

Route::get('/security_policy', 'SecurityController@getSecurityPolicy');

Route::post('/addSecurity', 'SecurityController@addSecurity');

Route::post('/updateSecurity/{id}', 'SecurityController@updateSecurity');
//

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');