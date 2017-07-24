<?php
namespace App\Http\Controllers;

use App\UserTypeModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserTypeController extends Controller{

    public function GetUserType(){
        $type = new UserTypeModel;
        $userTypes = $type::all();
        return view('UserType/user_type')->with(array('userType' => $userTypes));
    }

    public function addUserType(Request $request){
        $type = new UserTypeModel;
        $this->validate($request, [
            'user_type_description' => 'required'
        ]);
        $active = null;
        $user_type_description = $request->user_type_description;
        $date = Carbon::now();
        if($request->has('isActive')){
            $active = 1;
        }else{
            $active = 0;
        }
        $type->user_type_description = $user_type_description;
        $type->IsActive = $active;
        $type->created_date = $date;
        $type->updated_date = null;
        if($type->save()){
            return redirect('add_user_type')->with('message','Successfully Added');
        }
    }


}