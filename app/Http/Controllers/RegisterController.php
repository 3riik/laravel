<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Laravel_User;
use App\Laravel_Hobby;

class RegisterController extends Controller{

	protected $users;

	public function __construct() {

		$this->users = new Laravel_User();
	}
	
	public function register( Request $request ) {
		return view('register');
	}    

	public function store( Request $request ) {

		$this->validate($request,[
			'name' 		=> 'required|min:4',
			'email'		=> 'required|email|unique:laravel_users',
			'swim'  	=> 'required',
			'bicykel'	=> 'required',
			'run'		=> 'required',
			'tourism' 	=> 'required',
			'climbing'	=> 'required',
			]);
		
		$user = Laravel_User::create($request->all());
		$user->hobby()->create($request->all());
		return view('compare_form')->with('message_success','Registrácia prebehla úspešne');
	}

	public function compare_form( Request $request ) {

		return view('compare_form');
	}

	public function compare_result( Request $request ) {

		$i = 0;
		$results = array();
		$result = array();

		$this->validate($request, [
			'email'	=> 'required|email|exists:laravel_users',
			]);
		$current_hobbies = $this->users->get_user_hobbies( $request->email );

		/* This returns all hobbies except for the one we are comparing with */
		$all_other_hobbies = $this->users->get_all_other_hobbies( $request->email );

		
		
		foreach ($all_other_hobbies as $hobbies ) {
				$result['name'] = $this->users->get_user_name( $hobbies->user_id );

				$sum = abs($current_hobbies->swim - $hobbies->swim) * 20;
				$sum += abs($current_hobbies->bicykel - $hobbies->bicykel) * 20;
				$sum += abs($current_hobbies->run - $hobbies->run) * 20;
				$sum += abs($current_hobbies->tourism - $hobbies->tourism) * 20;
				$sum += abs($current_hobbies->climbing - $hobbies->climbing) * 20;
				$result['result'] = 100 - ($sum/5);
				
				$results[$i++] = $result;
				
			}	

		return view('compare_result')->with('results', $results)->with('current_user', $this->users->get_user_name( $current_hobbies->user_id ));

	}

}
