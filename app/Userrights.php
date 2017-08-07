<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userrights extends Model
{
    protected $table = "tbl_000_userrights";
    public $timestamps = false;
    protected $fillable = ['usrtype_id','submenu_id','canView','canAdd','canUpdate'];

}
