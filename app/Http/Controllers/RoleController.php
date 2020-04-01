<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
   	function __construct(){
   		$this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
   		$this->middleware('permission:role-create', ['only' => ['create','store']]);
   		$this->middleware('permission:role-edit', ['only' => ['edit','update']]);
   		$this->middleware('permission:role-delete', ['only' => ['delete']]);
   	}

    public function index(Request $request){

    	$role = Role::orderBy('id', 'ASC')->paginate(5);

    	return view('role.index', compact('role'))->with('i', ($request->input('page',1) - 1) * 5);
    }

    public function create(){

    	$permission = Permission::get();
    	return view('role.createRole', compact('permission'));
    }

    public function store(Request $request){

    	$request->validate([
    		'name' => 'required|unique:roles,name',
    		'permission' => 'required'
    	]);

    	$role = Role::create(['name' => $request->input('name')]);
    	$role->syncPermissions($request->input('permission'));

    	return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function show($id){

    	$role = Role::find($id);
    	$rolePermission = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$id)->get();

    	return view('role.show', compact('role','rolePermission'));
    }

    public function update(Request $request, $id){

    	$request->validate([
    		'name' => 'require|',
    		'permission' => 'require'
    	]);

    	$role = Role::find($id);
    	$role->name = $request->input('name');
    	$role->save();

    	$role->syncPermissions($request->input('permission'));

    	return redirect()->route('role.index')->with('success', 'Role update successfully');
    }

    public function delete($id){
    	$role = Role::find($id);
    	$role->delete();

    	return redirect()->route('role.index')->with('success', 'Role delete successfully');
    }
}
