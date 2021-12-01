<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		$isPublished = ['1', '0'];
		foreach (range( 1, 60 ) as $index) {
			DB::table( 'posts' )->insert( [
				'user_id' => $faker->numberBetween( 1, 20 ),
				'title' => $faker->unique()->sentence,
				'slug' => $faker->slug,
				'post_text' => $faker->text,
				'is_published' => $isPublished[rand(0, 1)],
				'created_at' => now(),
				'updated_at' => now(),
			] );
		}
	}
}
