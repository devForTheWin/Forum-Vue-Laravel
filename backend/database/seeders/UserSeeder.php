<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		foreach (range( 1, 30 ) as $index) {
			DB::table( 'users' )->insert( [
				'name' => $faker->firstName,
				'surname' => $faker->lastName,
				'email' => $faker->unique()->safeEmail,
				'email_verified_at' => now(),
				'password' => bcrypt( '123456' ),
				'remember_token' => Str::random( 10 ),
				'created_at' => now(),
				'updated_at' => now(),
			] );
		}
	}
}
