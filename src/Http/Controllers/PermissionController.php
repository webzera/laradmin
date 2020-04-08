<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;
use App\Permission;
use App\PermissionRole;

class PermissionController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
    public function adminpermissionlist(){
        foreach (\Route::getRoutes()->getRoutes() as $route)
        {
            $controlleractionlist = $route->getAction();

            if (array_key_exists('controller', $controlleractionlist))
            {
                // You can also use explode('@', $controlleractionlist['controller']); here
                // to separate the class name from the method
                if (preg_match ('/Admin/',  $controlleractionlist['controller'])){
                    $controllerAction = class_basename($controlleractionlist['controller']);
                    list($controller, $action) = explode('@', $controllerAction);
                    list($controller_name, $emptystr) = explode('Controller', $controller);
                    $checkpermission=Permission::where('name', $controllerAction)->first();
                    if(!$checkpermission){
                        $permission= new Permission;
                        $permission->name=$controllerAction;
                        $permission->label=$controller_name.' '.$action;
                        $permission->description=$controller_name.' Controller '.$action.' function Permission';
                        $permission->save();

                        $permissionRole= new PermissionRole;
                        $permissionRole->permission_id=$permission->id;
                        // $myrole=$request->user()->roles()->first()['id'];
                        $permissionRole->role_id=1;
                        $permissionRole->save();
                    }
                }                
            }
        }
        $permissionLists=Permission::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.rolebase.adminpermissionlist')->with('permissionLists', $permissionLists);
    }
    public function permissionassign(Request $request)
    {
        $permission = Permission::where('id', $request['id'])->first();
        $permission->roles()->detach();

        $roles=\App\Role::all();
        foreach ($roles as $role) {
            if($request[$role->name]){
                $permission->roles()->attach(Role::where('name', $role->name)->first());
            }
        }
        flash('Admin Role Permission Updated Successfully');
        return redirect()->back();
    }
}
