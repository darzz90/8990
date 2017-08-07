<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $id = Auth::user()->id;
        $urlname= Route::getFacadeRoot()->current()->uri();
        $subs = DB::table('tbl_000_userrights as usrryt')
        ->join('tbl_menuitemsub as mnsub','usrryt.submenu_id','=','mnsub.id')
        ->join('tbl_menuitem as mn', 'mnsub.menu_id','=','mn.id')
        ->join('tbl_000_users as usr', 'usrryt.usrtype_id','=','usr.usertype_id')
        ->select('mn.menu_name', 'mn.id AS mnid', 'usrryt.submenu_id', 'mnsub.submenu_name', 
            'mnsub.submenu_parent', 'isNewmn','isNewmn_sub','mnsub.submenu_url', 'usrryt.canView',
            'usrryt.canAdd', 'usrryt.canUpdate')
        ->where('mn.isActive','=',1,'and','mnsub.isActive','=',1,'and','usr.id','=',$id)
        ->orderBy('usrryt.submenu_id')
        ->get();
       
        foreach ($subs as $sub) {
           if ($sub->submenu_url == $urlname){
                if ($sub->canView != 1){
                    throw new \Exception("You dont have rights.");
                }
           }
        }
        return $next($request);
    }
}
