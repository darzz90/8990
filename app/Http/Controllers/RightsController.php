<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RightsModel;
use App\UserTypeModel;

class RightsController extends Controller{

    public function userRights($id){
        $rights = new RightsModel;
        $type = new UserTypeModel;
        $user_type = $type::where('user_type_id',$id)->value('user_type_description');
        $user_rights = $rights::all();
        return view('UserType\user_rights')->with(array('rights' => $user_rights))->with('user_type',$user_type);
    }

}
