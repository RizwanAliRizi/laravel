<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
    	$roles = User::all();
    	$permissions=Permission::all();
    	return view('permission',compact('roles'));
    }
}
