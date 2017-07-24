<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Branch;

class BranchController extends Controller
{

    public function BranchCode()
    {
        $code = null;
        $count = DB::table('tbl_000_branches')->count();
        $e = DB::table('tbl_000_branches')->skip($count - 1)->take(0)->value('branch_id');
        $h = DB::table('tbl_000_branches')->skip($count - 1)->take(0)->value('branch_id');
        if($count == 0)
        {
            $e = 1;
        }
        if($h == 1)
        {
            $e = 2;
        }
        else
        {
            $e = $h + 1;
        }
        $b = $e;
        $num_of_ids = $b; //Number of "ids" to generate.
        $i = 0; //Loop counter.
        $n = 0; //"id" number piece.
        $l = "BRANCH"; //"id" letter piece.
        while ($i <= $num_of_ids) {
            $code = $l." - ". date("y")." - ".sprintf("%04d", $n); //Create "id". Sprintf pads the number to make it 4 digits

            if ($n == 9999) { //Once the number reaches 9999, increase the letter by one and reset number to 0.
                $n = 0;
            }
            $i++; $n++; //Letters can be incremented the same as numbers. Adding 1 to "AAA" prints out "AAB".
        }
        echo $code;
    }

    public function addBranch(Request $request){
        $branch = new Branch;
        $this->validate($request,[
            'branch_code' => 'required',
            'branch_address' => 'required',
            'branch_city' => 'required',
            'branch_province' => 'required',
        ]);
        $branch->branch_code = $request->branch_code;
        $branch->branch_address = $request->branch_address;
        $branch->branch_city = $request->branch_city;
        $branch->branch_province = $request->branch_province;
        if($branch->save()){
            return redirect('add_branch')->with('message','Successfully Add New Branch');
        }
    }

    public function getBranches(){
        $branch = new Branch;
        $branches = $branch::all();
        return view('Branch/branch')->with(array('branches' => $branches));
    }
}
