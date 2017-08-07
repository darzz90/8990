<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $users = User::All();
            View::composer('*', function($view){
        });

        View()->composer('*', function ($view) {

        if(empty(Auth::user()->id) ){
            $id = 0;
        } else {
             $id = Auth::user()->id;
        }

        $menus = DB::table('tbl_000_userrights as usrryt')
        ->join('tbl_menuitemsub as mnsub','usrryt.submenu_id','=','mnsub.id')
        ->join('tbl_menuitem as mn', 'mnsub.menu_id','=','mn.id')
        ->join('tbl_000_users as usr', 'usrryt.usrtype_id','=','usr.usertype_id')
        ->select('mn.menu_name', 'mn.id AS mnid')
        ->where('mn.isActive','=',1,'and','mnsub.isActive','=',1,'and','usr.id','=',$id)
        ->orderBy('mn.line_id')
        ->distinct()
        ->get();

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

            view()->share('menus', $menus);
            view()->share('subs', $subs);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
