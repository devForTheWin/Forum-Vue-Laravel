<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'slug'];

	protected $hidden = ['pivot'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function posts()
	{
		return $this->belongsToMany( Post::class, 'category_posts' );
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	function authors()
	{
		return $this->belongsTo( User::class, 'user_id', 'id' );
	}

}
