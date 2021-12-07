<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
	/**
	 * Display posts list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::orderBy( 'id', 'DESC' )->with( 'category', 'authors', 'likes' )->get();
		return response()->json( $posts );
	}

	/**
	 * Create new post.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate( [
			"user_id" => 'required',
			"title" => 'required|unique:posts',
			"post_text" => 'required',
			"category_id" => "required"
		] );

		$post = new Post;
		$post->user_id = Auth::id();
		$post->title = $request->title;
		$post->slug = Str::slug( $request->title, '-' );
		$post->post_text = $request->post_text;
		$post->is_published = $request->is_published;

		$post->save();

		$post->category()->sync( $request->category_id, false );

		return response()->json( $request );
	}

	/**
	 * Show post by id.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$post = Post::with( 'authors', 'likes' )->where( 'id', $id )->first();
		return response()->json( $post );
	}

	/**
	 * @param Post $post
	 * @return string
	 */

	public function likes(Post $post)
	{

		$post = Post::find( $post->id );

		if (Auth::user()->hasLikedPost( $post )) {
			$post->likes()->where( 'user_id', Auth::id() )->delete();


		} else {
			$post->likes()->create( ['user_id' => Auth::id()] );
		}

		return response()->json( $post->likes->count() );

	}

}
