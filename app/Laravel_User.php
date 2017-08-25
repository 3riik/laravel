<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Laravel_User extends Model
{
  

  public function store_user( $user ) {

  	$uid = DB::table('laravel_users')->insertGetId(
				['name' => $user['name'], 'email' => $user['email'] ]
			);

  	DB::table('Laravel_hobbies')->insert(
  		[	'uid' => $uid, 
  			'swim' => $user['swim'],
  			'bicykel' => $user['bicykel'],
  			'run'	=> $user['run'],
  			'tourism' => $user['tourism'],
  			'climbing' => $user['climbing']
  	   ]);
  }

  private function get_user_by_email( $email ) {

  	return DB::table('laravel_users')->where('email', $email)->first();
  }

  public function get_user_hobbies( $email ) {

  	$user = $this->get_user_by_email( $email );
  	$hobbies = DB::table('laravel_hobbies')->where('uid', $user->id)->first();
  	return $hobbies;
  }

  public function get_all_other_hobbies( $email ) {

  	$user = $this->get_user_by_email( $email );
  	$hobbies = DB::table('laravel_hobbies')->whereNotIn('uid', [$user->id])->get();
  	return $hobbies;

  }

  public function get_user_name( $id ) {
  	return DB::table('laravel_users')->where('id', $id)->select('name')->first()->name;
  }

}
