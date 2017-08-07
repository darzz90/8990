<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypeModel extends Model{

    protected $table = "tbl_000_usertypes";
    public $timestamps = false;
    protected $fillable = [
        'utyCode','utyDesc','isOfficer','CreatedBy','CreatedDate','UpdatedBy','UpdatedDate'
    ];

}
