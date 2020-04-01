<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    //
	public function index(){

		$user = User::orderBy('id', 'ASC')->paginate(5);

		return view('user.index', compact('user'))->with('i', (request()->input('page',1) -1) *5);
	}

	public function create(){

		$role = Role::pluck('name', 'name')->all();
		return view('user.createUser', compact('role'));
	}

	public function store(Request $request){

		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|same:confirm-password',
			'role' => 'required'
		]);

		$input = $request->all();
		$input['password'] = Hash::make($input['password']);

		$user = User::create($input);
		$user->assignRole($request->input('role'));

		return redirect()->route('user.index')->with('success', 'User created successfully');
	}

	public function show($id){

		$user = User::find($id);

		return view('user.show', compact('user'));
	}

	public function edit($id){

		$user = User::find($id);
		$role = Role::pluck('name', 'name')->all();
		$userRole = $user->roles->pluck('name', 'name')->all();

		return view('user.editUser', compact('user', 'role', 'userRole'));
	}

	public function update(Request $request, $id){

		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:user,email',
			'password' => 'required|same:confirm-password',
			'role' => 'required'
		]);

		$input = $request->all();
		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}else{
			$input = array_except($input, array('password'));
		}

		$user  = User::find($id);
		$user->update($input);
		DB::table('model_has_role')->where('model_id', $id)->delete();

		$user->assignRole($request->input('role'));

		return redirect()->route('user.index')->with('success', 'User update successfully');	
	}

	public function delete($id){

		$user = User::find($id);
		$user->delete();

		return redirect()->route('user.index')->with('success', 'User delete successfully');
	}

}
