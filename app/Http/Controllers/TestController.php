<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{

	public $name = "quentin";

	public $users_name = [];

    public function viewTest()
    {

    	$users = User::all();  // return Collection
    	
    	foreach ($users as $user) {
    		array_push($this->users_name, $user->name);
    	}


    	return view('test', [
    		'name' => $this->name,
    		'names' => $this->users_name,
    	]);
    }
}
