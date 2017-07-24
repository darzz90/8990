<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model{
    protected $table = "tbl_000_branches";
    public $timestamps = false;
    protected $fillable = [
        'branch_code','branch_address','branch_city','branch_province'
    ];
}
