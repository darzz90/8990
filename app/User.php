<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "tbl_000_users";
    protected $fillable = [
         'name','username', 'password','fname','mname','lname','addressline1','addressline2','telNo','cellNo','email',
         'remember_token','IsActive','usertype_id','created_at','updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
