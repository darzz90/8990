<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RightsModel extends Model{

    protected $table = "tbl_menuitem";
    public $timestamps = false;
    protected $fillable = [
        'menuTitle','MenuLink','LineId'
    ];

}
