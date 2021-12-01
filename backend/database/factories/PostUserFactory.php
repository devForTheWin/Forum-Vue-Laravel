<?php

namespace Database\Factories;

use App\Models\PostUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostUserFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = PostUser::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'user_id' => rand( 1, 30 ),
			'post_id' => rand( 1, 60 ),
			'created_at' => now(),
			'updated_at' => now(),
		];
	}
}
