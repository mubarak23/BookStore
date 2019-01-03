<?php

namespace App\Http\Controllers;
use App\Jobs\sendEmailVerification;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

	public function create(Request $request){
		$data = $request->all();
		$validate_data = $request->validate([
				'name' => 'required|min[3]',
				'email' => 'required|unique:users',
				'password' => 'required'

			]);

		$process_store = self::store($data);

		if($process_store){
			return redirect()->route("login");
		}else{
			return redirect()->back();
		}
	}

	public function store($data){
		$create_user = new User();
		$create_user->name = $data["name"];
		$create_user->email = $data["email"];
		$create_user->password = bcrypt($data["password"]);
		$create_user->save();

		dispatch(new sendEmailVerification($create_user));
		return $create_user;
		
	}

}
