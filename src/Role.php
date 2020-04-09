<?php

namespace Webzera\Laradmin;

use Illuminate\Database\Eloquent\Model;
use Webzera\Laradmin\Permission;

class Role extends Model
{
    public function admins(){
    	return $this->belongsToMany('Webzera\Laradmin\Admin', 'user_role', 'role_id', 'admin_id');
    }
    public function permissions(){
    	return $this->belongsToMany('Webzera\Laradmin\Permission', 'permission_roles', 'role_id', 'permission_id');
    }
}
