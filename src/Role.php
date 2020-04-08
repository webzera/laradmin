<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{
    public function admins(){
    	return $this->belongsToMany('App\Admin', 'user_role', 'role_id', 'admin_id');
    }
    public function permissions(){
    	return $this->belongsToMany('App\Permission', 'permission_roles', 'role_id', 'permission_id');
    }
}
