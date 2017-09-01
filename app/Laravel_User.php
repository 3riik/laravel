<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Laravel_User extends Model
{


  protected $table    = 'laravel_users';
  protected $fillable = array('name', 'email' );

  public function hobby() {
    return $this->hasOne('App\Laravel_Hobby','user_id');
  }
 

  public function get_hobbies_names() {

    $hobbies_names = DB::getSchemaBuilder()->getColumnListing('laravel_hobbies');
    return array_diff($hobbies_names, ['user_id','created_at','updated_at']);
  }

  public function get_user_hobbies( $email ) {

  	$user = $this->get_user_by_email( $email );
    $hobbies  = new Laravel_Hobby();
  	return $hobbies->where('user_id', $user->id)->first();
  }

  public function get_all_other_hobbies( $email ) {

  	$user = $this->get_user_by_email( $email );
    $hobbies  = new Laravel_Hobby();
  	return $hobbies->whereNotIn('user_id', [$user->id])->get();
  }

  public function get_user_name( $id ) {

    return $this->where('id',$id)->first()->name;
  }


  private function get_user_by_email( $email ) {

    return $this->where('email', $email)->first();
  }
}

class Laravel_Hobby extends Model{

  protected $table = 'laravel_hobbies';
  protected $fillable = array('user_id','swim','bicykel','run','tourism','climbing');

  public function user() {

    return $this->belongsTo('App\Laravel_User','id');
  }
}