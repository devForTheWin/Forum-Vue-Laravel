<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table( 'categories' )->insert( [
			[
				'name' => 'Gods',
				'slug' => 'gods',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'name' => 'People',
				'slug' => 'people',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'name' => 'Animals',
				'slug' => 'animals',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'name' => 'Flowers',
				'slug' => 'flowers',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'name' => 'Robots',
				'slug' => 'robots',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
		] );
	}
}
