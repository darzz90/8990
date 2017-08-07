<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Security extends Model{
    protected $table = "tbl_securitypolicies";
    public $timestamps = false;
    protected $fillable = [
        'passwordLength','passwordDigit','passwordSpecial','ispasswordreuse','passwordChangeFreq','loginAttempts','sessionTimeout'
        ,'createdBy','createdDate','updatedBy','updatedDate'
    ];
}
