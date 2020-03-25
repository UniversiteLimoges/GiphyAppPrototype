<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{

	public $name = "quentin";

	public $users_name = [];

	public $users = [];

    public function viewTest()
    {

    	$users = User::all();  // return Collection

    	foreach ($users as $user) {
    		array_push($this->users_name, $user->name);
    	}

    	foreach ($users as $user) {
    		array_push($this->users, $user);
    	}

    	return view('test', [
    		'name' => $this->name,
    		'names' => $this->users_name,
    		'users' => $this->users,
    	]);
    }

    public function modifyTest()
    {
    	$user = User::where('name', 'Quentin')->first();
    	$user->name = 'Solid';
    	$user->save();

    	return redirect()->route('test');
    }

    public function modifyTestForm($id)
    {
    	// $user_to_modify = User::where('id', $id)->first();

    	$user_to_modify = User::find($id);

    	return view('modifyTestForm', [
    		'user_to_modify' => $user_to_modify,
    	]);
    }

    public function applyModify(Request $request, $id)
    {
    	$user_to_modify = User::find($id);
    	$new_name = $request->input('name');
    	$user_to_modify->name = $new_name;
    	$user_to_modify->save();

    	return redirect()->route('test');
    }
}
