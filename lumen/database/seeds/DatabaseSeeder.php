<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        $user = new User();
		$user->username = "admin";
		$user->email = "admin@admin.com";
		$user->password = app('hash')->make("admin@admin.com");
		$user->api_token = "";
		$user->save();

		$faker = Faker\Factory::create("id_ID");

		for ($i=1; $i <= 100 ; $i++) { 
			$username = $faker->userName;
			$user = new User();
			$user->username = $username;
			$user->email = $username . "@" . $username . ".com";
			$user->password = app('hash')->make($username . "@" . $username . ".com");
			$user->api_token = "";
			$user->save();	
		}
    }
}
