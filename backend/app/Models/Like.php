<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int|null|string user_id
 */
class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

	public function likeable()
	{
		return $this->morphTo();
	}
}
