<?php
/**
 * Created by PhpStorm.
 * User: Cio
 * Date: 7/20/2017
 * Time: 9:09 AM
 */

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GroupController extends Controller{

    public function addGroup(Request $request){
        $group = new Group;
        $this->validate($request, [
            'group_description' => 'required'
        ]);
        $active = null;
        $admin = null;
        $group_description = $request->group_description;
        $date = Carbon::now();
        if($request->has('isActive')){
            $active = 1;
        }else{
            $active = 0;
        }
        if($request->has('isAdmin')){
            $admin = 1;
        }else{
            $admin = 0;
        }
        $group->group_description = $group_description;
        $group->IsActive = $active;
        $group->IsAdmin = $admin;
        $group->created_date = $date;
        $group->updated_date = null;
        $group->save();
    }

}