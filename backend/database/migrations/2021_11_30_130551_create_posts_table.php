<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'posts', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'user_id' )->constrained( 'users' )->onDelete( 'cascade' );
			$table->string( 'title' )->unique();
			$table->string( 'slug' )->unique();
			$table->text( 'post_text' );
			$table->enum( 'is_published', ['1', '0'] );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists( 'posts' );
	}
}