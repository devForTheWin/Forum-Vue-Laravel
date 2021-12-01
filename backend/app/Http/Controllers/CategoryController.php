<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
	 * Get category list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$categories = Category::orderBy( 'id', 'DESC' )->get();
		return response()->json( $categories );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 *
	 * @param $slug
	 * @return \Illuminate\Http\Response
	 */
	public function showPosts($slug)
	{
		$category = Category::where( 'slug', $slug )->first();
		$posts = $category->posts()->orderBy( 'posts.id', 'DESC' )->where( 'is_published', '1' )->with( 'category' )->with('authors')->get();

		return response()->json( $posts );

	}

	/**
	 * Show single post from category
	 *
	 * @param $slug
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */

	public function show($slug, $id)
	{
		$category = Category::where( 'slug', $slug )->first();
		$categoryPost = $category->posts()->with( 'category' )->with('authors')->findOrFail( $id );

		return response()->json( $categoryPost );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}