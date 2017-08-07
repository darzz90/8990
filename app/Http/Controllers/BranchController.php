<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Branch;

class BranchController extends Controller
{
    public function __construct(){
        $this->middleware('menu');
    }

    public function addBranch(Request $request){
        $branch = new Branch;
        $this->validate($request,[
            'branch_code' => 'required',
            'branch_name' => 'required',
        ]);
        $date = Carbon::now();
        $branch->BranchCode = $request->branch_code;
        $branch->BranchName = $request->branch_name;
        $branch->AddressLine1 = $request->address_line1;
        $branch->AddressLine2 = $request->address_line2;
        $branch->ContactPerson = $request->contact_person;
        $branch->TelNo = $request->telephone_number;
        $branch->FaxNo = $request->fax_number;
        $branch->CellNo = $request->cellphone_number;
        $branch->Email = $request->email_address;
        $branch->CreatedBy = Auth::user()->username;
        $branch->CreatedDate = $date;
        $branch->UpdatedBy = null;
        $branch->UpdatedDate = null;
        if($branch->save()){
            return redirect('add_branch')->with('message','Successfully Add New Branch');
        }
    }

    public function getBranches(){

        $branch = new Branch;
        $branches = $branch::all();
        return view('Branch/branch')->with(array('branches' => $branches));
    }

    public function getBranchById($id){
        $branch = new Branch;
        $GetBranch = $branch::where('id',$id)->get();
        return view('Branch/view_branch')->with('getbranch',$GetBranch);
    }

    public function deleteBranch($id){
        $branch = new Branch;
        $deleteBranch = $branch::find($id);
        if($deleteBranch->delete()){
            return redirect('branch')->with('message','Successfully Delete Item');
        }
    }

    public function GetBranchDetails($id){
        $branch = new branch;
        $getUpdatedBranch = $branch::where('id',$id)->get();
        return view('Branch/branch_update')->with('branchDisplay',$getUpdatedBranch);
    }

    public function updateBranch(Request $request,$id){
        $branch = new branch;
        $branchUpdate = $branch::find($id);
        $date = Carbon::now();
        $branchUpdate->BranchCode = $request->branch_code;
        $branchUpdate->BranchName = $request->branch_name;
        $branchUpdate->AddressLine1 = $request->address_line1;
        $branchUpdate->AddressLine2 = $request->address_line2;
        $branchUpdate->ContactPerson = $request->contact_person;
        $branchUpdate->TelNo = $request->telephone_number;
        $branchUpdate->FaxNo = $request->fax_number;
        $branchUpdate->CellNo = $request->cellphone_number;
        $branchUpdate->Email = $request->email_address;
        $branchUpdate->UpdatedBy = Auth::user()->username;
        $branchUpdate->UpdatedDate = $date;
        if($branchUpdate->save()){
            return redirect('branch/update/'.$id)->with('message','Successfully Updating Branch');
        }
    }
}
