<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model{
    protected $table = "tbl_000_branch";
    public $timestamps = false;
    protected $fillable = [
        'BranchCode','BranchName','AddressLine1','AddressLine2','ContactPerson','TelNo','FaxNo',
        'CellNo','Email','IsActive','CreatedBy','CreatedDate','UpdatedBy','UpdatedDate'
    ];
}
