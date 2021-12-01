<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  int user_id
 * @property  string title
 * @property  string slug
 * @property  string post_text
 * @property  string is_published
 */
class Post extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'post_text',
		'is_published'
	];

	protected $hidden = ['pivot'];

	protected $guarded = [];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo( User::class );
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	function category()
	{
		return $this->belongsToMany( Category::class, 'category_posts');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	function authors()
	{
		return $this->belongsTo( User::class, 'user_id', 'id' );
	}


}
