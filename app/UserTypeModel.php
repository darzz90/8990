<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypeModel extends Model{

    protected $table = "tbl_000_usertype";
    public $timestamps = false;
    protected $fillable = [
        'group_description','IsActive','IsAdmin'
    ];
}
