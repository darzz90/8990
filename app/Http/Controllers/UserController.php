<?php
/**
 * Created by PhpStorm.
 * User: Cio
 * Date: 7/19/2017
 * Time: 4:38 PM
 */

namespace App\Http\Controllers;

use App\Branch;
use App\User;
use App\UserTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller{

    public function __construct()
    {
        if (!Auth::check())
        {
            return redirect()->to('/');
        }
    }

    public function UserType(){
        $user_type = new UserTypeModel;
        $branch = new Branch;
        $getUserType = $user_type::all()->sortBy('user_type_description');
        $getBranch = $branch::all()->sortBy('branch_code');
        return view('User\add_user')->with(array('user_type' => $getUserType))->with(array('branches' => $getBranch));
    }

    public function addUser(Request $request){

        $user = new User;

        $this->validate($request,[
            'username' => 'required|max:50',
            'password' => 'required|max:50|min:6|same:confirm_password',
            'confirm_password' => 'required|max:50|min:6',
            'full_name' => 'required|max:50',
            'user_type' => 'required',
        ]);
        $active = null;
        $username = $request->username;
        $password = $request->password;
        $name = $request->full_name;
        $user_type = $request->user_type;
        $branch = $request->user_branch;
        $currentTime = Carbon::now();
        if($request->has('checkbox_active')){
            $active = 1;
        }else{
            $active = 0;
        }
        $checkUsername = $user::where('username',$username)->value('username');
        if($checkUsername){
            return redirect('add_user')->with('error-message',' is already exist')->with('username',$username)->with('fullname',$name);
        }else{
            $user->username = $username;
            $user->password = bcrypt($password);
            $user->name = $name;
            $user->IsActive = $active;
            $user->user_type_id = $user_type;
            $user->branch_code = $branch;
            $user->created_at = $currentTime;
            if($user->save()){
                return redirect('add_user')->with('message','Successfully Add New User')->with('username',$username)->with('fullname',$name);
            }
        }
    }

    public function getLoggedUserDetails(){

        $user = new User;
        $branch = new Branch;
        $getUser = $user::find(Auth::user());
        /*$getBranchId = $user::find(Auth::user());
        $getBranchOfUser = $branch::find($getBranchId);*/
        return view('User\account')->with(array('userDetails' => $getUser));
    }

    public function getUsers(){
        $users = User::all();
        return view('User\user')->with(array('users' => $users));
    }

    public function loggedInUserChangePassword(Request $request){
        $user = User::find(Auth::user()->id);
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' =>' required|min:6',
        ]);
        $password = $request->current_password;
        $new_password = $request->new_password;
        $db_password = $user::where('id',Auth::user()->id)->value('password');
        if(Hash::check($password,$db_password))
        {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($new_password);
            if($user->save()){
                return redirect('change_password')->with('success-message','Successfully changed the password');
            }
        }else{
            return redirect('change_password')->with('message','Invalid Current Password');
        }
    }

}