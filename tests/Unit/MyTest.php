<?php

namespace Tests\Unit;

use App\Box;
use App\Laravel_User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MyTest extends TestCase
{
   
    public function test_get_user_by_email(){

    	$users = new Laravel_User();

    	$email = 'registracia@gmail.com';
    	$user  = 'registracia'; //checked from database

    	$this->assertEquals($user, $users->get_user_by_email($email)->name);
    }

    public function test_get_user_hobbies() {

    	$users = new Laravel_User();
    	$email = 'registracia@gmail.com';
    	$userHobbyRun = 3;  //checked from database

    	$this->assertEquals($userHobbyRun, $users->get_user_hobbies($email)->run);

    }

    public function test_get_all_other_hobbies() {
        //Not working yet
        $users = new Laravel_User();
        $email = 'registracia@gmail.com';
        $email_second = 'papson.erik@gmail.com';

        $user_hobbies = $users->get_user_hobbies($email); 
        $all_hobbies_except_email_second = $users->get_all_other_hobbies( $email);
        print_r($user_hobbies);
        $this->assertNotContains($user_hobbies, $all_hobbies_except_email_second);
    }
}
