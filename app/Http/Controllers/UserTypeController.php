<?php
namespace App\Http\Controllers;

use App\UserTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserTypeController extends Controller{

    public function __construct(){
        $this->middleware('menu');
    }

    public function addUserType(Request $request){

        $this->validate($request,[
            'user_type_code' => 'required',
        ]);
        $isOfficer = 0;
        if($request->has('is_officer')){
            $isOfficer = 1;
        }
        $userType = new UserTypeModel;
        $userType->utyCode = $request->user_type_code;
        $userType->utyDesc = $request->user_type_description;
        $userType->isOfficer = $isOfficer;
        $userType->CreatedBy = Auth::user()->username;
        $userType->CreatedDate = Carbon::now();
        $userType->UpdatedBy = null;
        $userType->UpdatedDate = null;
        if($userType->save()){
            return redirect('add_user_type')->with('message','Successfully Add New User Type');
        }
    }

    public function getUserTypes(){
        $userType = new UserTypeModel;
        $user_types = $userType::all();
        return view('UserType/user_type')->with(array('user_types' => $user_types));
    }

    public function getUserType($id){
        $userType = new UserTypeModel;
        $user_type = $userType::where('id',$id)->get();
        return view('UserType/view_user_type')->with(array('user_type' => $user_type));
    }

    public function deleteUserType($id){

        $userType = new UserTypeModel;
        $deleteUserType = $userType::find($id);
        if($deleteUserType->delete()){
            return redirect('user_type');
        }
    }

    public function getUserTypeUpdate($id){
        $userType = new UserTypeModel;
        $user_type = $userType::where('id',$id)->get();
        return view('UserType/update_user_type')->with(array('user_type' => $user_type));
    }

    public function updateUserType(Request $request,$id){
        $isOfficer = 0;
        if($request->has('is_officer')){
            $isOfficer = 1;
        }
        $userType = new UserTypeModel;
        $userTypeUpdate = $userType::find($id);
        $userTypeUpdate->utyCode = $request->user_type_code;
        $userTypeUpdate->utyDesc = $request->user_type_description;
        $userTypeUpdate->isOfficer = $isOfficer;
        $userTypeUpdate->UpdatedBy = Auth::user()->username;
        $userTypeUpdate->UpdatedDate = Carbon::now();
        if($userTypeUpdate->save()){
            return redirect('user_type/update/'.$id)->with('message','Successfully Updating User Type');
        }
    }

}