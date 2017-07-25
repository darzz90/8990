<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Security;

class SecurityController extends Controller{

    public function addSecurity(Request $request){
        $this->validate($request,[
            'minimum_password' => 'numeric',
            'number_of_digits_in_password' => 'numeric',
            'number_of_special_characters' => 'numeric',
            'number_of_days_password_expires' => 'numeric',
            'login_attempts' => 'numeric',
            'minutes_of_session_invalidated' => 'numeric',
        ]);
        $security = new Security;
        $date = Carbon::now();
        $security->passwordLength = $request->minimum_password;
        $security->passwordDigit = $request->number_of_digits_in_password;
        $security->passwordSpecial = $request->number_of_special_characters;
        $security->ispasswordreuse = $request->password_reused;
        $security->passwordChangeFreq = $request->number_of_days_password_expires;
        $security->loginAttempts = $request->login_attempts;
        $security->sessionTimeout = $request->minutes_of_session_invalidated;
        $security->createdDate = $date;
        $security->createdBy = Auth::user()->username;
        $security->updatedDate = null;
        $security->updatedBy = null;
        if($security->save()){
            return redirect('security_policy')->with('message','Successfully Add New Security Policies');
        }
    }

    public function checkSecurityPolicy(){
        $security = new Security;
        $checkData = $security::all()->count();
        if($checkData == null){
            return view('Security/add_security_policy');
        }else{
            return view('Security/security_policy');
        }
    }

    public function getSecurityPolicy(){
        $security = new Security;
        $data = $security::all();
        return view('Security/security_policy')->with(array('security_data' => $data));
    }

    public function updateSecurity(Request $request,$id){
        $this->validate($request,[
            'minimum_password' => 'numeric',
            'number_of_digits_in_password' => 'numeric',
            'number_of_special_characters' => 'numeric',
            'number_of_days_password_expires' => 'numeric',
            'login_attempts' => 'numeric',
            'minutes_of_session_invalidated' => 'numeric',
        ]);
        $security = new Security;
        $date = Carbon::now();
        $securityUpdate = $security::find($id);
        $securityUpdate->passwordLength = $request->minimum_password;
        $securityUpdate->passwordDigit = $request->number_of_digits_in_password;
        $securityUpdate->passwordSpecial = $request->number_of_special_characters;
        $securityUpdate->ispasswordreuse = $request->password_reused;
        $securityUpdate->passwordChangeFreq = $request->number_of_days_password_expires;
        $securityUpdate->loginAttempts = $request->login_attempts;
        $securityUpdate->sessionTimeout = $request->minutes_of_session_invalidated;
        $securityUpdate->updatedDate = $date;
        $securityUpdate->updatedBy = Auth::user()->username;
        if($securityUpdate->save()){
            return redirect('security_policy')->with('message','Successfully Updating Security Policies');
        }
    }
}
