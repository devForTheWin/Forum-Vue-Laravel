<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_users', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'user_id' )->constrained( 'users' )->onDelete( 'cascade' );
			$table->foreignId( 'post_id' )->constrained( 'posts' )->onDelete( 'cascade' );
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('post_users');
	}
}