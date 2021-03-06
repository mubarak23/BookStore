<?php

namespace App\Http\Controllers;
use App\Jobs\sendEmailVerification;
use App\User;
use Illuminate\Http\Request;
use Crypt, Hash;

class UserController extends Controller
{
    //

    public function show_register(){
    	return view('user.register');
    }

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
		$create_user->user_role = 2;
		$create_user->password = bcrypt($data["password"]);
		$create_user->save();

		dispatch(new sendEmailVerification($create_user));
		return $create_user;

	}

	public function verify_account($token){
			$user_id = Crypt::decrypt($token);
			$verify_account = User::where('id', $user_id)->first();
			$verify_account->status = 1;
			$verify_account->save();
			return redirect()->route('login')->with("status", "Your Account has been Verfied, you can now login");

	}

	public function show_login(){
		$title = "Login Page";
		return view('user.login')->with(['title'=> $title]);
	}

	public function login(Request $request){
			$data = $request->all();
			 //$email = $data['email'];

            $check_email = User::where("email", "admin@gmail.com")->exists();

			if(!$check_email){
				return redirect()->back()->withInput();

			}else{
				$check_status = User::where("email", $data["email"])->first();

				if($check_status->status === 0 ){
					return redirect()->back()->with(["status" => "You Hav Not Vaerify Your Account"]);

				}else{
					//check the auth session
				if(Auth::attempt(["email" => $data["email"], "password" => $data["password"]])){

						if(Auth::user()->user_role === 2){
							return redirect()->route("userDashboard");
						}else if(Auth::user()->user_role === 1){
							return redirect()->route("adminDashboard");
						}
					}

				}

			}

			
	}

	public function user_dashboard(){
		
	}

	public function getlogout(){
		Auth::logout();
		return redirect()->route('home');

	}

}
