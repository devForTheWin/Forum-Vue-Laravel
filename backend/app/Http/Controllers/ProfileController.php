<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$posts = User::orderBy( 'id', 'DESC' )->get();
		return response()->json( $posts );
	}

	/**
	 * @return \Illuminate\Http\Response
	 */
	public function getUser()
	{
		$user = auth()->user();

		if (!$user) {
			return response( [
				'message' => 'Oops, something wrong :( Such user does not exist :('
			], 404 );
		}

		return response()->json( $user );
	}

	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updateProfile(Request $request)
	{
		$request->validate( [
			'name' => 'string',
			'surname' => 'string',
			'email' => 'string|email',
		] );

		$user = User::find( Auth::user()-> id );
		$user->name = $request['name'];
		$user->surname = $request['surname'];
		$user->email = $request['email'];

		$user->update();

		return response()->json( $user );
	}
}