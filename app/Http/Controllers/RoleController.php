<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;


class RoleController extends Controller
{
    public function index(){
        if(auth()->user()){
        $users = User::all();
        return view('role',compact('users'));
        }
       return redirect(route('login'))->with('register_company','Please Login ');
    	
    }

    public function assign($name){

    	$roles = Role::all();
    	$permissions = Permission::all();

    	return view('assignRole',compact('roles'),compact(
    		'permissions'))->with('name',$name);
    }

    public function storeRolePermission(Request $request,$name){

        if(auth()->user()->hasRole('admin')){
    	$roleArray = $request->roles;
    	$permissionArray = $request->permissions;
    	$user = User::Where('name','=',$name)->first();

    	//assigning roles to user
        if($roleArray)
    	{
            foreach ($roleArray as $key => $value) {
                    $roles = Role::Where('name','=',$value)->first();
                    $user->attachRole($roles);
                    }
         }
     
    			
        //assigning permissions to role
            if($permissionArray)
    		{
                foreach ($permissionArray as $key => $value) {
                        $permission = Permission::Where('name','=',$value)->first();
                        // dd($permission,$roles);
                        $roles->attachPermission($permission);}
    		// $roles->permissions()->attach($permission);
    	   	}
            
            echo "<h1>Roles and Permissions has assigned successfully </h1>";
        }else
            echo "<h1> Only Admin can Assign Roles </h1>";
    
			
    }


}


